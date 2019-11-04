<?php

	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	

	$delids=$app->getPostVar("delids");

	if(count($delids)>0)

	{

			foreach($delids as $del)

			{

			

			$acd_id=$app->cmx->decrypt($del,ency_key);

			$update_field=array();

			$update_field['status'] = 'Deleted';

			$obj_model_log = $app->load_model("cm_register",$acd_id);

			$obj_model_log->map_fields($update_field);

			$ins=$obj_model_log->execute("UPDATE");
			$rs_reg = $obj_model_log->execute("SELECT");
				if($rs_reg[0]['enq_no']!='')
				{
						$obj_model_enq = $app->load_model("cm_enquiries",$rs_reg[0]['enq_no']);
						$obj_model_enq->execute("UPDATE",false,"UPDATE cm_enquiries SET status='Deleted' WHERE id='".$rs_reg[0]['enq_no']."'");
				}

			}

	echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>"Registration Deleted Successfully.","retriver"=>"registration"));

	}

	else

	{

	echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Somthing Went Wrong In Performing This Action."));

	}

	

	

?>