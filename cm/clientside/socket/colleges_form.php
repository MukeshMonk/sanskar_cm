<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$email=$app->getPostVar("email");
	$name=$app->getPostVar("name");
	$website=$app->getPostVar("website");
	$phonenumber=$app->getPostVar("phonenumber");
	$affiliation_number=$app->getPostVar("affiliation_number");
	$address=$app->getPostVar("address");
	
	
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");

	  if($name!= NULL)
	  {
		
		if($record_id=="")
		{
			$update_field=array();
			$update_field['name'] = $name;
			$update_field['email'] = $email;
			$update_field['website'] = $website;
			$update_field['phonenumber'] = $phonenumber;
			$update_field['affiliation_number'] = $affiliation_number;
			$update_field['address'] = $address;
			
			
			
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
			
			$obj_model_log = $app->load_model("cm_colleges");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="College Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['name'] = $name;
			$update_field['email'] = $email;
			$update_field['website'] = $website;
			$update_field['phonenumber'] = $phonenumber;
			$update_field['affiliation_number'] = $affiliation_number;
			$update_field['address'] = $address;
			
			if($status!="")
			{
				$update_field['status'] = $status;
			}
			else
			{
				$update_field['status'] = 1;
			}
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_colleges",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$msg="College Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"colleges"));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>