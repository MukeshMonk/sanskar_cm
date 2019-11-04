<?
	class _examination extends controller{
		
		function init(){
			//$this->app->enable_cache("home.html");
		}
		
		function onload(){
		    //$a=$this->app->cmx->alpha_encrypt("admin123",ency_key);
			$this->assign("MESSAGE", $this->app->utility->get_message());
			
			$this->app->setBodyClass("with-side-menu-compact");
			/*====CSS====*/
			$this->app->setAddCSS("css/separate/vendor/slick.min.css");
			$this->app->setAddCSS("css/separate/pages/widgets.min.css");
			$this->app->setAddCSS("css/lib/font-awesome/font-awesome.min.css");
			$this->app->setAddCSS("css/separate/vendor/bootstrap-select/bootstrap-select.min.css");
			$this->app->setAddCSS("css/separate/vendor/bootstrap-datetimepicker.min.css");
			$this->app->setAddCSS("css/separate/vendor/bootstrap-daterangepicker.min.css");
			$this->app->setAddCSS("css/separate/vendor/select2.min.css");
			$this->app->setAddCSS("css/lib/bootstrap/bootstrap.min.css");
			$this->app->setAddCSS("css/main.css");
			$this->app->setAddCSS("css/jquery.alerts.css");
			$this->app->setAddCSS("css/panel.css");
			$this->app->setAddCSS("css/bootstrap-fileupload.css");
			$this->app->setAddCSS("css/lib/datatable/bootstrap.datatable.css");
			// for chart
			$this->app->setAddCSS("css/lib/charts-c3js/c3.min.css");
			$this->app->setAddJS("js/lib/jquery/jquery.min.js");
			$this->app->setAddJS("js/lib/tether/tether.min.js");
			$this->app->setAddJS("js/lib/bootstrap/bootstrap.min.js");
			$this->app->setAddJS("js/plugins.js");
			$this->app->setAddJS("js/lib/match-height/jquery.matchHeight.min.js");
			$this->app->setAddJS("js/lib/select2/select2.full.min.js");
			$this->app->setAddJS("js/lib/moment/moment-with-locales.min.js");
			$this->app->setAddJS("js/lib/eonasdan-bootstrap-datetimepick/bootstrap-datetimepicker.min.js");
			$this->app->setAddJS("js/lib/datatable/datatable.js");
			$this->app->setAddJS("js/lib/datatable/bootstrap.datatable.js");			
			$this->app->setAddJS("js/bootstrap-fileupload.js");			
			
			
			// for chart
			
			$this->app->setAddJS("js/lib/d3/d3.min.js");
			$this->app->setAddJS("js/lib/charts-c3js/c3.min.js");			
			$this->app->setAddJS("js/lib/charts-c3js/c3js-init.js");
			
			$this->app->setAddJS("js/lib/daterangepicker/daterangepicker.js");
			$this->app->setAddJS("js/validation/jquery.validate.min.js");
			$this->app->setAddJS("js/validation/additional-methods.min.js");
			$this->app->setAddJS("js/app.js");
			$this->app->setAddJS("js/jquery.alerts.js");
			$this->app->setAddJS("js/dizzijs/ajax.form.js");			
			$this->app->setAddJS("js/dizzijs/pagination.js");
			//$this->app->setAddJS("js/dizzijs/studententry.js");
			//$this->app->setAddJS("js/dizzijs/monthly_average_report.js");
			
			
			$action=$this->app->getGetVar("action");
			
			$inscript=" $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });
			
			
			$('.reporttable').DataTable();
						
						
			
            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
			
			$('.indatepicker').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
     			 autoUpdateInput: true,
     			 minDate: new Date(1900, 0, 1),
  maxDate: '+250Y',
				 locale: {
           			 format: 'DD-MM-YYYY',
					 separator:'-'
       				 }
			});
			
			
        });";
		
		
			  	 $course_tbl="cm_classes";
				$course_condition="status!=2";
				$course_text="Select Class";
				$field_one="id";
				$field_two="abbreviation";
				$courseorder_condition="abbreviation ASC";
	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	
				$this->app->assign("branch_dd",$course_dd);
			
				$div_tbl="cm_divisions";
				$div_condition="status!=2";
				$div_text="Select Division";
				$field_one="id";
				$field_two="name";
				$divorder_condition="name ASC";
	            $div_dd=$this->app->cmx->create_dd($div_tbl,$div_condition,$field_one,$field_two,$div_text,$divorder_condition);	
				$this->app->assign("div_dd",$div_dd);
				
				$sub_tbl="cm_subjects";
				$sub_condition="status!=2";
				$sub_text="Select Subject";
				$field_one="id";
				$field_two="subject_name";
				$suborder_condition="seq ASC";
	            $sub_dd=$this->app->cmx->create_dd($sub_tbl,$sub_condition,$field_one,$field_two,$sub_text,$suborder_condition);	
				$this->app->assign("sub_dd",$sub_dd);
				
				
				$trm_tbl="cm_terms";
				$trm_condition="status!=2";
				$trm_text="Select Term";
				$field_one="id";
				$field_two="name";
				$trmorder_condition="name ASC";
	            $trm_dd=$this->app->cmx->create_dd($trm_tbl,$trm_condition,$field_one,$field_two,$trm_text,$trmorder_condition);	
				$this->app->assign("trm_dd",$trm_dd);
				
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="name ASC";
	            $academicyears_dd=$this->app->cmx->create_dd($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				
		
		  if($action=="" || $action=="exam_schedule")
		  {
			$this->app->setAddJS("js/dizzijs/exam_sch.js");
		
				
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'exam_sch');
					$('#filter_search').click(function(){
					var str=$('#serach_string').val();
					var sb=$('#search_by').val();
					if(str=='')
					{
						$('#serach_string').parent().addClass('.has-error');
					}
					else
					{
						$('#serach_string').parent().removeClass('.has-error');
					}
					cf_datapager(1,'exam_sch');
					});
				});";
			  }elseif($action=="enter_marks"){
				  $record_id=$this->app->getGetVar("record_id");
				 
				  $this->app->setAddJS("js/dizzijs/enter_marks.js");
			  	$id_dec=$this->app->cmx->decrypt($record_id,ency_key);
				  
			  	if($id_dec > 0 && $record_id!="")
				{
					
					$this->app->assign("exam_sch_id",$record_id);	
					$obj_model_admin = $this->app->load_model("cm_exam_subjects");
					$rsres = $obj_model_admin->execute("SELECT",false,"SELECT cm_exam_subjects.*,exam_schedule.cource_id FROM cm_exam_subjects LEFT JOIN exam_schedule ON exam_schedule.id=cm_exam_subjects.exam_id WHERE cm_exam_subjects.id!=0 AND cm_exam_subjects.id=".$id_dec);
					$this->app->assign("exam_id",$rsres[0]['exam_id']);	
					//$cls_data=$this->app->cmx->getClassDataNew($rsres[0]['cource_id'],$rsres[0]['sem_id']);
						
			  		$obj_model_admin = $this->app->load_model("student");
					$studentsres = $obj_model_admin->execute("SELECT",false,"","cm_class_id=".$rsres[0]['cource_id']." and status='Active'","id_no ASC");
					
					/*$obj_model_admin2 = $this->app->load_model("cm_enter_marks");
					$studentsres2 = $obj_model_admin2->execute("SELECT",false,"","exam_id=".$rsres[0]['exam_id']." ");
					$this->app->assign("stud_marks",$studentsres2);*/
					$obj_model_admin2 = $this->app->load_model("cm_enter_marks");
					$studentsres2 = $obj_model_admin2->execute("SELECT",false,"","exam_sub_id=".	$id_dec." ");
					//echo $obj_model_admin2->sql; exit;
					$this->app->assign("stud_marks",$studentsres2);

				//	print_r($studentsres2);exit;
					//echo $obj_model_admin->sql;*/
					$class_name=$this->app->cmx->getAnyfield($rsres[0]['cource_id'],'cm_classes','abbreviation');
					
					$this->app->assign("students",$studentsres);
					$this->app->assign("class_namenew",$class_name);
				}
				else
				{
					
					 $inscript.="
					 $(document).on('click','.call_export',function()
{
	
							var data_id=$(this).attr('data-id');
							$.ajax(
							{
								type: 'POST',
								dataType: 'json',
								cache: false,
								url: 'clientside/socket/call.php',
								data: {'connector':'export_exam_sub_marks','exp_id':data_id},
								success: function(data)
								 {
									if(data.RESULT=='SUCCESS')
									{
											window.location.href=data.url;
											
									}
									else
									{
											jAlert(data.MSG);
									}
								}
							});
				
});
				$(document).ready(function() {
					cf_datapager(1,'enter_marks');
					$('#filter_search').click(function(){
					var str=$('#serach_string').val();
					var sb=$('#search_by').val();
					if(str=='')
					{
						$('#serach_string').parent().addClass('.has-error');
					}
					else
					{
						$('#serach_string').parent().removeClass('.has-error');
					}
					cf_datapager(1,'enter_marks');
					});
				});";
				}
				  }
				  /**attendance merit controller function */
					elseif($action=='scheduled_marks')
					{
						
				  $record_id=$this->app->getGetVar("record_id");
				 
				  $this->app->setAddJS("js/dizzijs/enter_marks.js");
			  	$id_dec=$this->app->cmx->decrypt($record_id,ency_key);
				  
			  	if($id_dec > 0 && $record_id!="")
				{
					
					$this->app->assign("exam_sch_id",$record_id);	
				
					$obj_model_admin = $this->app->load_model("cm_exam_subjects");
					$rsres = $obj_model_admin->execute("SELECT",false,"SELECT cm_exam_subjects.*,exam_schedule.cource_id,exam_schedule.acd_year_id FROM cm_exam_subjects LEFT JOIN exam_schedule ON exam_schedule.id=cm_exam_subjects.exam_id WHERE cm_exam_subjects.id!=0 AND cm_exam_subjects.id=".$id_dec);
			//	echo $obj_model_admin->sql; exit;
					$obj_model_gr = $this->app->load_model("cm_exam_subjects");
					$rs_gr = $obj_model_gr->execute("SELECT",false,"SELECT cm_exam_subjects.*,exam_schedule.cource_id ,exam_schedule.acd_year_id,exam_schedule.term_id,exam_schedule.act_name FROM cm_exam_subjects LEFT JOIN exam_schedule ON exam_schedule.id=cm_exam_subjects.exam_id WHERE cm_exam_subjects.id!=0 AND cm_exam_subjects.sub_id='".$rsres[0]['sub_id']."' and exam_schedule.acd_year_id='".$rsres[0]['acd_year_id']."' and exam_schedule.cource_id='".$rsres[0]['cource_id']."'");
					$this->app->assign("ent_terms",$rs_gr);
					
						
					$obj_model_sch4 = $this->app->load_model("cm_asses_structure");
					$generated4 = $obj_model_sch4->execute("SELECT",false,"SELECT cm_asses_structure.marks,cm_asses_structure.course FROM `cm_asses_structure` LEFT JOIN cm_classes ON cm_classes.course_id = cm_asses_structure.course WHERE cm_classes.id=".$rs_gr[0]['cource_id']);
					$this->app->assign("total_marks",$generated4);
				

				//	echo $obj_model_gr->sql;
					// print_r($rs_gr);
					// exit;
					//$cls_data=$this->app->cmx->getClassDataNew($rsres[0]['cource_id'],$rsres[0]['sem_id']);
						
			  		$obj_model_admin = $this->app->load_model("student");
					$studentsres = $obj_model_admin->execute("SELECT",false,"","cm_class_id=".$rsres[0]['cource_id']." and status='Active'","id_no ASC");
					
					$obj_model_admin2 = $this->app->load_model("cm_enter_marks");
					$studentsres2 = $obj_model_admin2->execute("SELECT",false,"","exam_id=".$id_dec." ");
					$this->app->assign("stud_marks",$studentsres2);
					
					
					//echo $obj_model_admin->sql;*/
					$class_name=$this->app->cmx->getAnyfield($rsres[0]['cource_id'],'cm_classes','abbreviation');
					
					$this->app->assign("students",$studentsres);
					$this->app->assign("class_namenew",$class_name);
				}
				else
				{
					
					 $inscript.="
					 $(document).on('click','.call_export',function()
{
	
							var data_id=$(this).attr('data-id');
							$.ajax(
							{
								type: 'POST',
								dataType: 'json',
								cache: false,
								url: 'clientside/socket/call.php',
								data: {'connector':'export_exam_sub_marks','exp_id':data_id},
								success: function(data)
								 {
									if(data.RESULT=='SUCCESS')
									{
											window.location.href=data.url;
											
									}
									else
									{
											jAlert(data.MSG);
									}
								}
							});
				
});
				$(document).ready(function() {
					cf_datapager(1,'scheduled_marks');
					$('#filter_search').click(function(){
					var str=$('#serach_string').val();
					var sb=$('#search_by').val();
					if(str=='')
					{
						$('#serach_string').parent().addClass('.has-error');
					}
					else
					{
						$('#serach_string').parent().removeClass('.has-error');
					}
					cf_datapager(1,'scheduled_marks');
					});
				});";
				}
				  
					}
				  elseif($action=="attendance_mark"){

					$record_id=$this->app->getGetVar("record_id");		
					$this->app->setAddJS("js/dizzijs/attendance_mark.js");
					$id_dec=$this->app->cmx->decrypt($record_id,ency_key);
				
					if($id_dec > 0 && $record_id!="")
				  {
					
					  $this->app->assign("exam_sch_id",$record_id);	
					  $obj_model_admin = $this->app->load_model("exam_schedule");
					  $rsres = $obj_model_admin->execute("SELECT",false,"SELECT * FROM exam_schedule WHERE id=".$id_dec);
					
					  //$cls_data=$this->app->cmx->getClassDataNew($rsres[0]['cource_id'],$rsres[0]['sem_id']);

					  $obj_model_admin = $this->app->load_model("student");
					  $studentsres = $obj_model_admin->execute("SELECT",false,"","cm_class_id=".$rsres[0]['cource_id']." and status='Active'","id_no ASC");
					  
					  $obj_model_admin2 = $this->app->load_model("cm_enter_attendance_marks");
					  $studentsres2 = $obj_model_admin2->execute("SELECT",false,"","exam_id=".$id_dec." ");
					
					  $this->app->assign("stud_marks",$studentsres2);
					  
					  //echo $obj_model_admin->sql;*/
					  $class_name=$this->app->cmx->getAnyfield($rsres[0]['cource_id'],'cm_classes','abbreviation');
					  $this->app->assign("students",$studentsres);
						$this->app->assign("class_namenew",$class_name);
					
				  }
				  else
				  { 
					$obj_model_admin3 = $this->app->load_model("cm_enter_marks");
					$generated = $obj_model_admin3->execute("SELECT",false,"SELECT * FROM cm_enter_marks LEFT JOIN exam_schedule ON exam_schedule.id = cm_enter_marks.exam_id WHERE exam_schedule.is_attendance='Yes' and exam_schedule.status!='2'");
			//	echo $obj_model_admin3->sql; exit;
					//	print_r($generated); exit;
					$this->app->assign("is_generated",count($generated));
				
					   $inscript.="
					   $(document).on('click','.call_export',function()
  {
	  
							  var data_id=$(this).attr('data-id');
							  $.ajax(
							  {
								  type: 'POST',
								  dataType: 'json',
								  cache: false,
								  url: 'clientside/socket/call.php',
								  data: {'connector':'export_exam_sub_marks','exp_id':data_id},
								  success: function(data)
								   {
									  if(data.RESULT=='SUCCESS')
									  {
											  window.location.href=data.url;
											  
									  }
									  else
									  {
											  jAlert(data.MSG);
									  }
								  }
							  });
				  
  });
				  $(document).ready(function() {
					  cf_datapager(1,'attendance_mark');
					  $('#filter_search').click(function(){
						 
					  var str=$('#serach_string').val();
					  var sb=$('#search_by').val();
					  if(str=='')
					  {
						  $('#serach_string').parent().addClass('.has-error');
					  }
					  else
					  {
						  $('#serach_string').parent().removeClass('.has-error');
					  }
					  cf_datapager(1,'attendance_mark');
					  });
				  });";
				  }
					}else { 
		  }

			$this->app->setInlineScripts($inscript);			
			$this->app->assign("module_title","examination");
			$this->app->assign("menu_base",CMX_ROOT.'/examination');
		}
		function save_marks()
		{
				$student_id = $this->app->getPostVar("student_id1");
				$course = $this->app->getPostVar("course1");
				$sem = $this->app->getPostVar("sem1");
				$class = $this->app->getPostVar("class1");
				$stud_id_no = $this->app->getPostVar("stud_id_no1");
				$stud_name = $this->app->getPostVar("stud_name1");
				$default_status = $this->app->getPostVar("default_status11");
				$marks = $this->app->getPostVar("marks1");
				$tot_marks = $this->app->getPostVar("tot_marks1");
				$grade = $this->app->getPostVar("grade1");
				$remarks = $this->app->getPostVar("remarks1");
				$record_id = $this->app->getPostVar("record_id");
				$returnUrl=$this->app->getPostVar("returnUrl");
				$exam_id=$this->app->getPostVar("exam_id");
				$recid=$this->app->cmx->decrypt($record_id,ency_key);				
			
				$classid = $this->app->load_model("cm_exam_subjects");
				$classidanddivision = $classid->execute("SELECT",false,"SELECT cm_exam_subjects.*,exam_schedule.cource_id FROM cm_exam_subjects LEFT JOIN exam_schedule ON exam_schedule.id=cm_exam_subjects.exam_id WHERE cm_exam_subjects.id!=0 AND cm_exam_subjects.id=".$recid);
				//$classidanddivision = $classid->execute("SELECT",false,"","id=".$recid);
				//print_r($this->app->getPostVars());
				//exit;			
				for($i=0;$i<count($student_id);$i++)
				{
					
					//$student_atten_check=$this->app->cmx->check_student_marksdetails($student_id[$i],$add_date[$i]);		
					//$comparedatefortodayattandance = "STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') = '".$add_date[$i]."'";
					$obj_em = $this->app->load_model("cm_enter_marks");
					$rs_em = $obj_em->execute("SELECT",false,"","exam_sub_id='".$recid."' and exam_id='".$exam_id."' and student_id='".$student_id[$i]."'");
														
					if(count($rs_em)>0)
					{							
							$data = array();
							$data["exam_id"] = $exam_id;
							$data["exam_sub_id"] =  $recid;
							$data["student_id"] = $student_id[$i];	
							$data["sub_id"] = $classidanddivision[0]['sub_id'];								
							$data["class_id"] = $class[$i];
							$data["stud_id_no"] = $stud_id_no[$i];
							$data["stud_name"] = $stud_name[$i];
							$data["marks"] = $marks[$i];
							//$data["tot_marks"] = $tot_marks[$i];
							//$data["grade"] = $grade[$i];
							$data["remarks"] = $remarks[$i];
							$data["add_date"] = strtotime($add_date[$i]);
							$data["default_status"] = $default_status[$i];
							$data["remarks"] = $remarks[$i];
							$data["updated_on"] = strtotime(date('Y-m-d'));
							$data["updated_by"] = $_SESSION['StaffID'];
							$obj_model_atten = $this->app->load_model("cm_enter_marks",$rs_em[0]["id"]);		
							$obj_model_atten->map_fields($data);
							$obj_model_atten->execute("UPDATE");
					}else
					{
							$data = array();
							$data["exam_id"] = $exam_id;	
							$data["exam_sub_id"] = $recid;	
							$data["student_id"] = $student_id[$i];	
							$data["sub_id"] = $classidanddivision[0]['sub_id'];								
							$data["class_id"] = $class[$i];
							$data["marks"] = $marks[$i];
							//$data["tot_marks"] = $tot_marks[$i];
							//$data["grade"] = $grade[$i];
							$data["stud_id_no"] = $stud_id_no[$i];
							$data["stud_name"] = $stud_name[$i];;
							$data["add_date"] = strtotime($add_date[$i]);
							$data["default_status"] = $default_status[$i];
							$data["remarks"] = $remarks[$i];
							$data["added_on"] = strtotime(date('Y-m-d'));
							$data["added_by"] = $_SESSION['StaffID'];
							$obj_model_atten = $this->app->load_model("cm_enter_marks");		
							$obj_model_atten->map_fields($data);
							$obj_model_atten->execute("INSERT");
					}						
				}
				
				$this->app->utility->set_message("Exam Marks Updated Successfully.","SUCCESS");
				if($this->app->getPostVar("save") == "save")
				{
					$this->app->redirect($returnUrl);	
				}else
				{
					$this->app->redirect(CMX_ROOT."/examination/enter_marks/");
					
				}	
		}
	
		function update_atd_marks()
		{
				$student_id = $this->app->getPostVar("student_id1");
				$course = $this->app->getPostVar("course1");
				$sem = $this->app->getPostVar("sem1");
				$class = $this->app->getPostVar("class1");
				$stud_id_no = $this->app->getPostVar("stud_id_no1");
				$stud_name = $this->app->getPostVar("stud_name1");
				$default_status = $this->app->getPostVar("default_status11");
				$marks = $this->app->getPostVar("marks1");
				$tot_marks = $this->app->getPostVar("tot_marks1");
				$grade = $this->app->getPostVar("grade1");
				$remarks = $this->app->getPostVar("remarks1");
				$record_id = $this->app->getPostVar("record_id");
				$returnUrl=$this->app->getPostVar("returnUrl");
				$recid=$this->app->cmx->decrypt($record_id,ency_key);				
			
				//print_r($this->app->getPostVars())	;
				//exit;		
				for($i=0;$i<count($student_id);$i++)
				{
					if($remarks[$i]!='')
					{
					
						$obj_em = $this->app->load_model("cm_enter_attendance_marks");
						$rs_em = $obj_em->execute("SELECT",false,"","exam_id='".$recid."' and student_id='".$student_id[$i]."'");
														
						if(count($rs_em)>0)
						{							
								$data = array();
								$data["mark"] = $marks[$i];
								$data["remark"] = $remarks[$i];
								$data["is_edited"] = 'Yes';
								$data["updated_on"] = strtotime(date('Y-m-d'));
								$data["updated_by"] = $_SESSION['StaffID'];
								$obj_model_atten = $this->app->load_model("cm_enter_attendance_marks",$rs_em[0]["id"]);		
								$obj_model_atten->map_fields($data);
								$obj_model_atten->execute("UPDATE");
						}
					}
				}
				
				$this->app->utility->set_message("Exam Attendance Marks Updated Successfully.","SUCCESS");
				if($this->app->getPostVar("save") == "save")
				{
					$this->app->redirect($returnUrl);	
				}else
				{
					$this->app->redirect(CMX_ROOT."/examination/attendance_mark/");
					
				}	
		}

	}	
?>