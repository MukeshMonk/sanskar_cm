<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");
	$data = array();
	$item_id=$app->getPostVar("update_id");
	$updated_id=$app->cmx->decrypt($item_id,ency_key);	
	  if($app->getPostVar('first_name1')!= NULL)
	  {
		
		if($item_id=="")
		{
			
			
			/* Image Upload*/
			$field_name="profile_img";
			   if(!empty($_FILES[$field_name]['name']))
			   {
							$max_size=2;
							$size=filesize($_FILES[$field_name]['name']);
							$file_name1 = basename($_FILES[$field_name]['name']);
							$file_info1 = $app->utility->get_file_info($file_name1);
							$uploaded_filename=$file_info1->filename;

						if(strtoupper($file_info1->extension)=="JPG"
						|| strtoupper($file_info1->extension)=="GIF"
						|| strtoupper($file_info1->extension)=="PNG"
						|| strtoupper($file_info1->extension)=="PDF"
						)
						{
							$new_name1 = $file_name1;
							$file_new_name=$app->utility->seo_url($uploaded_filename);
							$file_new_name=$file_new_name.time().'.'.$file_info1->extension;
							if($app->utility->upload_file($_FILES[$field_name]))
							{
								if($app->utility->store_uploaded_file($app->get_user_config("student_image"), $file_new_name))			{		
								$data["profile_img"]=$file_new_name;
							}									 
							 	$app->utility->remove_uploaded_file();
							}
						}
				 }
			
			
			$coursename = $app->cmx->get_course_name($app->getPostVar('cm_course'));
			$religioname = $app->cmx->get_religion_name($app->getPostVar('cm_religion'));
			$categoryname = $app->cmx->get_religion_category_name($app->getPostVar('cm_category'));
			
			
			
			
			$data["name"] = $app->getPostVar('first_name1').' '.$app->getPostVar('middle_name1').' '.$app->getPostVar('last_name1');
			$data["cm_first_name"] = $app->getPostVar('first_name1');
			$data["cm_middle_name"] = $app->getPostVar('middle_name1');
			$data["cm_last_name"] = $app->getPostVar('last_name1');
			$data["mothername"] = $app->getPostVar('mother_name1');			
			$data["gender"] = $app->getPostVar('gender');
			$data["category"] = $categoryname[0]['name'];
			$data["cm_category"] = $app->getPostVar('cm_category');
			$data["blood_group"] = $app->getPostVar('blood_group1');
			$data["religion"] = $religioname[0]['name'];
			$data["cm_religion"] = $app->getPostVar('cm_religion');
			$data["cast"] = $app->getPostVar('cast1');
			$data["branch"] = $coursename[0]['course_name'];
			$data["cm_course"] = $app->getPostVar('cm_course');
			$data["sem"] = $app->getPostVar('sem');
			$data["division"] = $app->getPostVar('division');
			$data["id_no"] = $app->getPostVar('id_no1');
			$data["dob"] = date('Y-m-d',strtotime($app->getPostVar('dob1')));
			$data["birth_place"] = $app->getPostVar('birth_place1');
			$data["email"] = $app->getPostVar('email1');
			$data["password"] = $app->getPostVar('password1');
			$data["address"] = $app->getPostVar('current_address_line11').' '.$app->getPostVar('current_address_line21');	
			$data["city"] = $app->getPostVar('current_city1');
			$data["taluka"] = $app->getPostVar('current_taluka1');
			$data["district"] = $app->getPostVar('current_district1');
			$data["pin_code"] = $app->getPostVar('current_zipcode1');		
			$data["fee_status"] = $app->getPostVar('fee_status1');
			$data["fee_amount"] = $app->getPostVar('fee_amount1');
			$data["fee_last_date"] = date('Y-m-d',strtotime($app->getPostVar('fee_last_date1')));
			$data["fee_late_charge"] = $app->getPostVar('fee_late_charge1');
			$data["transaction_id"] = $app->getPostVar('transaction_id1');
			$data["transaction_date"] = date('Y-m-d',strtotime($app->getPostVar('transaction_date1')));		
			$data["cm_permenent_address_line1"] = $app->getPostVar('permenent_address_line11');
			$data["cm_current_address_line1"] = $app->getPostVar('current_address_line11');
			$data["cm_permenent_address_line2"] = $app->getPostVar('permenent_address_line21');
			$data["cm_current_address_line2"] = $app->getPostVar('current_address_line21');
			$data["cm_permenent_city"] = $app->getPostVar('permenent_city1');
			$data["cm_current_city"] = $app->getPostVar('current_city1');
			$data["cm_permenent_taluka"] = $app->getPostVar('permenent_taluka1');
			$data["cm_current_taluka"] = $app->getPostVar('current_taluka1');
			$data["cm_permenent_district"] = $app->getPostVar('permenent_district1');
			$data["cm_current_district"] = $app->getPostVar('current_district1');
			$data["cm_permenent_state"] = $app->getPostVar('permenent_state1');
			$data["cm_current_state"] = $app->getPostVar('current_state1');
			$data["cm_permenent_zipcode"] = $app->getPostVar('permenent_zipcode1');
			$data["cm_current_zipcode"] = $app->getPostVar('current_zipcode1');
			$data["cm_class_id"] = $app->getPostVar('cm_class_id');
			$data["student_mobile_no"] = $app->getPostVar('mobile_no1');
			$data["parents_residence_no"] = $app->getPostVar('residence_no1');
			$data["parents_mobile_no"] = $app->getPostVar('parents_mobile_no1');
			$data["parents_office_no"] = $app->getPostVar('parents_office_no1');
			$data["cm_occupation_of_father"] = $app->getPostVar('cm_occupation_of_father');
			$data["cm_guardian_annual_income"] = $app->getPostVar('guardian_annual_income1');
			$data["cm_physically_handicap"] = $app->getPostVar('physically_handicap1');
			$data["cm_academic_year"] = $app->getPostVar('cm_academic_year');
			$data["cm_date_of_admission"] = date('Y-m-d',strtotime($app->getPostVar('date_of_admission1')));
			$data["cm_enrollment_no"] = $app->getPostVar('enrollment_no1');
			$data["cm_prn_no"] = $app->getPostVar('prn_no1');	
			$data["cm_prev_school_college"] = $app->getPostVar('cm_prev_school_college');
			$data["status"] = $app->getPostVar('status1');
			$data['cm_added_on'] = time();
			$data['cm_added_by'] = $_SESSION['StaffID'];			
			$obj_model_log = $app->load_model("student");
			$obj_model_log->map_fields($data);
			$lastid=$obj_model_log->execute("INSERT");
			$msg="Student Added Successfully.";
			
			/*
			$exams = $app->getPostVar('exam_name');
			$school_name = $app->getPostVar('school_name');
			$exam_seat_no = $app->getPostVar('exam_seat_no');
			$total_marks = $app->getPostVar('total_marks');
			$obtaine_marks = $app->getPostVar('obtaine_marks');
			$precentage = $app->getPostVar('precentage');
			$steam = $app->getPostVar('steam');
			$grade = $app->getPostVar('grade');
			
			$exam = array();
			foreach($exams as $k => $examname)
			{
				$exam['student_id'] = $lastid;
				$exam['exam_name1'] = $examname;
				$exam['name_of_the_college1'] = $school_name[$k];
				$exam['exam_seat_number1'] = $exam_seat_no[$k];
				$exam['total_marks1'] = $total_marks[$k];
				$exam['obtained_marks1'] = $obtaine_marks[$k];
				$exam['percentage1'] = $precentage[$k];
				$exam['steam1'] = $steam[$k];
				$exam['grade1'] = $grade[$k];
				if($status!="")
				{
					$exam['status'] = $status;
				}
				else
				{
					$exam['status'] = 1;
				}
				$exam['added_on'] = time();
				$exam['added_by'] = $_SESSION['StaffID'];
				
				$obj_model_exam = $app->load_model("cm_lastpassedexam");
				$obj_model_exam->map_fields($exam);
				$ins=$obj_model_exam->execute("INSERT");		
			}
			*/
			$reg_id_num=0;
			$cm_cnf_id = $app->getPostVar('cm_cnf_id'); 
			if($cm_cnf_id!=''){
				
				$obj_model_cnf = $app->load_model("cm_confirmation",$cm_cnf_id);
				$rs_cnf=$obj_model_cnf->execute("SELECT");
				if(count($rs_cnf)>0)
				{
					$reg_id_num=$rs_cnf[0]['reg_id'];
				}
			}
			$exam_name = $app->getPostVar('exam_name');
			$str_name = $app->getPostVar('str_name');
			$board_name = $app->getPostVar('board_name');
			$school_name = $app->getPostVar('school_name');
			//$pass_year = $app->getPostVar('pass_year');
			$range_month = $app->getPostVar('range_month');
			$range_year = $app->getPostVar('range_year');
			$exam_seat_no = $app->getPostVar('exam_seat_no');
			$cert_no = $app->getPostVar('cert_no');
			$total_marks = $app->getPostVar('total_marks');
			$obtaine_marks = $app->getPostVar('obtaine_marks');
			$percen = $app->getPostVar('percen');
			$grade = $app->getPostVar('grade');
			$pec_no = $app->getPostVar('pec_no');
			//echo "count=".count($exam_name);
			for($i=0;$i<count($exam_name);$i++)
			{
				$exam = array();
				$exam['reg_id'] = $reg_id_num;
				$exam['student_id'] = $lastid;
				$exam['exam_name1'] = $exam_name[$i];
				$exam['stream_name'] = $str_name[$i];
				$exam['board_name1'] = $board_name[$i];
				$exam['school_name1'] = $school_name[$i];
				$exam['pass_year1'] = $range_month[$i]."-".$range_year[$i];
				$exam['exam_no1'] = $exam_seat_no[$i];
				$exam['certi_no1'] = $cert_no[$i];
				$exam['total_marks1'] = $total_marks[$i];
				$exam['obtained_marks_new'] = $obtaine_marks[$i];
				$exam['percen_new'] = $percen[$i];
				$exam['cgpa_grade'] = $grade[$i];
				$exam['pec_no_new'] = $pec_no[$i];
			
				$obj_model_exam = $app->load_model("cm_last_exam");
				$obj_model_exam->map_fields($exam);
				$ins=$obj_model_exam->execute("INSERT");	
				//echo $exam_name[$i]." ".$board_name[$i]." ".$school_name[$i]." ".$pass_year[$i]." ".$exam_seat_no[$i]." ".$cert_no[$i]." ".$total_marks[$i]." ".$obtaine_marks[$i]." ".$grade[$i] ;
			}
			
		}
		else
		{
			$field_name="profile_img";   
			if($_FILES[$field_name]['name'] != '')
		    {		   				   	   	
				$max_size=2;
				$size=filesize($_FILES[$field_name]['name']);
				$file_name1 = basename($_FILES[$field_name]['name']);
				$file_info1 = $app->utility->get_file_info($file_name1);
				$uploaded_filename=$file_info1->filename;

				if(strtoupper($file_info1->extension)=="JPG"
				|| strtoupper($file_info1->extension)=="GIF"
				|| strtoupper($file_info1->extension)=="PNG"
				|| strtoupper($file_info1->extension)=="PDF"
				)
				{
					$new_name1 = $file_name1;
					$file_new_name=$app->utility->seo_url($uploaded_filename);
					$file_new_name=$file_new_name.time().'.'.$file_info1->extension;
					if($app->utility->upload_file($_FILES[$field_name]))
					{
						if($app->utility->store_uploaded_file($app->get_user_config("student_image"), $file_new_name))			
						{
										
							$data["profile_img"] = $file_new_name;
						}									 
					 		$app->utility->remove_uploaded_file();
					}
				}
			}else
			{
				$data["profile_img"] = $app->getPostVar('hiddenimageprofile');
			}
			
			
			$coursename = $app->cmx->get_course_name($app->getPostVar('cm_course'));
			$religioname = $app->cmx->get_religion_name($app->getPostVar('cm_religion'));
			$categoryname = $app->cmx->get_religion_category_name($app->getPostVar('cm_religion'));
			
			
			$data["name"] = $app->getPostVar('first_name1').' '.$app->getPostVar('middle_name1').' '.$app->getPostVar('last_name1');
			$data["cm_first_name"] = $app->getPostVar('first_name1');
			$data["cm_middle_name"] = $app->getPostVar('middle_name1');
			$data["cm_last_name"] = $app->getPostVar('last_name1');
			$data["mothername"] = $app->getPostVar('mother_name1');			
			$data["gender"] = $app->getPostVar('gender');
			$data["category"] = $categoryname[0]['name'];
			$data["cm_category"] = $app->getPostVar('cm_category');
			$data["blood_group"] = $app->getPostVar('blood_group1');
			$data["religion"] = $religioname[0]['name'];
			$data["cm_religion"] = $app->getPostVar('cm_religion');
			$data["cast"] = $app->getPostVar('cast1');
			$data["branch"] = $coursename[0]['course_name'];
			$data["cm_course"] = $app->getPostVar('cm_course');
			$data["sem"] = $app->getPostVar('sem');
			$data["division"] = $app->getPostVar('division');
			$data["id_no"] = $app->getPostVar('id_no1');
			$data["dob"] = date('Y-m-d',strtotime($app->getPostVar('dob1')));
			$data["birth_place"] = $app->getPostVar('birth_place1');
			$data["email"] = $app->getPostVar('email1');
			
			if($app->getPostVar('password1') != '')
			{
				$data["password"] = $app->getPostVar('password1');
			}
			
			$data["address"] = $app->getPostVar('current_address_line11').' '.$app->getPostVar('current_address_line21');	
			$data["city"] = $app->getPostVar('current_city1');
			$data["taluka"] = $app->getPostVar('current_taluka1');
			$data["district"] = $app->getPostVar('current_district1');
			$data["pin_code"] = $app->getPostVar('current_zipcode1');		
			$data["fee_status"] = $app->getPostVar('fee_status1');
			$data["fee_amount"] = $app->getPostVar('fee_amount1');
			$data["fee_last_date"] = date('Y-m-d',strtotime($app->getPostVar('fee_last_date1')));
			$data["fee_late_charge"] = $app->getPostVar('fee_late_charge1');
			$data["transaction_id"] = $app->getPostVar('transaction_id1');
			$data["transaction_date"] = date('Y-m-d',strtotime($app->getPostVar('transaction_date1')));			
			$data["cm_permenent_address_line1"] = $app->getPostVar('permenent_address_line11');
			$data["cm_current_address_line1"] = $app->getPostVar('current_address_line11');
			$data["cm_permenent_address_line2"] = $app->getPostVar('permenent_address_line21');
			$data["cm_current_address_line2"] = $app->getPostVar('current_address_line21');
			$data["cm_permenent_city"] = $app->getPostVar('permenent_city1');
			$data["cm_current_city"] = $app->getPostVar('current_city1');
			$data["cm_permenent_taluka"] = $app->getPostVar('permenent_taluka1');
			$data["cm_current_taluka"] = $app->getPostVar('current_taluka1');
			$data["cm_permenent_district"] = $app->getPostVar('permenent_district1');
			$data["cm_current_district"] = $app->getPostVar('current_district1');
			$data["cm_permenent_state"] = $app->getPostVar('permenent_state1');
			$data["cm_current_state"] = $app->getPostVar('current_state1');
			$data["cm_permenent_zipcode"] = $app->getPostVar('permenent_zipcode1');
			$data["cm_current_zipcode"] = $app->getPostVar('current_zipcode1');
			$data["cm_class_id"] = $app->getPostVar('cm_class_id');
			$data["student_mobile_no"] = $app->getPostVar('mobile_no1');
			$data["parents_residence_no"] = $app->getPostVar('residence_no1');
			$data["parents_mobile_no"] = $app->getPostVar('parents_mobile_no1');
			$data["parents_office_no"] = $app->getPostVar('parents_office_no1');
			$data["cm_occupation_of_father"] = $app->getPostVar('cm_occupation_of_father');
			$data["cm_guardian_annual_income"] = $app->getPostVar('guardian_annual_income1');
			$data["cm_physically_handicap"] = $app->getPostVar('physically_handicap1');
			$data["cm_academic_year"] = $app->getPostVar('cm_academic_year');
			$data["cm_date_of_admission"] = date('Y-m-d',strtotime($app->getPostVar('date_of_admission1')));
			$data["cm_enrollment_no"] = $app->getPostVar('enrollment_no1');
			$data["cm_prn_no"] = $app->getPostVar('prn_no1');	
			$data["cm_prev_school_college"] = $app->getPostVar('cm_prev_school_college');
			$data["status"] = $app->getPostVar('status1');
			
			
			
			$update_field['cm_last_updated'] = time();						
			$obj_model_log = $app->load_model("student",$updated_id);
			$obj_model_log->map_fields($data);
			$ins=$obj_model_log->execute("UPDATE");
			$reg_id_num=0;
			
			if($updated_id >0)
			{
				$obj_delete_exam = $app->load_model("cm_last_exam");
				$obj_delete_exam->execute("DELETE",false,"","student_id=".$updated_id);	
			}
			$cm_cnf_id = $app->getPostVar('cm_cnf_id');
			if($cm_cnf_id!=''){
				
				$obj_model_cnf = $app->load_model("cm_confirmation",$cm_cnf_id);
				$rs_cnf=$obj_model_cnf->execute("SELECT");
				if(count($rs_cnf)>0)
				{
					$reg_id_num=$rs_cnf[0]['reg_id']; 
				}
			}		
			$exam_name = $app->getPostVar('exam_name');
			$str_name = $app->getPostVar('str_name');
			$board_name = $app->getPostVar('board_name');
			$school_name = $app->getPostVar('school_name');
			$range_month = $app->getPostVar('range_month');
			$range_year = $app->getPostVar('range_year');
			$exam_seat_no = $app->getPostVar('exam_seat_no');
			$cert_no = $app->getPostVar('cert_no');
			$total_marks = $app->getPostVar('total_marks');
			$obtaine_marks = $app->getPostVar('obtaine_marks');
			$percen = $app->getPostVar('percen');
			$grade = $app->getPostVar('grade');
			$pec_no = $app->getPostVar('pec_no');
			for($i=0;$i<count($exam_name);$i++)
			{
				$exam = array();
				$exam['reg_id'] = $reg_id_num;
				$exam['student_id'] = $updated_id;
				$exam['exam_name1'] = $exam_name[$i];
				$exam['stream_name'] = $str_name[$i]; 
				$exam['board_name1'] = $board_name[$i];
				$exam['school_name1'] = $school_name[$i];
				$exam['pass_year1'] = $range_month[$i]."-".$range_year[$i];
				$exam['exam_no1'] = $exam_seat_no[$i];
				$exam['certi_no1'] = $cert_no[$i];
				$exam['total_marks1'] = $total_marks[$i];
				$exam['obtained_marks_new'] = $obtaine_marks[$i];
				$exam['percen_new'] = $percen[$i];
				$exam['cgpa_grade'] = $grade[$i];
				$exam['pec_no_new'] = $pec_no[$i];
			
				$obj_model_exam = $app->load_model("cm_last_exam");
				$obj_model_exam->map_fields($exam);
				$ins=$obj_model_exam->execute("INSERT");	
				
			}			 
			$msg="Student Updated Successfully.";			
		}	
			$app->utility->set_message($msg,"SUCCESS");	
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"students","URL"=>CMX_ROOT.'/studententry/students/'));			 	
	 	 //$app->utility->set_message("Student Updated Successfully.", "SUCCESS");
		 //$app->redirect(CMX_ROOT . '/studententry/students/');
	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>