<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$library_hours1=$app->getPostVar("library_hours1");
	$assignment1=$app->getPostVar("assignment1");
	$percentage1=  explode('-',$app->getPostVar("percentage1"));	
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");

	

	  if(library_hours1!= NULL && $assignment1!= NULL)
	  {
		
		if($record_id=="")
		{
			$update_field=array();
			$update_field['library_hours'] = $library_hours1;
			$update_field['assignment'] = $assignment1;
			$update_field['startpercentage'] = $percentage1[0];
			$update_field['endpercentage'] = $percentage1[1];
			
			
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
			
			$obj_model_log = $app->load_model("cm_blacklist");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="Black List Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['library_hours'] = $library_hours1;
			$update_field['assignment'] = $assignment1;
			$update_field['startpercentage'] = $percentage1[0];
			$update_field['endpercentage'] = $percentage1[1];
			
			if($status!="")
			{
				$update_field['status'] = $status;
			}
			else
			{
				$update_field['status'] = 1;
			}
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_blacklist",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$msg="Black List Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"blacklists"));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>