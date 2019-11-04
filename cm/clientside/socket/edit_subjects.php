<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($acd_id>0)
	{
	
		$obj_client = $app->load_model("cm_subjects",$acd_id);
		$obj_client->join_table("cm_course","left",array("course_name"),array("course"=>"id"));
		$obj_client->join_table("cm_semesters","left",array("name"),array("sem"=>"id"));
		$obj_client->join_table("cm_asses_structure","left",array("asses_name"),array("assessment_type"=>"id"));
		$rs_eve = $obj_client->execute("SELECT");
		
		$data_array=array(
		"seq"=>$rs_eve[0]["seq"],
		"course"=>$rs_eve[0]["course"],
		"sem"=>$rs_eve[0]["sem"],
		"subject_name"=>$rs_eve[0]["subject_name"],
		"subject_code"=>$rs_eve[0]["subject_code"],
		"assessment_type"=>$rs_eve[0]["assessment_type"],
		"university_internal_marks"=>$rs_eve[0]["university_internal_marks"],
		"minimum_passing_marks"=>$rs_eve[0]["minimum_passing_marks"],
		);
	
	
	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	
	}
	
	
?>