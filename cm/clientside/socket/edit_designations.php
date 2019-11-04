<?php

	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	$id=$app->getPostVar("act_id");

	$acd_id=$app->cmx->decrypt($id,ency_key);

	if($acd_id>0)

	{

	

		$obj_client = $app->load_model("cm_designations",$acd_id);

		$rs_eve = $obj_client->execute("SELECT");

		$data_array=array(

		"name"=>$rs_eve[0]["name"],
		"staff_type"=>$rs_eve[0]["staff_type"],

		);

	

	

	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	

	}

	

	

?>