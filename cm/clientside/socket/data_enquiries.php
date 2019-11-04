<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	//$acd_id=$app->cmx->decrypt($id,ency_key);
	$acd_id=$id;
	
	
	if($acd_id>0)
	{
		$obj_client_chk = $app->load_model("cm_register");
		$rs_eve_chk = $obj_client_chk->execute("SELECT",false,"","enq_no=".$acd_id."");
		if(count($rs_eve_chk)>0){
			echo $obj_JSON->encode(array("success"=>"1","MSG"=>'Form Already Exist'));
		}
		else
		{
		
			$obj_client = $app->load_model("cm_enquiries",$acd_id);
			$rs_eve = $obj_client->execute("SELECT");
			
			$data_array=array(
			"first_name"=>$rs_eve[0]["first_name"],
			"middle_name"=>$rs_eve[0]["middle_name"],
			"last_name"=>$rs_eve[0]["last_name"],
			"dob"=>$rs_eve[0]["dob"],
			"age_today"=>$rs_eve[0]["age_today"],
			"email_id"=>$rs_eve[0]["email_id"],
			"enq_class"=>$rs_eve[0]["enq_class"],
			"mobile_no"=>$rs_eve[0]["mobile_no"],
			"phone_no"=>$rs_eve[0]["phone_no"],
			"acd_year"=>$rs_eve[0]["acd_year"],
			"poi"=>$rs_eve[0]["poi"],
			"sem_adm"=>$rs_eve[0]["sem_adm"],
			"gender"=>$rs_eve[0]["gender"],
			"category"=>$rs_eve[0]["category"],
			"ph_status"=>$rs_eve[0]["ph_status"],
			"profession"=>$rs_eve[0]["profession"],
			"mother_name"=>$rs_eve[0]["mother_name"],
			"address"=>$rs_eve[0]["address"],
			"city"=>$rs_eve[0]["city"],
			"district"=>$rs_eve[0]["district"],
			"state"=>$rs_eve[0]["state"],
			"pin"=>$rs_eve[0]["pin"]
			);
	
	
			echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));
		}
	}
	
	
?>