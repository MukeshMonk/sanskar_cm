<?php

	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	$id=$app->getPostVar("act_id");

	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($acd_id>0)
	{
		$obj_client = $app->load_model("cm_users",$acd_id);
		$rs_eve = $obj_client->execute("SELECT");
		$data_array=array(
		"firstname"=>$rs_eve[0]["firstname"],
		"lastname"=>$rs_eve[0]["lastname"],
		"username"=>$rs_eve[0]["username"],
		"email"=>$rs_eve[0]["email"],
		"password"=>$app->cmx->alpha_decrypt($rs_eve[0]["pass"],ency_key),
		"phone"=>$rs_eve[0]["phone"],
		"role_id"=>$rs_eve[0]["role_id"],
		"status"=>$rs_eve[0]["status"],
		);
	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	
	}

	

	

?>