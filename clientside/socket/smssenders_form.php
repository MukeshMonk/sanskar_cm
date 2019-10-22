<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$url=$app->getPostVar("url");
	$xml_url=$app->getPostVar("xml_url");
	$prefix_xml=$app->getPostVar("prefix_xml");
	$dynamic_student_xml=$app->getPostVar("dynamic_student_xml");
	$postfix_xml=$app->getPostVar("postfix_xml");
	$is_xml=$app->getPostVar("is_xml");
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");

	  if($url!= NULL)
	  {
		
		if($record_id=="")
		{
			$update_field=array();
			$update_field['url'] = $url;
			$update_field['xml_url'] = $xml_url;
			$update_field['prefix_xml'] = $prefix_xml;
			$update_field['dynamic_student_xml'] = $dynamic_student_xml;
			$update_field['postfix_xml'] = $postfix_xml;
			
			
			
			if($status!="")
			{
				$update_field['status'] = $status;
			}
			else
			{
				$update_field['status'] = 1;
			}
			
			if($is_xml!="")
			{
				$update_field['is_xml'] = $is_xml;
			}
			else
			{
				$update_field['is_xml'] = 1;
			}
			
			
			
			$update_field['added_on'] = time();
			$update_field['added_by'] = $_SESSION['StaffID'];
			
			$obj_model_log = $app->load_model("cm_smssenders");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="SMS Senders Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['url'] = $url;
			
			$update_field['xml_url'] = $xml_url;
			
			
			
			
			
			$update_field['prefix_xml'] = $prefix_xml;
			$update_field['dynamic_student_xml'] = $dynamic_student_xml;
			$update_field['postfix_xml'] = $postfix_xml;
			if($is_xml!="")
			{
				$update_field['is_xml'] = $is_xml;
			}
			else
			{
				$update_field['is_xml'] = 1;
			}
			
			
			
			if($status!="")
			{
				$update_field['status'] = $status;
			}
			else
			{
				$update_field['status'] = 1;
			}
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_smssenders",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$msg="SMS Senders Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"smssenders"));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>