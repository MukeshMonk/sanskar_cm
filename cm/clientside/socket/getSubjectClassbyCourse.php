<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$acd_id=$id;
	
	$class_text='<option value="">Select Class</option>';
	$sub_text='<option value="">Select Subject</option>';
	if($acd_id>0)
	{
		
			$obj_sub = $app->load_model("cm_subjects");
			$rs_sub = $obj_sub->execute("SELECT",false,"","course=".$acd_id." and status!='2'");
			foreach($rs_sub as $sub)
			{
				$sub_text.='<option value="'.$sub['id'].'">'.$sub['subject_name'].'</option>';
			}
			
			
			$obj_cls = $app->load_model("cm_classes");
			$rs_cls = $obj_cls->execute("SELECT",false,"","course_id=".$acd_id." and status!='2'");
			foreach($rs_cls as $cls)
			{
				$class_text.='<option value="'.$cls['id'].'">'.$cls['abbreviation'].'</option>';
			}
		
		
		echo $obj_JSON->encode(array("success"=>"0","sub_text"=>$sub_text,"class_text"=>$class_text));
	}
	
	
?>