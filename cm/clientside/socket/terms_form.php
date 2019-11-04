<?php 



	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$name=$app->getPostVar("name");
	$marks=$app->getPostVar("marks");
	$clsid=$app->getPostVar("clsid");
	$class_id=$app->cmx->decrypt($clsid,ency_key);

	$status=$app->getPostVar("status");

	$record_id=$app->getPostVar("record_id");





	$totalmarks="SELECT sum(marks) as total_marks FROM `cm_terms` WHERE assessment_id = ".$class_id."  and status=1";

	$obj_cmterm=$app->load_model("cm_terms");

	$rs=$obj_cmterm->execute("SELECT",false,$totalmarks);

	$total_marks=$rs[0]['total_marks'];

	

	

	

	$assessmentmarks="SELECT sum(marks) as asses_marks FROM `cm_asses_structure` WHERE id = ".$class_id."  and status=1";

	$obj_assessment=$app->load_model("cm_asses_structure");

	$rs=$obj_assessment->execute("SELECT",false,$assessmentmarks);

	$assessment_marks=$rs[0]['asses_marks'];

	

	if($name!= NULL)

	{

		if($total_marks > $assessment_marks   OR  ($marks + $total_marks) > $assessment_marks)

		{

			$msg="Can't Add Marks More Than ".$assessment_marks;

			$res="error";

		}

		else 

		{
		
	



	 	

		if($record_id=="")

		{

			$update_field=array();

			$update_field['name'] = $name;

			$update_field['assessment_id'] = $class_id;

			$update_field['marks'] = $marks;

			$update_field['status'] = 1;

			$update_field['added_on'] = time();

			$update_field['added_by'] = $_SESSION['StaffID'];

			$obj_model_log = $app->load_model("cm_terms");

			$obj_model_log->map_fields($update_field);

			$ins=$obj_model_log->execute("INSERT");

			$msg="Terms Added Successfully.";

			$res="success";

		}

		else

		{

		    $record_id=$app->cmx->decrypt($record_id,ency_key);

			$update_field=array();

			$update_field['assessment_id'] = $class_id;

			$update_field['name'] = $name;

			$update_field['marks'] = $marks;

			$update_field['last_updated'] = time();

			$obj_model_log = $app->load_model("cm_terms",$record_id);

			$obj_model_log->map_fields($update_field);

			$ins=$obj_model_log->execute("UPDATE");

			

			$msg="Terms Updated Successfully.";

			$res="success";

			

		}

		

		}

		

		if($res=='success')

		{

		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"terms","clsid"=>$clsid));			 	

		}

		else {
			echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>$msg,"retriver"=>"terms","clsid"=>$clsid));			 	

			
		}



	 }

	 else

	 {

		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	

	 }



	



?>