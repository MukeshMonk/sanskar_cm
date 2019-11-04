<?php

	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	

	$delids=$app->getPostVar("delids");
if($_SESSION['Role']==1)
	{
	if(count($delids)>0)

	{

			foreach($delids as $del)

			{

			

			$acd_id=$app->cmx->decrypt($del,ency_key);

			$update_field=array();

			$update_field['status'] = 'Trash';

			$obj_model_log = $app->load_model("cm_users",$acd_id);

			$obj_model_log->map_fields($update_field);

			$ins=$obj_model_log->execute("UPDATE",false,"","role_id!='1'");

			}

	echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>"Users Deleted Successfully.","retriver"=>"users"));

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