<?php
    $jsonclass = $app->load_module("Services_JSON");
     $obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
        $obj_model_sch = $app->load_model("exam_schedule");
        $generated = $obj_model_sch->execute("SELECT",false,"SELECT cm_enter_marks.*,exam_schedule.cource_id,exam_schedule.acd_year_id,exam_schedule.max_mark FROM cm_enter_marks LEFT JOIN exam_schedule ON exam_schedule.id = cm_enter_marks.exam_id WHERE exam_schedule.is_attendance='Yes' and exam_schedule.status!='2'");

		$obj_model_sch2 = $app->load_model("cm_exam_subjects");
		$generated2 = $obj_model_sch2->execute("SELECT",false,"SELECT cm_exam_subjects.*,exam_schedule.cource_id,exam_schedule.acd_year_id,exam_schedule.max_mark FROM cm_exam_subjects LEFT JOIN exam_schedule ON exam_schedule.id=cm_exam_subjects.exam_id WHERE exam_schedule.is_attendance='Yes' and exam_schedule.status!='2'");
		
		$obj_model_sch3 = $app->load_model("exam_schedule");
        $generated3 = $obj_model_sch3->execute("SELECT",false,"SELECT * FROM exam_schedule WHERE is_attendance='Yes' and status!='2'");
	//	print_r($generated2); exit;
         if(count($generated)==0 && count($generated2)>0 && count($generated3) > 0)
         {
			 foreach($generated3 as $grs)
			 {
				 $obj_model_admin = $app->load_model("student");
        		 $studentsres = $obj_model_admin->execute("SELECT",false,"","cm_class_id=".$grs['cource_id']." and status='Active'");
				 $obj_model_mkatd = $app->load_model("cm_markattandence");
        		 $res_mkatd = $obj_model_mkatd->execute("SELECT",false,"","class_id=".$grs['cource_id']." and academic_year='".$grs['acd_year_id']."' and division='1'");
				 $working_days=count($res_mkatd);
				 
				
				 
				if(count($studentsres)>0)
				{
					foreach($studentsres as $srs)
					{
						$obj_model_stud_atd = $app->load_model("cm_attendance");
				 		$res_mkatd = $obj_model_mkatd->execute("SELECT",false,"","class_id=".$grs['cource_id']." and acd_year='".$grs['acd_year_id']."' and student_id='".$srs['id']."' and default_status='Present'");
						$present_day=count($res_mkatd);	
						$atd_marks=round($present_day*$grs['max_mark']/$working_days);	
						 $data = array();
							$data["exam_id"] = $grs['id'];							
							$data["student_id"] = $srs['id'];
							$data["student_name"] = $srs['name'];							
							$data["stud_id_no"] =  $srs['id_no'];
							$data['class_id']=$grs['cource_id'];
							$data["mark"] = $atd_marks;
							$data["total_mark"] = $grs['max_mark'];
							$data["remark"] = '';
							$data["added_date"] = time();
							$data["added_by"] = $_SESSION['StaffID'];
							$obj_model_atten = $app->load_model("cm_enter_attendance_marks");		
							$obj_model_atten->map_fields($data);
							$obj_model_atten->execute("INSERT");
							foreach($generated2 as $gen2)
							{
								
								$data2 = array();
								$data2["exam_id"] =$grs['id'];	
								$data2["exam_sub_id"] = $gen2['id'];	
								$data2["student_id"] = $srs['id'];	
								$data2["sub_id"] = $gen2['sub_id'];								
								$data2["class_id"] = $grs['cource_id'];
								$data2["marks"] = $atd_marks;
								$data2["stud_id_no"] = $srs['id_no'];
								$data2["stud_name"] = $srs['name'];
								$data2["add_date"] = time();
								//$data2["default_status"] = $default_status[$i];
								$data2["remarks"] = '';
								$data2["added_on"] = strtotime(date('Y-m-d'));
								$data2["added_by"] = $_SESSION['StaffID'];
								$obj_model_atten2 = $app->load_model("cm_enter_marks");		
								$obj_model_atten2->map_fields($data2);
								$obj_model_atten2->execute("INSERT");
							}
					}
					// $obj_model_update = $app->load_model("exam_schedule",$grs['id']);
					// $obj_model_update->execute("UPDATE",false,"UPDATE exam_schedule SET is_generated='Yes',last_updated='".time()."' where id='".$grs['id']."' and term_id='3' and is_generated='No' and status!='2'");
					 echo $obj_JSON->encode(array("RESULT"=>"OK","refresh_block"=>"attendance_mark","msg"=>"Data Generated Successfully"));
				}
				else
				{
					 echo $obj_JSON->encode(array("RESULT"=>"FAILED","msg"=>"No more data to generate2"));	
				}
                 
			 }
					
    
         }
         else
         {
                 echo $obj_JSON->encode(array("RESULT"=>"FAILED","msg"=>"No more data to generate1"));	
  
         }
       

?>