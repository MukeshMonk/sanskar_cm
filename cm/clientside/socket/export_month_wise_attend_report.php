<?php 
	
	$jsonclass = $app->load_module("Services_JSON");
	$exp_id=$app->getPostVar('exp_id');
	$id_decr=$app->cmx->decrypt($exp_id,ency_key);
	
	$obj_model_admin = $app->load_model("cm_markattandence");
    $rsres = $obj_model_admin->execute("SELECT",false,"SELECT cm_markattandence.* FROM cm_markattandence WHERE id!=0 AND status!= 2 AND id=".$id_decr);

	$added_date =$rsres[0]["add_date"];
	 if(count($rsres)>0){
			$end_date_count=date('t',strtotime($added_date));
				$array1=array();
				$ExeclHeads[]='Sr.';
				$ExeclHeads[]='Class';
				$ExeclHeads[]='Acadamic Year';
				$ExeclHeads[]='Roll No.';
                $ExeclHeads[]='Student Name';
				for($j=1;$j<$end_date_count;$j++){
					$ExeclHeads[]=sprintf('%02d', ($j)).'/'.date('m/Y',($added_date));			
				}             
                $ExeclHeads[]='Total Present';
                $ExeclHeads[]='Total Absent';
                
                $obj_model_attendance = $app->load_model("cm_markattandence");
				$rs_ma = $obj_model_attendance->execute("SELECT",false,"SELECT cm_markattandence.id,cm_markattandence.academic_year,cm_markattandence.class_id,cm_markattandence.course,cm_markattandence.sem,cm_markattandence.default_status,cm_classes.abbreviation,cm_academicyears.short_name FROM cm_markattandence LEFT JOIN  cm_classes ON cm_classes.id ='".$rsres[0]['class_id']."' and cm_classes.sem_id='".$rsres[0]['sem']."' LEFT JOIN cm_academicyears ON cm_academicyears.id='".$rsres[0]['academic_year']."' WHERE cm_markattandence.id!=0");

				$obj_model_student = $app->load_model("student");
				$rs_stu = $obj_model_student->execute("SELECT",false,"SELECT student.* FROM student WHERE id!=0 and cm_class_id='".$rsres[0]['class_id']."' order by id_no asc");

				$app->no_html=true;
				$obj_excel = $app->load_module("PHPExcel");
				//SETUP EXCEL HEADS
				
				$i=0+1;
				$full_price_total=0;
				$nights_total=0;
				$nr_pax=0;
				$report_array=array();
				
				$report_array[$i]['abbreviation']=$rs_ma[0]["abbreviation"];
				$report_array[$i]['short_name']=$rs_ma[0]["short_name"];

				foreach($rs_stu as $stu){
					//print_r($date); exit;
					if($stu['id']> 0){

							$report_array[$i]['sr']=$i;
							$report_array[$i]['id_no']=$stu["id_no"];
							$report_array[$i]['stud_name']=$stu['name'];
							$total_present=0;
							$total_absent=0;

							for($j=1;$j<$end_date_count;$j++){
									$date_search=sprintf('%02d', ($j)).'/'.date('m/Y',($added_date));
									$student_id=$stu['id'];
									$class_id=$rsres[0]['class_id'];
									$p_state=$app->cmx->get_student_month_attendance($student_id,$class_id,$date_search);
									$attendence_stu="";
									if($p_state["data"]["default_status"]!=""){
										$attendence_stu=substr($p_state["data"]["default_status"], 0, 1);
									}
									if($attendence_stu=="P"){
										$total_present+=1;
									} 
									else if($attendence_stu=="A")
									{
										$total_absent+=1;
									}
									
									$report_array[$i][$j]=$attendence_stu;			
							}
							$report_array[$i]['total_present']=$total_present;
							$report_array[$i]['total_absent']=$total_absent;
							$i++;
						}
						
					
				}
							
			$array_field=array();
			$data_array=$report_array;
			$fields=array();
				$fields[]='sr';
				$fields[]='abbreviation';
				$fields[]='short_name';
				$fields[]='id_no';
				$fields[]='stud_name';
				for($k=1;$k<$end_date_count;$k++){
					$fields[]=$k;

				}			
				$fields[]='total_present';
				$fields[]='total_absent';

				
			 $excel_postfix="Year_".$rs_ma[0]["short_name"]."Class_".$app->cmx->seo_url($rs_ma[0]['abbreviation']).time(); 
			
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