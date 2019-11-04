<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($acd_id>0)
	{
	
		$obj_client = $app->load_model("cm_classes",$acd_id);
		$rs_eve = $obj_client->execute("SELECT");
		$data_array=array(
		"seq"=>$rs_eve[0]["seq"],
		"abbreviation"=>$rs_eve[0]["abbreviation"],
		"name"=>$rs_eve[0]["name"],
		"max_optional_subject"=>$rs_eve[0]["max_optional_subject"],
		"asses_structid"=>$rs_eve[0]["asses_structid"],
		"course_id"=>$rs_eve[0]["course_id"],
		"sem_id"=>$rs_eve[0]["sem_id"],
		);
	
	
	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	
	}
	
	
?>