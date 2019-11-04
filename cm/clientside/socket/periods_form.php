<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$display_name=$app->getPostVar("display_name");
	$seq=$app->getPostVar('seq');
	$name=$app->getPostVar("name");
	$start_time=$app->getPostVar("start_time");
	$end_time=$app->getPostVar("end_time");
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");

	  if($display_name!= NULL && $name!= NULL)
	  {
		
		if($record_id=="")
		{
			$update_field=array();
			$update_field['seq'] = $seq;
			$update_field['display_name'] = $display_name;
			$update_field['name'] = $name;
			$update_field['frm_date'] = $start_time;
			$update_field['end_time'] = $end_time;
			
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
			
			$obj_model_log = $app->load_model("cm_periods");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="Periods Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['seq'] = $seq;
			$update_field['display_name'] = $display_name;
			$update_field['name'] = $name;
			$update_field['frm_date'] = $start_time;
			$update_field['end_time'] = $end_time;
				if($status!="")
			{
				$update_field['status'] = $status;
			}
			else
			{
				$update_field['status'] = 1;
			}
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_periods",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$msg="Periods Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"periods"));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>