<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$course_name=$app->getPostVar("course_name");
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");

	  if($course_name!= NULL)
	  {
		
		if($record_id=="")
		{
			$update_field=array();
			$update_field['course_name'] = $course_name;
			
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
			
			$obj_model_log = $app->load_model("cm_course");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="Course Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['course_name'] = $course_name;
			if($status!="")
			{
				$update_field['status'] = $status;
			}
			else
			{
				$update_field['status'] = 1;
			}
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_course",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$msg="Course Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"courses"));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>