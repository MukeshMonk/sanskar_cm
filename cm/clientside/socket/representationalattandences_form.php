<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$event=$app->getPostVar("event");
	$name=$app->getPostVar("name");
	$start_date=$app->getPostVar("start_date1");
	$end_date=$app->getPostVar("end_date1");
	$student_id=$app->getPostVar("student_id1");
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");

	$allstdent = implode(",",$student_id);

	  if($event!= NULL && $start_date!= NULL)
	  {
		if($record_id=="")
		{
			$update_field=array();
			$update_field['event'] = $event;			
			$update_field['student_idno'] = $allstdent;
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
			
			$obj_model_log = $app->load_model("cm_representationalattandence");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
						
			$allstdentids = implode("','",$student_id);
			$students = $app->cmx->student_data($allstdentids);	
			
			$dates = $app->cmx->createDateRange($start_date, $end_date, $format = "Y-m-d");
			
			$app->cmx->add_leave_attandence($dates,$students,$event,$ins,"Official Leave");
						
						
			$msg="Representational Attandence Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['event'] = $event;			
			$update_field['student_idno'] = $allstdent;
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
			$obj_model_log = $app->load_model("cm_representationalattandence",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			
			$obj_model_log = $app->load_model("cm_attendance");
			$obj_model_log->map_fields($update_field);
			$obj_model_log->execute("DELETE",false,"","official_leave_id=".$record_id);
				
			
			$allstdentids = implode("','",$student_id);
			$students = $app->cmx->student_data($allstdentids);	
			$dates = $app->cmx->createDateRange($start_date, $end_date, $format = "Y-m-d");
			
			$app->cmx->add_leave_attandence($dates,$students,$event,$record_id,"Official Leave");		
			
			
			$msg="Representational Attandence Updated Successfully.";
			
		}		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"representationalattandences"));			 	
	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>