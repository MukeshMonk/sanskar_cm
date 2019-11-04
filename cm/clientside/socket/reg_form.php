<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");
	$data = array();
	$item_id=$app->getPostVar("update_id");
	$updated_id=$app->cmx->decrypt($item_id,ency_key);
	//print_r($app->getPostVars());
	//exit;
	  if($app->getPostVar('first_name')!= NULL)
	  {
		
		if($item_id=="")
		{
			$field_name="profile_img";
		
			/* Image Upload*/
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
			
			$data["reg_date"] = $app->getPostVar('reg_date');
			$data["reg_no"] = $app->getPostVar('reg_no');
			$data["enq_no"] = $app->getPostVar('enq_no');
			$data["cm_course"] = $app->getPostVar('cm_course');
			$data["enq_class"] = $app->getPostVar('enq_class');
			$data["sem"] = $app->getPostVar('sem');
			$data["cm_academic_year"] = $app->getPostVar('cm_academic_year');
			$data["first_name"] = strtoupper($app->getPostVar('first_name'));
			$data["middle_name"] = strtoupper($app->getPostVar('middle_name'));
			$data["last_name"] = strtoupper($app->getPostVar('last_name'));
			$data["mother_name"] = strtoupper($app->getPostVar('mother_name'));
			$data["email_id"] = $app->getPostVar('email_id');			
			$data["gender"] = $app->getPostVar('gender');
			$data["dob"] = $app->getPostVar('dob');
			$data["age_today"] = $app->getPostVar('age_today');
			$data["birth_place"] = strtoupper($app->getPostVar('birth_place'));
			$data["marital_status"] = strtoupper($app->getPostVar('marital_status'));
			$data["category"] =$app->getPostVar('category');
			$data["blood_group"] = strtoupper($app->getPostVar('blood_group'));
			$data["ph_status"] = $app->getPostVar('ph_status');
			$data["mother_tongue"] = strtoupper($app->getPostVar('mother_tongue'));
			$data["nationality"] = strtoupper($app->getPostVar('nationality'));
			$data["address"] =strtoupper($app->getPostVar('address'));
			$data["city"] = strtoupper($app->getPostVar('city'));
			$data["tehsil"] = strtoupper($app->getPostVar('tehsil'));
			$data["District"] = strtoupper($app->getPostVar('district'));
			$data["state"] = strtoupper($app->getPostVar('state'));
			$data["pin"] = $app->getPostVar('pin');
			$data["mobile_no"] = $app->getPostVar('mobile_no');
			$data["phone_no"] = $app->getPostVar('phone_no');
			$data["parent_mobile_no"] = $app->getPostVar('parent_mobile_no');
			$data["father_occupation"] = strtoupper($app->getPostVar('father_occupation'));
			$data["g_annual_income"] = $app->getPostVar('g_annual_income');
			$data["status"] = $app->getPostVar('status');
			$data['added_on'] = time();
			$data['added_by'] = $_SESSION['StaffID'];			
			$obj_model_log = $app->load_model("cm_register");
			$obj_model_log->map_fields($data);
			$lastid=$obj_model_log->execute("INSERT");
			$update_field_new['reg_no'] = "REG" . date('y').date('y', strtotime('+1 year')) . "-" . $lastid;
            $obj_model_log  = $app->load_model("cm_register", $lastid);
            $obj_model_log->map_fields($update_field_new);
            $obj_model_log->execute("UPDATE");
			$msg="Register Successfully.";
			$data_log=array("id"=> $lastid ,"post_data"=>$app->getPostVars());
			$log_id_new=$app->cmx->log_entry("cm_register","Add_Record",$data_log);
			
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
				$exam['reg_id'] = $lastid;
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
			
			if($app->getPostVar('enq_no')!='')
			{
				$exam_enq = array();
				//$exam_enq['status'] = $app->getPostVar('status');
				$obj_model_enq = $app->load_model("cm_enquiries",$app->getPostVar('enq_no'));
				//$obj_model_enq->map_fields($exam_enq);
				$obj_model_enq->execute("UPDATE",false,"UPDATE cm_enquiries SET status='".$app->getPostVar('status')."'
WHERE id='".$app->getPostVar('enq_no')."'");
			}
			//exit;
			$url=CMX_ROOT.'/admissionentry/enquiries/';
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
			
			/*
			$coursename = $app->cmx->get_course_name($app->getPostVar('cm_course'));
			$religioname = $app->cmx->get_religion_name($app->getPostVar('cm_religion'));
			$categoryname = $app->cmx->get_religion_category_name($app->getPostVar('cm_category'));*/
			
			$data["reg_date"] = $app->getPostVar('reg_date');
			//$data["reg_no"] = $app->getPostVar('reg_no');
			$data["enq_no"] = $app->getPostVar('enq_no');
			$data["cm_course"] = $app->getPostVar('cm_course');
			$data["enq_class"] = $app->getPostVar('enq_class');
			$data["sem"] = $app->getPostVar('sem');
			$data["cm_academic_year"] = $app->getPostVar('cm_academic_year');
			$data["first_name"] = $app->getPostVar('first_name');
			$data["middle_name"] = $app->getPostVar('middle_name');
			$data["last_name"] = $app->getPostVar('last_name');
			$data["mother_name"] = $app->getPostVar('mother_name');
			$data["email_id"] = $app->getPostVar('email_id');			
			$data["gender"] = $app->getPostVar('gender');
			$data["dob"] = $app->getPostVar('dob');
			$data["age_today"] = $app->getPostVar('age_today');
			$data["birth_place"] = $app->getPostVar('birth_place');
			$data["marital_status"] = $app->getPostVar('marital_status');
			$data["category"] = $app->getPostVar('category');
			$data["blood_group"] = $app->getPostVar('blood_group');
			$data["ph_status"] = $app->getPostVar('ph_status');
			$data["mother_tongue"] = $app->getPostVar('mother_tongue');
			$data["nationality"] = $app->getPostVar('nationality');
			$data["address"] =$app->getPostVar('address');
			$data["city"] = $app->getPostVar('city');
			$data["tehsil"] = $app->getPostVar('tehsil');
			$data["District"] = $app->getPostVar('district');
			$data["state"] = $app->getPostVar('state');
			$data["pin"] = $app->getPostVar('pin');
			$data["mobile_no"] = $app->getPostVar('mobile_no');
			$data["phone_no"] = $app->getPostVar('phone_no');
			$data["parent_mobile_no"] = $app->getPostVar('parent_mobile_no');
			$data["father_occupation"] = $app->getPostVar('father_occupation');
			$data["g_annual_income"] = $app->getPostVar('g_annual_income');
			$data["status"] = $app->getPostVar('status');
			$data['last_updated'] = time();						
			$obj_model_log = $app->load_model("cm_register",$updated_id);
			$obj_model_log->map_fields($data);
			$ins=$obj_model_log->execute("UPDATE");
			$data_log=array("id"=>$updated_id,"post_data"=>$app->getPostVars());
			$log_id_new=$app->cmx->log_entry("cm_register","Edit_Record",$data_log);
			if($updated_id >0)
			{
				$obj_delete_exam = $app->load_model("cm_last_exam");
				$obj_delete_exam->execute("DELETE",false,"","reg_id=".$updated_id);	
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
				$exam['reg_id'] = $updated_id;
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
			
			if($app->getPostVar('enq_no')!='')
			{
				//$exam_enq = array();
				//$exam_enq['status'] = $app->getPostVar('status');
				$obj_model_enq = $app->load_model("cm_enquiries",$app->getPostVar('enq_no'));
				//$obj_model_enq->map_fields($exam_enq);
				$obj_model_enq->execute("UPDATE",false,"UPDATE cm_enquiries SET status='".$app->getPostVar('status')."'
WHERE id='".$app->getPostVar('enq_no')."'");
			}
						 
			$msg="Registration Updated Successfully.";	
			$url=CMX_ROOT.'/admissionentry/registration/';		
		}	
			$app->utility->set_message($msg,"SUCCESS");	
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"registration","URL"=>$url));			 	
	 	 //$app->utility->set_message("Student Updated Successfully.", "SUCCESS");
		 //$app->redirect(CMX_ROOT . '/studententry/students/');
	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>