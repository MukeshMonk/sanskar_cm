<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$term_temp=$app->getPostVar("term_temp");
	//$acd_id=$app->cmx->decrypt($id,ency_key);
	$acd_id=$id;
	
	$term_text='<option value="">Select term</option>';
	$sec_text='';
	$sub_text='';
	if($acd_id>0)
	{
		//if($acd_id>0 && $sem_id>0)
		//{
			/*$obj_sub = $app->load_model("cm_subjects");
			$rs_sub = $obj_sub->execute("SELECT",false,"","course=".$acd_id." and sem='".$sem_id."' and status!='2'");
			foreach($rs_sub as $sub)
			{
				$sub_text.='<option value="'.$sub['id'].'">'.$sub['subject_name'].'</option>';
			}*/
			
			/*$obj_sec = $app->load_model("cm_sections");
			$obj_sec->join_table("cm_classes","left",array(),array("class_id"=>"id"));
			$rs_sec = $obj_sec->execute("SELECT",false,"","cm_classes.course_id=".$acd_id." and cm_classes.sem_id='".$sem_id."' and cm_sections.status!='2' and cm_classes.status!='2'");
			foreach($rs_sec as $sec)
			{
				$sec_text.='<option value="'.$sec['id'].'">'.$sec['section_name'].'</option>';
			}*/
			$obj_cls = $app->load_model("cm_classes");
			$rs_cls = $obj_cls->execute("SELECT",false,"","id=".$acd_id." and status!='2'");
			$obj_term = $app->load_model("cm_terms");
			$obj_term->join_table("cm_asses_structure","left",array(),array("assessment_id"=>"id"));
			$rs_term = $obj_term->execute("SELECT",false,"","cm_asses_structure.course=".$rs_cls[0]["course_id"]." and cm_terms.status!='2' and cm_asses_structure.status!='2'");
			foreach($rs_term as $term)
			{
				if($term_temp==$term['id'])
				{
					$sel_text='selected="selected"';
				}
				else
				{
					$sel_text='';
				}
				$term_text.='<option value="'.$term['id'].'" '.$sel_text.' >'.$term['name'].'</option>';
			}
		
		/*}
		else
		{
			$obj_term = $app->load_model("cm_terms");
			$obj_term->join_table("cm_asses_structure","left",array(),array("assessment_id"=>"id"));
			$rs_term = $obj_term->execute("SELECT",false,"","cm_asses_structure.course=".$acd_id."  and cm_terms.status!='2' and cm_asses_structure.status!='2'");
			foreach($rs_term as $term)
			{
				$term_text.='<option value="'.$term['id'].'">'.$term['name'].'</option>';
			}
		}*/
		echo $obj_JSON->encode(array("success"=>"0","sub_text"=>$sub_text,"sec_text"=>$sec_text,"term_text"=>$term_text));
	}
	
	
?>