<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$short_name=$app->getPostVar("short_name");
	$name=$app->getPostVar("name");
	$f_date=$app->getPostVar("f_date");
	$t_date=$app->getPostVar("t_date");
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");

	  if($short_name!= NULL && $name!= NULL)
	  {
		
		if($record_id=="")
		{
			$update_field=array();
			$update_field['short_name'] = $short_name;
			$update_field['name'] = $name;
			$update_field['frm_date'] = strtotime($f_date);
			$update_field['to_date'] = strtotime($t_date);
			
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
			
			$obj_model_log = $app->load_model("cm_academicyears");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="Academic Year Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['short_name'] = $short_name;
			$update_field['name'] = $name;
			$update_field['frm_date'] = strtotime($f_date);
			$update_field['to_date'] = strtotime($t_date);
			if($status!="")
			{
				$update_field['status'] = $status;
			}
			else
			{
				$update_field['status'] = 1;
			}
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_academicyears",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$msg="Academic Year Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"academicyears"));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>