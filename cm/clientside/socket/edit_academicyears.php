<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($acd_id>0)
	{
	
		$obj_client = $app->load_model("cm_academicyears",$acd_id);
		$rs_eve = $obj_client->execute("SELECT");
		$data_array=array(
		"short_name"=>$rs_eve[0]["short_name"],
		"name"=>$rs_eve[0]["name"],
		"f_date"=>date('d-m-Y',$rs_eve[0]["frm_date"]),
		"t_date"=>date('d-m-Y',$rs_eve[0]["to_date"]),
		"status"=>$rs_eve[0]["status"],
		);
	
	
	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	
	}
	
	
?>