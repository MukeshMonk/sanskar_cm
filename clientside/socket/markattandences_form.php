<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$academic_year=$app->getPostVar("academic_year");
	$section=$app->getPostVar('section');
	$course=$app->getPostVar("course");
	$sem=$app->getPostVar("sem");
	$division=$app->getPostVar("division");
	$default_status=$app->getPostVar("default_status");
	$date=$app->getPostVar("add_date1");
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");
	$class_id=$app->getPostVar("class1");
	
	
	
	  if($academic_year!= NULL && $section!= NULL)
	  {
		
		if($record_id=="")
		{
			$update_field=array();
			$update_field['academic_year'] = $academic_year;
			$update_field['section'] = $section;
			$update_field['course'] = $course;
			$update_field['sem'] = $sem;
			$update_field['division'] = $division;
			$update_field['default_status'] = $default_status;
			$update_field['class_id'] = $class_id;
			$update_field['add_date'] = strtotime($date);
			
			if($status!="")
			{
				$update_field['status'] = $status;
			}
			else
			{
				$update_field['status'] = 1;
			}
			$update_field['added_on'] = time();
			$update_field['added_by'] = $_SESSION['StaffID'];
			
			$obj_model_log = $app->load_model("cm_markattandence");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="Markattandence Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['academic_year'] = $academic_year;
			$update_field['section'] = $section;
			$update_field['course'] = $course;
			$update_field['sem'] = $sem;
			$update_field['division'] = $division;
			$update_field['default_status'] = $default_status;
			$update_field['class_id'] = $class_id;
			$update_field['add_date'] = strtotime($date);
			if($status!="")
			{
				$update_field['status'] = $status;
			}
			else
			{
				$update_field['status'] = 1;
			}
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_markattandence",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$msg="Markattandence Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"markattandences"));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>