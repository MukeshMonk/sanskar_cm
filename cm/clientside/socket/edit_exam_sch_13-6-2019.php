<?php

	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	$id=$app->getPostVar("act_id");

	$acd_id=$app->cmx->decrypt($id,ency_key);

	if($acd_id>0)

	{

	

		$obj_client = $app->load_model("exam_schedule",$acd_id);

		$rs_eve = $obj_client->execute("SELECT");

		$data_array=array(

		"acd_year_id"=>$rs_eve[0]["acd_year_id"],
		"cource_id"=>$rs_eve[0]["cource_id"],
		"sem_id"=>$rs_eve[0]["sem_id"],
		"div_id"=>$rs_eve[0]["div_id"],
		"term_id"=>$rs_eve[0]["term_id"],
		"sub_id"=>$rs_eve[0]["sub_id"],
		"act_name"=>$rs_eve[0]["act_name"],
		"max_mark"=>$rs_eve[0]["max_mark"],
		"act_date"=>$rs_eve[0]["act_date"],
		"m_sub_date"=>$rs_eve[0]["m_sub_date"]
		);

	

	

	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	

	}

	

	

?>