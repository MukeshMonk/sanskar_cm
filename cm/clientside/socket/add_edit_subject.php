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
		//echo '<pre>'.print_r($app->getPostVars(),true).'</pre>';exit;

		$depart_sel=$app->getPostVar("depart_sel");

	
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
				//echo"impload". $update_field['subject']; exit;
			}
			else
			{
				$update_field['subject'] = "";
				//echo $update_field['subject']; exit;
			}
			if(!empty($cls_inchrg))
			{
				$update_field['class_incharge'] = implode(",",$cls_inchrg);
			}
			else
			{
				$update_field['class_incharge'] = "";
			}
			if(!empty($depart_sel))
			{
				$update_field['department'] = implode(",",$depart_sel);
				//echo"impload department ". $update_field['department']; exit;
			}
			else
			{
				$update_field['department'] = "";
				//echo $update_field['department']; exit;
			}
			
			$obj_model_log = $app->load_model("staff");
			//echo"<pre>";print_r($obj_model_log->sql); exit;
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
			if(!empty($depart_sel))
			{
				$update_field['department'] = implode(",",$depart_sel);
			}
			else
			{
				$update_field['department'] = "";
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