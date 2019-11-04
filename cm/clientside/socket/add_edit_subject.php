<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$name=$app->getPostVar("first_name");
	$subject=$app->getPostVar("subject2");
	$cls_inchrg=$app->getPostVar("cls_inchrg");
	$staff_h_name=$app->getPostVar("staff_h_name");
	$staff_s_h_name=$app->getPostVar("staff_s_h_name");
	$record_id=$app->getPostVar("record_id");
		//$item_id=$app->getPostVar("update_id");
		$item_id=$app->getPostVar("record_id");
		  $update_field=array();
		if($item_id=="")
		{
			/* Image Upload*/
			$update_field['added_on'] = time();
			$update_field['added_by'] = $_SESSION['StaffID'];
			$update_field['status'] = 0;
			if(!empty($subject))
			{
				$update_field['subject'] = implode(",",$subject);
			}
			else
			{
				$update_field['subject'] = "";
			}
			if(!empty($cls_inchrg))
			{
				$update_field['class_incharge'] = implode(",",$cls_inchrg);
			}
			else
			{
				$update_field['class_incharge'] = "";
			}
			$obj_model_log = $app->load_model("staff");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="Staff Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($item_id,ency_key);
			if(!empty($subject))
			{
				$update_field['subject'] = implode(",",$subject);
			}
			else
			{
				$update_field['subject'] = "";
			}
			if(!empty($cls_inchrg))
			{
				$update_field['class_incharge'] = implode(",",$cls_inchrg);
			}
			else
			{
				$update_field['class_incharge'] = "";
			}
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("staff",$record_id);
			$obj_model_log->map_fields($update_field);

			$ins=$obj_model_log->execute("UPDATE");
			$msg="Staff Updated Successfully.";
		}
		$url=CMX_ROOT.'/staffentry/faculty/';		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"faculty","URL"=>$url));			 	
	 
?>