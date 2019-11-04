<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($acd_id>0)
	{
	
		$obj_client = $app->load_model("cm_colleges",$acd_id);
		$rs_eve = $obj_client->execute("SELECT");
		$data_array=array(
		"email"=>$rs_eve[0]["email"],
		"name"=>$rs_eve[0]["name"],
		"website"=>$rs_eve[0]["website"],
		"phonenumber"=>$rs_eve[0]["phonenumber"],
		"affiliation_number"=>$rs_eve[0]["affiliation_number"],
		"address"=>$rs_eve[0]["address"],
			
		"status"=>$rs_eve[0]["status"],
		);
	
	
	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	
	}
	
	
?>