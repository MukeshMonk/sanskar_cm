<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($acd_id>0)
	{
	
		$obj_client = $app->load_model("cm_markattandence",$acd_id);
		$rs_eve = $obj_client->execute("SELECT");
		$data_array=array(
		"academic_year"=>$rs_eve[0]["academic_year"],
		"section"=>$rs_eve[0]["section"],
		"course"=>$rs_eve[0]["course"],
		"sem"=>$rs_eve[0]["sem"],
		"division"=>$rs_eve[0]["division"],
		"class1"=>$rs_eve[0]["class_id"],		
		"default_status"=>$rs_eve[0]["default_status"],
		"add_date"=>  date('d-m-Y',$rs_eve[0]["add_date"]),
		"status"=>$rs_eve[0]["status"],
		);
	
	
	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	
	}
	
	
?>