<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($acd_id>0)
	{
	
		/*`id`, `adm_code`, `acd_year`, `class_id`, `status`, `no_seat`, `g_seat`, `sc_seat`, `st_seat`, `sebc_seat`, `ph_seat`, `obq_seat`, `dop`, `un_date`, `inq_fees`, `adm_form_fees`, `adm_fees`, `int_acd_year`, `int_class`, `sms`, `inq_sms`, `adm_app_sms`, `adm_cnf_sms`, `added_on`, `last_updated`, `added_by`*/
		$obj_client = $app->load_model("cm_initiate",$acd_id);
		$rs_eve = $obj_client->execute("SELECT");
		
		
		$data_array=array(
		"adm_code"=>$rs_eve[0]["adm_code"],
		"acd_year"=>$rs_eve[0]["acd_year"],
		"class_id"=>$rs_eve[0]["class_id"],
		"status"=>$rs_eve[0]["status"],
		"no_seat"=>$rs_eve[0]["no_seat"],
		"g_seat"=>$rs_eve[0]["g_seat"],
		"sc_seat"=>$rs_eve[0]["sc_seat"],
		"st_seat"=>$rs_eve[0]["st_seat"],
		"sebc_seat"=>$rs_eve[0]["sebc_seat"],
		"ph_seat"=>$rs_eve[0]["ph_seat"],
		"obq_seat"=>$rs_eve[0]["obq_seat"],		"mgmt_seat"=>$rs_eve[0]["mgmt_seat"],
		"dop"=>$rs_eve[0]["dop"],
		"un_date"=>$rs_eve[0]["un_date"],
		"inq_fees"=>$rs_eve[0]["inq_fees"],
		"adm_form_fees"=>$rs_eve[0]["adm_form_fees"],
		"adm_fees"=>$rs_eve[0]["adm_fees"],
		"int_acd_year"=>$rs_eve[0]["int_acd_year"],
		"int_class"=>$rs_eve[0]["int_class"],
		"sms"=>$rs_eve[0]["sms"],
		"inq_sms"=>$rs_eve[0]["inq_sms"],
		"adm_app_sms"=>$rs_eve[0]["adm_app_sms"],
		"adm_cnf_sms"=>$rs_eve[0]["adm_cnf_sms"]
		);
	
	
	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	
	}
	
	
?>