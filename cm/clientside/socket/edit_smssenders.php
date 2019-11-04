<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($acd_id>0)
	{
	
		$obj_client = $app->load_model("cm_smssenders",$acd_id);
		$rs_eve = $obj_client->execute("SELECT");
		$data_array=array(
		"url"=>$rs_eve[0]["url"],
		"xml_url"=>$rs_eve[0]["xml_url"],
		"prefix_xml"=>$rs_eve[0]["prefix_xml"],
		"dynamic_student_xml"=>$rs_eve[0]["dynamic_student_xml"],
		"postfix_xml"=>$rs_eve[0]["postfix_xml"],
		"is_xml"=>$rs_eve[0]["is_xml"],
		"status"=>$rs_eve[0]["status"]
		);
	
	
	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	
	}
	
	
?>