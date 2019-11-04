<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($acd_id>0)
	{
	
		$obj_client = $app->load_model("staff",$acd_id);
		$rs_eve = $obj_client->execute("SELECT");
		
		//echo"<pre>"; print_r($rs_eve); exit;
		if($rs_eve[0]["dob"]>0)
		{
			$date_of_birth=date('d-m-Y',strtotime($rs_eve[0]["dob"]));
		}
		else {
			$date_of_birth="";
		}
		
		if($rs_eve[0]["joining_date"]>0)
		{
			$joining_date=date('d-m-Y',strtotime($rs_eve[0]["joining_date"]));
		}
		else {
			$joining_date="";
		}
		
		if($rs_eve[0]["date_aniversary"] != '')
		{
			$date_aniversary=date('d-m-Y',strtotime($rs_eve[0]["date_aniversary"]));
		}
		else {
			$date_aniversary="";
		}
		
		
		
		$data_array=array(
		"name"=>$rs_eve[0]["name"],
		"user_type"=>$rs_eve[0]["user_type"],
		"mobile_no"=>$rs_eve[0]["mobile_no"],
		"sing_image"=>$rs_eve[0]["sing_image"],
		"staff_image"=>$rs_eve[0]["staff_image"],
		"per_email"=>$rs_eve[0]["per_email"],
		"dob"=>$date_of_birth,
		"gender"=>$rs_eve[0]["gender"],
		"designation"=>$rs_eve[0]["designation"],
		"blood_group"=>$rs_eve[0]["blood_group"],
		"biometricd_code"=>$rs_eve[0]["biometricd_code"],
		"subject"=>$rs_eve[0]["subject"],
		"login_id"=>$rs_eve[0]["login_id"],
		"phone_no"=>$rs_eve[0]["phone_no"],
		"joining_date"=>$joining_date,
		"department"=>$rs_eve[0]["department"],
		"marital_status"=>$rs_eve[0]["marital_status"],
		"reporting_authority"=>$rs_eve[0]["reporting_authority"],
		"sequence_no"=>$rs_eve[0]["sequence_no"],
		"class_incharge"=>$rs_eve[0]["class_incharge"],
		"pan_no"=>$rs_eve[0]["pan_no"],
		"election_card_no"=>$rs_eve[0]["election_card_no"],
		"aadhar_card_no"=>$rs_eve[0]["aadhar_card_no"],
		"date_aniversary"=>$date_aniversary,
		"father_name"=>$rs_eve[0]["father_name"],
		"f_contact_no"=>$rs_eve[0]["f_contact_no"],
		"mother_name"=>$rs_eve[0]["mother_name"],
		"m_contact_no"=>$rs_eve[0]["m_contact_no"],
		"spouce_name"=>$rs_eve[0]["spouce_name"],
		"s_contact_no"=>$rs_eve[0]["s_contact_no"],
		"address"=>$rs_eve[0]["address"],
		"city"=>$rs_eve[0]["city"],
		"state"=>$rs_eve[0]["state"],
		"country"=>$rs_eve[0]["country"],
		"birth_place"=>$rs_eve[0]["birth_place"],
		"nationality"=>$rs_eve[0]["nationality"],
		"bank_name"=>$rs_eve[0]["bank_name"],
		"bank_branch"=>$rs_eve[0]["bank_branch"],
		"salary_p_type"=>$rs_eve[0]["salary_p_type"],
		"acc_no"=>$rs_eve[0]["acc_no"],
		"pf_no"=>$rs_eve[0]["pf_no"],
		"esic_no"=>$rs_eve[0]["esic_no"],
		"is_intercommunication"=>$rs_eve[0]["is_intercommunication"]
		);
	
	//echo"<pre>"; print_r($data_array); exit;
	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	
	}
	
	
?>