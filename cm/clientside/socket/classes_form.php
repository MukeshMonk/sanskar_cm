<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$seq=$app->getPostVar("seq");
	$abbreviation=$app->getPostVar("abbreviation");
	$name=$app->getPostVar("name");
	$max_optional_subject=$app->getPostVar("max_optional_subject");
	$asses_structid=$app->getPostVar("asses_structid");
	$course_id=$app->getPostVar("course_id");
	$record_id=$app->getPostVar("record_id");

	  if($abbreviation!= NULL && $name!= NULL)
	  {
		
		if($record_id=="")
		{
			$update_field=array();
			$update_field['seq'] = $seq;
			$update_field['abbreviation'] = $abbreviation;
			$update_field['name'] = $name;
			$update_field['max_optional_subject'] = $max_optional_subject;
			$update_field['asses_structid'] = $asses_structid;
			$update_field['course_id'] = $course_id;
			$update_field['added_on'] = time();
			$update_field['added_by'] = $_SESSION['StaffID'];
			$obj_model_log = $app->load_model("cm_classes");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="Class Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['seq'] = $seq;
			$update_field['abbreviation'] = $abbreviation;
			$update_field['name'] = $name;
			$update_field['max_optional_subject'] = $max_optional_subject;
			$update_field['asses_structid'] = $asses_structid;
			$update_field['course_id'] = $course_id;
			//$update_field['added_on'] = time();
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_classes",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$msg="Academic Year Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"classes"));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>