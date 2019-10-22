<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($acd_id>0)
	{
	
		$obj_client = $app->load_model("cm_periods",$acd_id);
		$rs_eve = $obj_client->execute("SELECT");
		$data_array=array(
		"seq"=>$rs_eve[0]["seq"],
		"display_name"=>$rs_eve[0]["display_name"],
		"name"=>$rs_eve[0]["name"],
		"start_time"=>$rs_eve[0]["start_time"],
		"end_time"=>$rs_eve[0]["end_time"],
		"status"=>$rs_eve[0]["status"],
		);
	
	
	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	
	}
	
	
?>