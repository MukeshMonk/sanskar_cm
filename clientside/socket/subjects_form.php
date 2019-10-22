<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$seq=$app->getPostVar("seq");
	$subject_code=$app->getPostVar("code");
	$subject_name=$app->getPostVar("subject_name");
	$course=$app->getPostVar("course");
	
	
	$assessment_type=$app->getPostVar("assessment_type");
	$sem=$app->getPostVar("sem");
	$university_internal_marks=$app->getPostVar("university_internal_marks");
	$minimum_passing_marks=$app->getPostVar("minimum_passing_marks");
	

	
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");

	  if($subject_name!= NULL)
	  {
		
		if($record_id=="")
		{
			$update_field=array();
			$update_field['seq'] = $seq;
			$update_field['course'] = $course;
			$update_field['sem'] = $sem;
			$update_field['subject_name'] = $subject_name;
			$update_field['subject_code'] = $subject_code;
			$update_field['assessment_type'] = $assessment_type;
			$update_field['university_internal_marks'] = $university_internal_marks;
			$update_field['minimum_passing_marks'] = $minimum_passing_marks;
			
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
			
			$obj_model_log = $app->load_model("cm_subjects");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="Subject Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['seq'] = $seq;
			$update_field['course'] = $course;
			$update_field['sem'] = $sem;
			$update_field['subject_name'] = $subject_name;
			$update_field['subject_code'] = $subject_code;
			$update_field['assessment_type'] = $assessment_type;
			$update_field['university_internal_marks'] = $university_internal_marks;
			$update_field['minimum_passing_marks'] = $minimum_passing_marks;
				if($status!="")
			{
				$update_field['status'] = $status;
			}
			else
			{
				$update_field['status'] = 1;
			}
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_subjects",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$msg="Subject Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"subjects"));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>