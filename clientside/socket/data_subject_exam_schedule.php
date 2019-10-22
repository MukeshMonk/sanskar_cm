<?php

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	$sub_temp=$app->getPostVar("sub_temp");
	//$acd_id=$app->cmx->decrypt($id,ency_key);
	$acd_id=$id;
  $record_id=$app->getPostVar("record_id");
  $record_id_dec=$app->cmx->decrypt($record_id,ency_key);


  

	$term_text='';
	$sec_text='';
	$sub_text='';
	if($acd_id>0)
	{
		
			    $obj_cls = $app->load_model("cm_classes");
            $rs_cls = $obj_cls->execute("SELECT",false,"","id=".$acd_id." and status!='2'");
            //echo"<pre>"; print_r($rs_cls); exit;

            $obj_term = $app->load_model("cm_subjects");
            $sub_term = $obj_term->execute("SELECT",false,"SELECT * FROM cm_subjects WHERE course='".$rs_cls[0]['course_id']."' and sem='".$rs_cls[0]['sem_id']."' and status!='2'");
            //echo"<pre>";print_r($sub_term);
           // echo $obj_term->sql; exit;
		    	// $obj_term->join_table("cm_asses_structure","left",array(),array("assessment_id"=>"id"));
            // $rs_term = $obj_term->execute("SELECT",false,"","cm_asses_structure.course=".$rs_cls[0]["course_id"]." and cm_terms.status!='2' and cm_asses_structure.status!='2'");
            $i=0;
            $term_text='<h3>Add Subject</h3>';

            $term_text.='<ul>';

			foreach($sub_term as $term)
			{
              if($sub_temp==$term['id'])
             {
                        $sel_text='selected="selected"';
                        //echo $sel_text; exit;
              }
              else
              {
				      	$sel_text='';
                }

                $is_checked="";
                $is_disabled="disabled";
                $ex_date="";
                $ms_date="";
                $es_sub_id="";


                if($record_id!=""){
                  $obj_es = $app->load_model("cm_exam_subjects");
                  $rec_es = $obj_es->execute("SELECT",false,"","sub_id='".$term['id']."' and exam_id='".$record_id_dec."'");               
                  if(count($rec_es)>0){
                    if($rec_es[0]["status"]==1){
                      $is_checked='checked="checked"';
                      $is_disabled="";                                     
                     }
                     $ex_date=$rec_es[0]["exam_date"];
                     $ms_date=$rec_es[0]["m_sub_date"];   
                     $es_sub_id=$rec_es[0]["id"];

                  }
                }
             
               
              // $term_text.='<option value="'.$term['id'].'" '.$sel_text.' >'.$term['subject_name'].'</option>';
                $term_text.='<li id="sub_li_'.$i.'">';
                $term_text.='<div class="row">';
                $term_text.='<div class="col-md-1"><input type="checkbox" class="chkbx_sub" value="'.$term['id'].'" '.$is_checked.' name="sub_exam['.$i.'][sub]" data-id="'.$i.'"/><input type="hidden" class="es_sub_id" value="'.$es_sub_id.'" name="sub_exam['.$i.'][es_id]" /><input type="hidden" class="act_sub_id" value="'.$term['id'].'" name="sub_exam['.$i.'][act_sub_id]" /></div>';
                $term_text.='<div class="col-md-3"><p class="sub_name">'.$term['subject_name'].'</p></div>';
                $term_text.='<div class="col-md-4"><div class="form-group"><div class="input-group date"><input  name="sub_exam['.$i.'][exam_date]" '.$is_disabled.' type="text" value="'.$ex_date.'" class="form-control indatepicker valid"><span class="input-group-addon"><i class="font-icon font-icon-calend"></i></span></div></div></div>';
                $term_text.='<div class="col-md-4"><div class="form-group"><div class="input-group date"><input  name="sub_exam['.$i.'][ms_date]" '.$is_disabled.' type="text" value="'.$ms_date.'" class="form-control indatepicker valid"><span class="input-group-addon"><i class="font-icon font-icon-calend"></i></span></div></div></div>';
                $term_text.='</div>';
                $term_text.='</li>';


                $i++;

			}
            $term_text.='</ul>';

		
		echo $obj_JSON->encode(array("success"=>"0","sub_text"=>$sub_text,"sec_text"=>$sec_text,"term_text"=>$term_text));
	}
	
	
?>