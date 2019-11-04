<?php

	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	

	$id=$app->getPostVar("ac_id");

	$acd_id=$app->cmx->decrypt($id,ency_key);
	if($_SESSION['Role']==1)
	{
	if($acd_id>0)

	{

		

		$asse_sql = "SELECT count(id) as countasses FROM `cm_users` WHERE role_id='1' and  id = ".$acd_id;

		$asse = $app->load_model("cm_users");

		$asse_count = $asse->execute("SELECT",false,$asse_sql);

		if($asse_count[0]['countasses'] > 0)

		{

			echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"You can't delete this Admin User."));

		}else

		{

			$update_field=array();

			$update_field['status'] = 'Trash';

			$obj_model_log = $app->load_model("cm_users",$acd_id);

			$obj_model_log->map_fields($update_field);

			$ins=$obj_model_log->execute("UPDATE");
			$data_log=array("id"=>$acd_id);
			$log_id_new=$app->cmx->log_entry("cm_users","Delete_by_Single",$data_log);
		

			echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>"User Deleted Successfully.","retriver"=>"users"));

		}

	}

	else

	{

		echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Somthing Went Wrong In Performing This Action."));

	}
	}
	else
	{
		echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"You have not permission to create a new user"));	
	}

	

	

?>