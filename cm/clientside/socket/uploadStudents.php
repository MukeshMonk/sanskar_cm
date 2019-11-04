<?php
date_default_timezone_set('Asia/Kolkata');
ini_set("display_errors",1);
$jsonclass = $app->load_module("Services_JSON");
$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
$filename=$app->getPostVar("fnm");
$inputFileName = ABS_PATH.$app->get_user_config("importfiles").$filename;
if(file_exists($inputFileName) && $filename!="")
{
	//$data_new=array();
	//$data_new["status"] = 'Inactive';
	//$obj_model_stud_new = $app->load_model("student");
	//$obj_model_stud_new->map_fields($data_new);
	//$ins_stud_new=$obj_model_stud_new->execute("UPDATE");
	
		$obj_excel = $app->load_module("PHPExcel");
		$path = $inputFileName;
		$objPHPExcel = PHPExcel_IOFactory::load($path);
		$error=array();
		$lid=array();
	 foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
	 {
	  $worksheetTitle     = $worksheet->getTitle();
    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;
		
					$excel_array=array();
				  for($row = 2; $row <= $highestRow; ++ $row)
				  {
						//student
						//$id=$objPHPExcel->getActiveSheet()->getCell('A'.$row)->getValue();
						
						$fname=$objPHPExcel->getActiveSheet()->getCell('A'.$row)->getValue();
						$mname=$objPHPExcel->getActiveSheet()->getCell('B'.$row)->getValue();
						$lname=$objPHPExcel->getActiveSheet()->getCell('C'.$row)->getValue();
						$mothername=$objPHPExcel->getActiveSheet()->getCell('D'.$row)->getValue();
						$gender=$objPHPExcel->getActiveSheet()->getCell('E'.$row)->getValue();
						$student_image=$objPHPExcel->getActiveSheet()->getCell('F'.$row)->getValue();
						$category=$objPHPExcel->getActiveSheet()->getCell('G'.$row)->getValue();
						$blood_group=$objPHPExcel->getActiveSheet()->getCell('H'.$row)->getValue();
						
						$religion=$objPHPExcel->getActiveSheet()->getCell('I'.$row)->getValue();
						$cast=$objPHPExcel->getActiveSheet()->getCell('J'.$row)->getValue();
						
				
						$course=$objPHPExcel->getActiveSheet()->getCell('K'.$row)->getValue();
						$semester=$objPHPExcel->getActiveSheet()->getCell('L'.$row)->getValue();
						$division=$objPHPExcel->getActiveSheet()->getCell('M'.$row)->getValue();
						$id_no=$objPHPExcel->getActiveSheet()->getCell('N'.$row)->getValue();
						$birth_date=$objPHPExcel->getActiveSheet()->getCell('O'.$row)->getFormattedValue();
						$birth_place=$objPHPExcel->getActiveSheet()->getCell('P'.$row)->getValue();

						$email=$objPHPExcel->getActiveSheet()->getCell('Q'.$row)->getValue();
						$econnectpassword=$objPHPExcel->getActiveSheet()->getCell('R'.$row)->getValue();
						
						$address_line1=$objPHPExcel->getActiveSheet()->getCell('S'.$row)->getValue();
						$address_line2=$objPHPExcel->getActiveSheet()->getCell('T'.$row)->getValue();
						$city=$objPHPExcel->getActiveSheet()->getCell('U'.$row)->getValue();
						$taluka=$objPHPExcel->getActiveSheet()->getCell('V'.$row)->getValue();
						$district=$objPHPExcel->getActiveSheet()->getCell('W'.$row)->getValue();
						$state=$objPHPExcel->getActiveSheet()->getCell('X'.$row)->getValue();
						$zipcode=$objPHPExcel->getActiveSheet()->getCell('Y'.$row)->getValue();
						
						$address2_line1=$objPHPExcel->getActiveSheet()->getCell('Z'.$row)->getValue();
						$address2_line2=$objPHPExcel->getActiveSheet()->getCell('AA'.$row)->getValue();
						
						$city2=$objPHPExcel->getActiveSheet()->getCell('AB'.$row)->getValue();
						$taluka2=$objPHPExcel->getActiveSheet()->getCell('AC'.$row)->getValue();
						$district2=$objPHPExcel->getActiveSheet()->getCell('AD'.$row)->getValue();
						$state2=$objPHPExcel->getActiveSheet()->getCell('AE'.$row)->getValue();
						$zipcode2=$objPHPExcel->getActiveSheet()->getCell('AF'.$row)->getValue();
						$class2=$objPHPExcel->getActiveSheet()->getCell('AG'.$row)->getValue();
						$mobileno2=$objPHPExcel->getActiveSheet()->getCell('AH'.$row)->getValue();
						$residentn2=$objPHPExcel->getActiveSheet()->getCell('AI'.$row)->getValue();
						$parentmobileno=$objPHPExcel->getActiveSheet()->getCell('AJ'.$row)->getValue();
						$parentofficeno=$objPHPExcel->getActiveSheet()->getCell('AK'.$row)->getValue();
						$occupationfather=$objPHPExcel->getActiveSheet()->getCell('AL'.$row)->getValue();
						$guardianannualincome=$objPHPExcel->getActiveSheet()->getCell('AM'.$row)->getValue();
						$ph_handicap=$objPHPExcel->getActiveSheet()->getCell('AN'.$row)->getValue();
						$academicyear=$objPHPExcel->getActiveSheet()->getCell('AO'.$row)->getValue();
						$feessatus=$objPHPExcel->getActiveSheet()->getCell('AP'.$row)->getValue();
						$feeamount=$objPHPExcel->getActiveSheet()->getCell('AQ'.$row)->getValue();
						$feeslastdate=$objPHPExcel->getActiveSheet()->getCell('AR'.$row)->getFormattedValue();
						$latefeecharge=$objPHPExcel->getActiveSheet()->getCell('AS'.$row)->getValue();
						$transactionid=$objPHPExcel->getActiveSheet()->getCell('AT'.$row)->getValue();
						$transactiondate=$objPHPExcel->getActiveSheet()->getCell('AU'.$row)->getFormattedValue();
						$status=$objPHPExcel->getActiveSheet()->getCell('AV'.$row)->getValue();
						$dateofaddmision=$objPHPExcel->getActiveSheet()->getCell('AW'.$row)->getFormattedValue();
						$entrolmentno=$objPHPExcel->getActiveSheet()->getCell('AX'.$row)->getValue();
						$prnno=$objPHPExcel->getActiveSheet()->getCell('AY'.$row)->getValue();
						$nameprevschl=$objPHPExcel->getActiveSheet()->getCell('AZ'.$row)->getValue();
						$obj_model_studcheck = $app->load_model("student");
						$rs_std=$obj_model_studcheck->execute("SELECT",false,"","id_no='".$id_no."'");
						if(count($rs_std)>0)
						{
							$data = array();	
							$data["profile_img"] = $student_image;
							
							//$coursename = $app->cmx->get_course_name($app->getPostVar('cm_course'));
							//$religioname = $app->cmx->get_religion_name($app->getPostVar('cm_religion'));
							//$categoryname = $app->cmx->get_religion_category_name($app->getPostVar('cm_religion'));
							$cm_category = $app->cmx->getFieldId("cm_categories","id",array("name"=>$category));
							$cm_religion = $app->cmx->getFieldId("cm_religions","id",array("name"=>$religion));
							$cm_course = $app->cmx->getFieldId("cm_course","id",array("course_name"=>$course));
							$cm_classes = $app->cmx->getFieldId("cm_classes","id",array("abbreviation"=>$course." SEM. ".preg_replace('/[^0-9]/', '', $semester)));
							$cm_academicyears = $app->cmx->getFieldId("cm_academicyears","id",array("short_name"=>$academicyear));
							$data["name"] = $fname.' '.$mname.' '.$lname;
							$data["cm_first_name"] = $fname;
							$data["cm_middle_name"] = $mname;
							$data["cm_last_name"] = $lname;
							$data["mothername"] = $mothername;			
							$data["gender"] = $gender;
							$data["category"] = $category;
							$data["cm_category"] = $cm_category;
							$data["blood_group"] = $blood_group;
							$data["religion"] = $religion;
							$data["cm_religion"] = $cm_religion;
							$data["cast"] = $cast;
							$data["branch"] = $course;
							$data["cm_course"] = $cm_course;
							$data["sem"] = preg_replace('/[^0-9]/', '', $semester);//$semester;
							$data["division"] = $division;
							//$data["id_no"] = $app->getPostVar('id_no1');
							//$date = str_replace('/', '-', $birth_date);
							$data["dob"] = $birth_date;// date('Y-m-d', strtotime($birth_date));
							//$data["birth_place"] = $birth_place;
							$data["email"] = $email;
							if($econnectpassword != '')
							{
								$data["password"] = $econnectpassword;
							}
							$data["address"] = $address_line1.' '.$address_line2;	
							$data["city"] = $city;
							$data["taluka"] = $taluka;
							$data["district"] = $district;
							$data["pin_code"] = $zipcode;		
							$data["fee_status"] = $feessatus;
							$data["fee_amount"] = $feeamount;
							//$date = str_replace('/', '-', $feeslastdate);
							$data["fee_last_date"] = date('Y-m-d', strtotime($feeslastdate));
							//$data["fee_last_date"] = $feeslastdate;
							$data["fee_late_charge"] = $latefeecharge;
							$data["transaction_id"] = $transactionid;
							//$date = str_replace('/', '-', $transactiondate);
							//$data["transaction_date"] = date('Y-m-d', strtotime($date));
							$data["transaction_date"] = date('Y-m-d', strtotime($transactiondate));//strtotime($));//$;			
							$data["cm_permenent_address_line1"] = $address2_line1;
							$data["cm_current_address_line1"] = $address_line1;
							$data["cm_permenent_address_line2"] = $address2_line2;
							$data["cm_current_address_line2"] = $address_line2;
							$data["cm_permenent_city"] = $city2;
							$data["cm_current_city"] = $city;
							$data["cm_permenent_taluka"] = $taluka2;
							$data["cm_current_taluka"] = $taluka;
							$data["cm_permenent_district"] = $district2;
							$data["cm_current_district"] = $district;
							$data["cm_permenent_state"] = $state2;
							$data["cm_current_state"] = $state;
							$data["cm_permenent_zipcode"] = $zipcode2;
							$data["cm_current_zipcode"] = $zipcode;
							$data["cm_class_id"] = $cm_classes;
							$data["student_mobile_no"] = $mobileno2;
							$data["parents_residence_no"] = $residentn2;
							$data["parents_mobile_no"] =$parentmobileno;
							$data["parents_office_no"] = $parentofficeno;
							$data["cm_occupation_of_father"] = $occupationfather;
							$data["cm_guardian_annual_income"] = $guardianannualincome;
							$data["cm_physically_handicap"] = strtolower($ph_handicap);
							$data["cm_academic_year"] = $cm_academicyears;
							$data["cm_date_of_admission"] = date('Y-m-d', strtotime($dateofaddmision));
							$data["cm_enrollment_no"] = $entrolmentno;
							$data["cm_prn_no"] = $prnno;	
							$data["cm_prev_school_college"] = $nameprevschl;
							$data["status"] = $status;
							
							
							
							$update_field['cm_last_updated'] = time();						
							$obj_model_log = $app->load_model("student",$rs_std[0]['id']);
							$obj_model_log->map_fields($data);
							$ins=$obj_model_log->execute("UPDATE");
							
							if($updated_id >0)
							{
								//$obj_delete_exam = $app->load_model("cm_lastpassedexam");
								//$obj_delete_exam->execute("DELETE",false,"","student_id=".$updated_id);	
							}		
							
							/*$exams = $app->getPostVar('exam_name');
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
								$exam['student_id'] = $updated_id;
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
							}*/			 
							//$msg="Student Updated Successfully.";			
						
						}
						else
						{
							$data = array();
							$data["profile_img"] = $student_image;
							
							//$coursename = $app->cmx->get_course_name($app->getPostVar('cm_course'));
							//$religioname = $app->cmx->get_religion_name($app->getPostVar('cm_religion'));
							//$categoryname = $app->cmx->get_religion_category_name($app->getPostVar('cm_religion'));
							$cm_category = $app->cmx->getFieldId("cm_categories","id",array("name"=>$category));
							$cm_religion = $app->cmx->getFieldId("cm_religions","id",array("name"=>$religion));
							$cm_course = $app->cmx->getFieldId("cm_course","id",array("course_name"=>$course));
							$cm_classes = $app->cmx->getFieldId("cm_classes","id",array("abbreviation"=>$course." SEM. ".$semester));
							$cm_academicyears = $app->cmx->getFieldId("cm_academicyears","id",array("short_name"=>$academicyear));
							$data["name"] = $fname.' '.$mname.' '.$lname;
							$data["cm_first_name"] = $fname;
							$data["cm_middle_name"] = $mname;
							$data["cm_last_name"] = $lname;
							$data["mothername"] = $mothername;			
							$data["gender"] = $gender;
							$data["category"] = $category;
							$data["cm_category"] = $cm_category;
							$data["blood_group"] = $blood_group;
							$data["religion"] = $religion;
							$data["cm_religion"] = $cm_religion;
							$data["cast"] = $cast;
							$data["branch"] = $course;
							$data["cm_course"] = $cm_course;
							$data["sem"] = $semester;
							$data["division"] = $division;
							$data["id_no"] = $app->getPostVar('id_no1');
							//$date = str_replace('/', '-', $birth_date);
							$data["dob"] = date('Y-m-d', strtotime($birth_date));
							//$data["birth_place"] = $birth_place;
							$data["email"] = $email;
							if($econnectpassword != '')
							{
								$data["password"] = $econnectpassword;
							}
							$data["address"] = $address_line1.' '.$address_line2;	
							$data["city"] = $city;
							$data["taluka"] = $taluka;
							$data["district"] = $district;
							$data["pin_code"] = $zipcode;		
							$data["fee_status"] = $feessatus;
							$data["fee_amount"] = $feeamount;
							//$date = str_replace('/', '-', $feeslastdate);
							$data["fee_last_date"] = date('Y-m-d', strtotime($feeslastdate));
							//$data["fee_last_date"] = $feeslastdate;
							$data["fee_late_charge"] = $latefeecharge;
							$data["transaction_id"] = $transactionid;
							//$date = str_replace('/', '-', $transactiondate);
							//$data["transaction_date"] = date('Y-m-d', strtotime($date));
							$data["transaction_date"] = date('Y-m-d', strtotime($transactiondate));//strtotime($));//$;			
							$data["cm_permenent_address_line1"] = $address2_line1;
							$data["cm_current_address_line1"] = $address_line1;
							$data["cm_permenent_address_line2"] = $address2_line2;
							$data["cm_current_address_line2"] = $address_line2;
							$data["cm_permenent_city"] = $city2;
							$data["cm_current_city"] = $city;
							$data["cm_permenent_taluka"] = $taluka2;
							$data["cm_current_taluka"] = $taluka;
							$data["cm_permenent_district"] = $district2;
							$data["cm_current_district"] = $district;
							$data["cm_permenent_state"] = $state2;
							$data["cm_current_state"] = $state;
							$data["cm_permenent_zipcode"] = $zipcode2;
							$data["cm_current_zipcode"] = $zipcode;
							$data["cm_class_id"] = $cm_classes;
							$data["student_mobile_no"] = $mobileno2;
							$data["parents_residence_no"] = $residentn2;
							$data["parents_mobile_no"] =$parentmobileno;
							$data["parents_office_no"] = $parentofficeno;
							$data["cm_occupation_of_father"] = $occupationfather;
							$data["cm_guardian_annual_income"] = $guardianannualincome;
							$data["cm_physically_handicap"] = strtolower($ph_handicap);
							$data["cm_academic_year"] = $cm_academicyears;
							$data["cm_date_of_admission"] = date('Y-m-d', strtotime($dateofaddmision));
							$data["cm_enrollment_no"] = $entrolmentno;
							$data["cm_prn_no"] = $prnno;	
							$data["cm_prev_school_college"] = $nameprevschl;
							$data["status"] = $status;
							$data['cm_added_on'] = time();
							$data['cm_added_by'] = $_SESSION['StaffID'];	
							$obj_model_log = $app->load_model("student");
							$obj_model_log->map_fields($data);
							$lastid=$obj_model_log->execute("INSERT");
						}
						
						
					}
	 }
	 
	 if(!empty($error))
		{
			$errorhtml=array();
			foreach($error as $ke=>$v)
			{
				$errorhtml[]=$ke." ----\n";
				
				foreach($error[$ke] as $subk)
				{
				$errorhtml[]=$subk."\n";
				}
			}
				$log_file_email_txt	=implode('|',$errorhtml);
			 $myDataError=$log_file_email_txt;
			
			$date_timestamp=strtotime(date('d-m-Y H:i:s'));
			$file_path=ABS_PATH.$app->get_user_config("importfiles").'student_uploading_err_report_'.$date_timestamp.'.txt';
			$app->utility->create_log_textfile($file_path,$myDataError);
			$log_url=SERVER_ROOT.$app->get_user_config("importfiles").'student_uploading_err_report_'.$date_timestamp.'.txt';
			
			$logs_ext_text='Records Successfully Imported,however '.count($error).' records not inserted , for more details please download log file. <a href="'.$log_url.'" target="_blank">Log</a>';
		}
		else
		{
			$logs_ext_text="All Records Successfully Imported.";
		}
	 
	
	
	
	
	
	
	$all_license=implode(',',$l_id);
		echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","msg"=>$logs_ext_text,"licenserecords"=>$allsales,"totalenteries"=>count($l_id)));	

}
	
	?>
