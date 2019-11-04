<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$form_no=$app->getPostVar("form_no1");
	$doctor_name=$app->getPostVar("doctor_name1");
	$start_date=$app->getPostVar("start_date1");
	$end_date=$app->getPostVar("end_date1");
	$student_id=$app->getPostVar("student_id1");
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");

	$allstdent = implode(",",$student_id);

	  if($doctor_name!= NULL && $start_date!= NULL && $end_date!= NULL)
	  {		
		if($record_id=="")
		{
			
			$update_field=array();
			$update_field['form_no'] = $form_no;
			$update_field['doctor_name'] = $doctor_name;			
			$update_field['student_idno'] = $student_id;
			$update_field['end_date'] = strtotime($end_date);
			$update_field['start_date'] = strtotime($start_date);
			
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
			
			$obj_model_log = $app->load_model("cm_medicalleaves");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			
			//$allstdentids = implode("','",$student_id);
			$students = $app->cmx->student_data($student_id);			
			$dates = $app->cmx->createDateRange($start_date, $end_date, $format = "Y-m-d");
			$app->cmx->add_leave_attandence($dates,$students,$doctor_name,$ins,"Medical Leave");			
			
			$msg="Medical Leave Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['form_no'] = $form_no;
			$update_field['doctor_name'] = $doctor_name;			
			$update_field['student_idno'] = $student_id;
			$update_field['end_date'] = strtotime($end_date);
			$update_field['start_date'] = strtotime($start_date);
			
			if($status!="")
			{
				$update_field['status'] = $status;
			}
			else
			{
				$update_field['status'] = 1;
			}
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_medicalleaves",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$obj_model_log = $app->load_model("cm_attendance");
			$obj_model_log->map_fields($update_field);
			$obj_model_log->execute("DELETE",false,"","official_leave_id=".$record_id);
				
			
			//$allstdentids = implode("','",$student_id);
			$students = $app->cmx->student_data($student_id);	
			$dates = $app->cmx->createDateRange($start_date, $end_date, $format = "Y-m-d");
			$app->cmx->add_leave_attandence($dates,$students,$doctor_name,$record_id,"Medical Leave");		
			
			$msg="Medical Leave Updated Successfully.";
			
		}		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"medicalleaves"));			 	
	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>