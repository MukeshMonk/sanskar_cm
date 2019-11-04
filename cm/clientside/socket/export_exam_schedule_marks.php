<?php 
	
	$jsonclass = $app->load_module("Services_JSON");
	$exp_id=$app->getPostVar('exp_id');
	$id_decr=$app->cmx->decrypt($exp_id,ency_key);
	$fiter_condition="";
	
	$obj_model_admin = $app->load_model("cm_exam_subjects");
	$rsres = $obj_model_admin->execute("SELECT",false,"SELECT cm_exam_subjects.*,exam_schedule.cource_id,exam_schedule.acd_year_id,exam_schedule.term_id FROM cm_exam_subjects LEFT JOIN exam_schedule ON exam_schedule.id=cm_exam_subjects.exam_id WHERE cm_exam_subjects.id!=0 AND cm_exam_subjects.id=".$id_decr);

	if(count($rsres)>0){
				$obj_model_admin2 = $app->load_model("cm_enter_marks");
				$rsres2 = $obj_model_admin2->execute("SELECT",false,"SELECT cm_enter_marks.*,cm_classes.abbreviation FROM cm_enter_marks LEFT JOIN cm_classes ON cm_classes.id=cm_enter_marks.class_id WHERE cm_enter_marks.class_id=".$rsres[0]['cource_id']);
				
				$obj_model_admin3 = $app->load_model("student");
				$studentsres3 = $obj_model_admin3->execute("SELECT",false,"","cm_class_id=".$rsres[0]['cource_id']." and status='Active'","id_no ASC");

				$obj_model_gr = $app->load_model("cm_exam_subjects");
				$rs_gr = $obj_model_gr->execute("SELECT",false,"SELECT cm_exam_subjects.*,cm_subjects.subject_code,cm_classes.abbreviation,cm_academicyears.short_name,exam_schedule.cource_id,exam_schedule.acd_year_id,exam_schedule.term_id,exam_schedule.act_name FROM cm_exam_subjects LEFT JOIN exam_schedule ON exam_schedule.id=cm_exam_subjects.exam_id LEFT JOIN cm_academicyears ON cm_academicyears.id = '".$rsres[0]['acd_year_id']."' LEFT JOIN cm_classes ON cm_classes.id='".$rsres2[0]['class_id']."' LEFT JOIN cm_subjects ON cm_subjects.id = '".$rsres[0]['sub_id']."' WHERE cm_exam_subjects.id!=0 AND cm_exam_subjects.sub_id='".$rsres[0]['sub_id']."' and exam_schedule.acd_year_id='".$rsres[0]['acd_year_id']."' and exam_schedule.cource_id='".$rsres[0]['cource_id']."'");
	
				$array1=array();
				$ExeclHeads[]='Sr.';
				$ExeclHeads[]='Class Section';
				$ExeclHeads[]='Roll No.';
				$ExeclHeads[]='Student Name';
				
				foreach($rs_gr as $act){
					
					$ExeclHeads[] = $act['act_name']; 	
				}
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
							$report_array[$i]['abbreviation']=$rsres2[0]["abbreviation"];
							$report_array[$i]['stud_id_no']=$stu['id_no'];
							$report_array[$i]['stud_name']=$stu['name'];
							foreach($rs_gr as $act){
								//print_r($act);
								$marks_stu=$app->cmx->get_marks($act['sub_id'],$stu['id'],$act['id'],$act['exam_id']);
								$report_array[$i][$act['act_name']] = $marks_stu['marks']; 
								//echo "hi"; print_r($marks_stu); exit;
							}
							
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
			 $excel_postfix="Year_".$rs_gr[0]["short_name"]."Class_".$app->cmx->seo_url($rs_gr[0]['abbreviation'])."Subject_".$rs_gr[0]["subject_code"]."_"."Marks_".time(); 
			
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
	// $obj_model_gr = $app->load_model("cm_enter_marks");
	// $result = $obj_model_gr->execute("SELECT",false,
	// "SELECT cm_exam_subjects.id,cm_classes.abbreviation,cm_subjects.subject_code,cm_academicyears.short_name,
	// cm_exam_subjects.exam_id,cm_exam_subjects.sub_id,exam_schedule.cource_id,exam_schedule.term_id,exam_schedule.act_name,cm_enter_marks.* FROM cm_enter_marks 
	// LEFT JOIN cm_exam_subjects ON cm_enter_marks.sub_id='".$rsres[0]['sub_id']."' LEFT JOIN exam_schedule ON exam_schedule.id=cm_exam_subjects.exam_id
	// LEFT JOIN cm_classes ON cm_classes.id=cm_enter_marks.class_id LEFT JOIN cm_subjects ON cm_subjects.id = '".$rsres[0]['sub_id']."'
	// LEFT JOIN cm_academicyears ON cm_academicyears.id = exam_schedule.acd_year_id WHERE cm_exam_subjects.id!=0 
	// AND cm_exam_subjects.sub_id='".$rsres[0]['sub_id']."' AND exam_schedule.cource_id='".$rsres[0]['cource_id']."' group by cm_enter_marks.id");

	//echo $obj_model_gr->sql;exit;
	
	// if(count($result)>0)
	//  {
	// 	 	$app->no_html=true;
	// 		$obj_excel = $app->load_module("PHPExcel");
	// 		//SETUP EXCEL HEADS
	// 		$ExeclHeads=array("Sr.","Class Section","Roll No.","Student Name","TEST1","ASSIGNMENT1","OB1","TEST2","OB2","Obtained Marks","Remarks");	
	// 		$i=0+1;
	// 		$full_price_total=0;
	// 		$nights_total=0;
	// 		$nr_pax=0;
		
	// 		foreach($result as $row)
	// 		{
	// 				$report_array[]=array("sr"=>$i,
	// 					"stud_id_no"=>$row["stud_id_no"],
	// 					"stud_name"=>$row["stud_name"],
	// 					"abbreviation"=>$row["abbreviation"],
	// 					"marks"=> $row["marks"],
	// 					"remarks"=> $row["remarks"]);
	// 					$i++;
			
	// 		}
	// 		$array_field=array();
	// 		$data_array=$report_array;
	// 		$fields=array("sr","abbreviation","stud_id_no","stud_name","marks","test1","assignment1","obj1","test2","obj2","remarks");		
	// 		$excel_postfix="Year_".$row["short_name"]."Class_".$app->cmx->seo_url($row['abbreviation'])."Subject_".$row["subject_code"]."_"."Marks_".time(); 
	// 		$filename="report_".$excel_postfix;
	// 		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
	// 		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
	// 		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
	// 		echo $jsonclass->encode(array("RESULT"=>"SUCCESS","url"=>$url));			 	
	//  }
	//  else
	//  {
	// 	 echo $jsonclass->encode(array("RESULT"=>"Error","MSG"=>"No Data found"));			 	
	//  }
	?>