<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$section_name=$app->getPostVar("section_name");
	$capacity=$app->getPostVar("capacity");
	$clsid=$app->getPostVar("clsid");
	$class_id=$app->cmx->decrypt($clsid,ency_key);


	

	
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");

	  if($section_name!= NULL)
	  {
		
		if($record_id=="")
		{
			$update_field=array();
			$update_field['class_id'] = $class_id;
			$update_field['section_name'] = $section_name;
			$update_field['capacity'] = $capacity;
			$update_field['status'] = 1;
			$update_field['added_on'] = time();
			$update_field['added_by'] = $_SESSION['StaffID'];
			$obj_model_log = $app->load_model("cm_sections");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="Section Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['class_id'] = $class_id;
			$update_field['section_name'] = $section_name;
			$update_field['capacity'] = $capacity;
			
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_sections",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$msg="Section Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"sections","clsid"=>$clsid));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>