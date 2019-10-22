<?php 
	
	$jsonclass = $app->load_module("Services_JSON");
	$exp_id=$app->getPostVar('exp_id');
    $id_dec=$app->cmx->decrypt($exp_id,ency_key);
	$fiter_condition="";
	
	$obj_model_admin = $app->load_model("cm_exam_subjects");
	$rsres = $obj_model_admin->execute("SELECT",false,"SELECT cm_exam_subjects.*,exam_schedule.cource_id,exam_schedule.acd_year_id FROM cm_exam_subjects LEFT JOIN exam_schedule ON exam_schedule.id=cm_exam_subjects.exam_id WHERE cm_exam_subjects.id!=0 AND cm_exam_subjects.id=".$id_dec);
	//echo "<pre>"; print_r($rsres); exit;
	if(count($rsres)>0){
				
				$obj_model_admin3 = $app->load_model("student");
				$studentsres3 = $obj_model_admin3->execute("SELECT",false,"","cm_class_id=".$rsres[0]['cource_id']." and status='Active'","id_no ASC");

				$obj_model_gr = $app->load_model("cm_exam_subjects");
                $rs_gr = $obj_model_gr->execute("SELECT",false,"SELECT cm_exam_subjects.*,cm_classes.abbreviation,cm_subjects.subject_code,cm_academicyears.short_name,exam_schedule.cource_id ,exam_schedule.acd_year_id,exam_schedule.term_id,exam_schedule.act_name FROM cm_exam_subjects LEFT JOIN exam_schedule ON exam_schedule.id=cm_exam_subjects.exam_id LEFT JOIN cm_classes ON cm_classes.id='".$rsres[0]['sub_id']."' LEFT JOIN cm_subjects ON cm_subjects.id = '".$rsres[0]['sub_id']."' LEFT JOIN cm_academicyears ON cm_academicyears.id = '".$rsres[0]['acd_year_id']."' WHERE cm_exam_subjects.id!=0 AND cm_exam_subjects.sub_id='".$rsres[0]['sub_id']."' and exam_schedule.acd_year_id='".$rsres[0]['acd_year_id']."' and exam_schedule.cource_id='".$rsres[0]['cource_id']."' and exam_schedule.term_id!=0 GROUP BY exam_schedule.term_id");
			//   echo $obj_model_gr->sql;
			// 	echo "<pre>"; print_r($rs_gr); exit;
			   
			   $obj_model_gr1 = $app->load_model("cm_terms");
			   $rs_gr1 = $obj_model_gr1->execute("SELECT",false,"SELECT cm_terms.* FROM cm_terms LEFT JOIN cm_asses_structure ON cm_terms.assessment_id=cm_asses_structure.id  WHERE cm_terms.id!=0 AND cm_terms.status!=2 AND cm_terms.assessment_id='".$rs_gr[0]['cource_id']."' GROUP BY cm_terms.id");	
			//    foreach($rs_gr1 as $uy){
			// 	echo "<pre>"; print_r($uy);  
			//    }
			$obj_model_sch4 = $app->load_model("cm_asses_structure");
			$total_marks = $obj_model_sch4->execute("SELECT",false,"SELECT cm_asses_structure.marks,cm_asses_structure.course FROM `cm_asses_structure` LEFT JOIN cm_classes ON cm_classes.course_id = cm_asses_structure.course WHERE cm_classes.id=".$rs_gr[0]['cource_id']);
				
			$tt = $total_marks[0]['marks'];
			//echo $tt; exit;
			//echo "<pre>"; print_r($generated4); exit;

				$array1=array();
				$ExeclHeads[]='Sr.';
				$ExeclHeads[]='Class Section';
				$ExeclHeads[]='Roll No.';
				$ExeclHeads[]='Student Name';
				
				foreach($rs_gr as $act){
					$ExeclHeads[] = $act['act_name']; 	
				}
				$ExeclHeads[]='Optain Mark';
				$ExeclHeads[]='Total';
				$app->no_html=true;
				$obj_excel = $app->load_module("PHPExcel");
				//SETUP EXCEL HEADS
				
				$i=0+1;
				$full_price_total=0;
				$nights_total=0;
				$nr_pax=0;
				$report_array=array();
				foreach($studentsres3 as $stu){
					
					if($stu['id']> 0){
						
							$report_array[$i]['sr']=$i;
							$report_array[$i]['abbreviation']=$rs_gr[0]["abbreviation"];
							$report_array[$i]['stud_id_no']=$stu['id_no'];
							$report_array[$i]['stud_name']=$stu['name'];
							$total_m=0;
							foreach($rs_gr as $act){
								$marks_txt=$app->cmx->get_term_marks($stu['id'],$act['cource_id'],$act['term_id'],$act['acd_year_id'],$act['sub_id']);
								
								$report_array[$i][$act['act_name']] = $marks_txt['marks'];
								$total_m += $marks_txt['marks'];
							}
							
							$report_array[$i]['obtain']=$total_m;
							$report_array[$i]['tot']=$tt;
							$i++;			
							
								
						}
						
				}
				
			$array_field=array();
			$data_array=$report_array;
			$fields=array();
				$fields[]='sr';
				$fields[]='abbreviation';
				$fields[]='stud_id_no';
				$fields[]='stud_name';
				foreach($rs_gr as $act){
					$fields[] = $act['act_name']; 	
				}
				$fields[]='obtain';
				$fields[]='tot';
				//  $fields[]='Optain Mark';
				//  $fields[]=;
				 //$fields[]='marks';
            $excel_postfix="Year_".$rs_gr[0]["short_name"]."-"."Class_".$app->cmx->seo_url($rs_gr[0]['abbreviation'])."-"."Subject_".$rs_gr[0]["subject_code"]."_"."Marks_".time(); 
			$filename="report_".$excel_postfix;
			$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
			$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
			$url=SERVER_ROOT.'/cm/download.php?f='.$path;
			echo $jsonclass->encode(array("RESULT"=>"SUCCESS","url"=>$url));	
		
		
	}
	else
	{
		echo $jsonclass->encode(array("RESULT"=>"Error","MSG"=>"No Data found"));			 	
	}
	?>