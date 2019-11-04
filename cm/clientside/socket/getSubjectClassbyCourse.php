<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$acd_id=$id;
	//echo "id".$acd_id; exit;
	//$depart_sel=$app->getPostVar("depart_sel");
	// echo $depart_sel; exit;
	// echo"<pre>";print_r($app->getPostVar()); exit;
	$class_text='<option value="">Select Class</option>';
	// $sub_text='<option value="">Select Subject</option>';

	if($acd_id>0)
	{
			
			// $obj_sub = $app->load_model("cm_subjects");
			// $rs_sub = $obj_sub->execute("SELECT",false,"","course IN(".$acd_id.") and status!='2'");
			//  echo"<pre>";print_r($rs_sub);
			// foreach($rs_sub as $sub)
			// {
				
			// 	$sub_text.='<option value="'.$sub['id'].'">'.$sub['subject_name'].'</option>';
			// }
			$obj_cls = $app->load_model("cm_classes");
			$rs_cls = $obj_cls->execute("SELECT",false,"","course_id IN(".$acd_id.") and status!='2'");
			
			foreach($rs_cls as $cls)
			{  
				$class_text.='<option value="'.$cls['id'].'">'.$cls['abbreviation'].'</option>';
			}
		
		
		echo $obj_JSON->encode(array("success"=>"0","class_text"=>$class_text));
	}
	
	
?>