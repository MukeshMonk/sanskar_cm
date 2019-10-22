<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	
	$id=$app->getPostVar("ac_id");
	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($acd_id>0)
	{
		$asse_sql = "SELECT count(id) as countasses FROM `cm_subjects` WHERE course = ".$acd_id;
		$asse = $app->load_model("cm_subjects");
		$asse_count = $asse->execute("SELECT",false,$asse_sql);
		if($asse_count[0]['countasses'] > 0)
		{
			echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"You can't delete this course because its related to subject."));
		}else
		{
			$update_field=array();
			$update_field["status"]=2;
			$obj_model_log = $app->load_model("cm_course",$acd_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>"Course Deleted Successfully.","retriver"=>"courses"));
		}
	}
	else
	{
	echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Somthing Went Wrong In Performing This Action."));
	}
	
	
?>