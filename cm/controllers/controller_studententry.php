<?
	class _studententry extends controller{
		
		function init(){
			//$this->app->enable_cache("home.html");
		}
		
		function onload(){
			if($_SESSION['Role']=='3'){
				$this->app->redirect(CMX_ROOT."/");
			}
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
			
			$this->app->setAddCSS("css/lib/sumoselect/sumoselect.min.css");
			// for chart
			$this->app->setAddCSS("css/lib/charts-c3js/c3.min.css");
			
			
			
		

			$this->app->setAddJS("js/lib/jquery/jquery.min.js");
			$this->app->setAddJS("js/lib/tether/tether.min.js");
			$this->app->setAddJS("js/lib/bootstrap/bootstrap.min.js");
			$this->app->setAddJS("js/lib/sumoselect/jquery.sumoselect.js");
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
			$this->app->setAddJS("js/dizzijs/studententry.js");
			$this->app->setAddJS("js/dizzijs/monthly_average_report.js");
			$this->app->setAddJS("js/dizzijs/entermarkattendance.js");
			
			
					
			
			
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
					 separator:' - '
       				 }
			});
			
        });";
		
		
		  if($action=="" || $action=="students")
		  {
			  
				
				
				
				$class_tbl="cm_classes";
				$class_condition="status!=2";
				$class_text="Select Class";
				$field_one="id";
				$field_two="name";
				$classorder_condition="name ASC";
	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);	
				$this->app->assign("class_dd",$class_dd);
				
			
				$college_tbl="cm_colleges";
				$college_condition="status!=2";
				$college_text="Select College";
				$field_one="id";
				$field_two="name";
				$collegeorder_condition="name ASC";
	            $college_dd=$this->app->cmx->create_dd($college_tbl,$college_condition,$field_one,$field_two,$college_text,$collegeorder_condition);	
				$this->app->assign("college_dd",$college_dd);				
				
				
				$occupation_tbl="cm_occupationoffather";
				$occupation_condition="status!=2";
				$occupation_text="Select Occupation";
				$field_one="id";
				$field_two="name";
				$occupationorder_condition="name ASC";
	            $occupation_dd=$this->app->cmx->create_dd($occupation_tbl,$occupation_condition,$field_one,$field_two,$occupation_text,$occupationorder_condition);	
				$this->app->assign("occupation_dd",$occupation_dd);
				
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="name ASC";
	            $academicyears_dd=$this->app->cmx->create_dd($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				
				
				$category_tbl="cm_categories";
				$category_condition="status!=2";
				$category_text="Select Category";
				$field_one="id";
				$field_two="name";
				$categoryorder_condition="name ASC";
	            $category_dd=$this->app->cmx->create_dd($category_tbl,$category_condition,$field_one,$field_two,$category_text,$categoryorder_condition);	
				$this->app->assign("category_dd",$category_dd);
				
				$religion_tbl="cm_religions";
				$religion_condition="status!=2";
				$religion_text="Select Religion";
				$field_one="id";
				$field_two="name";
				$religionorder_condition="name ASC";
	            $religion_dd=$this->app->cmx->create_dd($religion_tbl,$religion_condition,$field_one,$field_two,$religion_text,$religionorder_condition);	
				$this->app->assign("religion_dd",$religion_dd);
				
				$course_tbl="cm_course";
				$course_condition="status!=2";
				$course_text="Select Course";
				$field_one="id";
				$field_two="course_name";
				$courseorder_condition="course_name ASC";
	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	
				$this->app->assign("branch_dd",$course_dd);
				
				$semester_tbl="cm_semesters";
				$semester_condition="status!=2";
				$semester_text="Select Course";
				$field_one="id";
				$field_two="name";
				$semesterorder_condition="name ASC";
	            $semester_dd=$this->app->cmx->create_dd($semester_tbl,$semester_condition,$field_one,$field_two,$semester_text,$semesterorder_condition);	
				$this->app->assign("sem_dd",$semester_dd);
				
				
				$division_tbl="cm_divisions";
				$division_condition="status!=2";
				$division_text="Select Division";
				$field_one="id";
				$field_two="name"; 
				$divisionorder_condition="name ASC";
	            $division_dd=$this->app->cmx->create_dd($division_tbl,$division_condition,$field_one,$field_two,$division_text,$divisionorder_condition);	
				$this->app->assign("division_dd",$division_dd);
				/**/
				$enq_tbl="cm_confirmation";
				$enq_condition="status='Admission Granted'";
				$enq_text="Select Confirmation";
				$field_one="id";
				$field_two="cnf_no,stud_name,class_no";
				$enqorder_condition="id ASC";
	            $enq_dd=$this->app->cmx->create_dd_multiple($enq_tbl,$enq_condition,$field_one,$field_two,$enq_text,$enqorder_condition);	
				$this->app->assign("cnf_dd",$enq_dd);
				/**/
				$qlf_tbl="cm_qualifications";
				$qlf_condition="status='1'";
				$qlf_text="Select Qualification";
				$field_one="id";
				$field_two="name";
				$qlforder_condition="id ASC";
	            $qlf_dd=$this->app->cmx->create_dd($qlf_tbl,$qlf_condition,$field_one,$field_two,$qlf_text,$qlforder_condition);	
				$this->app->assign("qlf_dd",$qlf_dd);
				
				$brd_tbl="cm_board_uni";
				$brd_condition="status='1'";
				$brd_text="Select Board/University";
				$field_one="id";
				$field_two="board_name";
				$brdorder_condition="id ASC";
	            $brd_dd=$this->app->cmx->create_dd($brd_tbl,$brd_condition,$field_one,$field_two,$brd_text,$brdorder_condition);	
				$this->app->assign("brd_dd",$brd_dd);
				
				$college_tbl="cm_last_school";

				$college_condition="status!=2";

				$college_text="Select School/collage";

				$field_one="id";

				$field_two="name";

				$collegeorder_condition="name ASC";

	            $college_dd=$this->app->cmx->create_dd($college_tbl,$college_condition,$field_one,$field_two,$college_text,$collegeorder_condition);	

				$this->app->assign("sch_dd",$college_dd);
				
				
				
				if($this->app->getGetVar("record_id")=="")				
				{
					
					
					$inscript.="
							$(document).ready(function() {
								cf_datapager(1,'students');
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
								cf_datapager(1,'students');
								});
								
							});";
				}
				elseif($this->app->getGetVar("item_id"))
				{
				
					$item_id=$this->app->cmx->decrypt($this->app->getGetVar("item_id"),ency_key);	
							
					$obj_students = $this->app->load_model("student",$item_id);
					$rsstudents = $obj_students->execute("SELECT");
					
					if(count($rsstudents)>0)
					{
						$this->app->assign_form_data("frm_students", $rsstudents[0]);
						$this->app->assign("rsstudents", $rsstudents[0]);
					}
					else
					{
						$this->app->redirect(CMX_ROOT."/studententry/students/");
					}
				}
				
				
				
				
				
					
		  }elseif($action=="representationalattandences")
		  {
			  
			    $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'representationalattandences');
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
					cf_datapager(1,'representationalattandences');
					});
				});";
		  
		  }
		  elseif($action=="terminatedstudentreports")
		  {
			  
			    $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'terminatedstudentreports');
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
					cf_datapager(1,'terminatedstudentreports');
					});
				});";
				
				
				
				$class_tbl="cm_classes";
				$class_condition="status!=2";
				$class_text="Select Class";
				$field_one="id";
				$field_two="name";
				$classorder_condition="name ASC";
	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);	
				$this->app->assign("class_dd",$class_dd);
								
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="name ASC";
	            $academicyears_dd=$this->app->cmx->create_dd($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
								
				$course_tbl="cm_course";
				$course_condition="status!=2";
				$course_text="Select Course";
				$field_one="id";
				$field_two="course_name";
				$courseorder_condition="course_name ASC";
	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	
				$this->app->assign("course_dd",$course_dd);
				
				$semester_tbl="cm_semesters";
				$semester_condition="status!=2";
				$semester_text="Select Course";
				$field_one="id";
				$field_two="name";
				$semesterorder_condition="name ASC";
	            $semester_dd=$this->app->cmx->create_dd($semester_tbl,$semester_condition,$field_one,$field_two,$semester_text,$semesterorder_condition);	
				$this->app->assign("sem_dd",$semester_dd);
				
				
				$division_tbl="cm_divisions";
				$division_condition="status!=2";
				$division_text="Select Division";
				$field_one="id";
				$field_two="name";
				$divisionorder_condition="name ASC";
	            $division_dd=$this->app->cmx->create_dd($division_tbl,$division_condition,$field_one,$field_two,$division_text,$divisionorder_condition);	
				$this->app->assign("division_dd",$division_dd);
				
				
				
		  
		  }
		  elseif($action=="medicalleaves")
		  {
			  
			    $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'medicalleaves');
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
					cf_datapager(1,'medicalleaves');
					});
				});";
		  
		  }elseif($action=="dailyattandencereports")
		  {
			  
			    $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'dailyattandencereports');
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
					cf_datapager(1,'dailyattandencereports');
					});
				});";
				
				
				  
		  }
		  
		  elseif($action=="holidays")
		  {
			  
			    $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'holidays');
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
					cf_datapager(1,'holidays');
					});
				});";
				
				
				  
		  }
		  
		  elseif($action=="libraryhoursreports")
		  {
			  
			    $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'libraryhoursreports');
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
					cf_datapager(1,'libraryhoursreports');
					});
				});";
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="name ASC";
	            $academicyears_dd=$this->app->cmx->create_dd($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				
				$course_tbl="cm_course";
				$course_condition="status!=2";
				$course_text="Select Course";
				$field_one="id";
				$field_two="course_name";
				$courseorder_condition="course_name ASC";
	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	
				$this->app->assign("course_dd",$course_dd);
				
				$semester_tbl="cm_semesters";
				$semester_condition="status!=2";
				$semester_text="Select Semester";
				$field_one="id";
				$field_two="name";
				$semesterorder_condition="name ASC";
	            $semester_dd=$this->app->cmx->create_dd($semester_tbl,$semester_condition,$field_one,$field_two,$semester_text,$semesterorder_condition);	
				$this->app->assign("sem_dd",$semester_dd);
				
				
				$division_tbl="cm_divisions";
				$division_condition="status!=2";
				$division_text="Select Division";
				$field_one="id";
				$field_two="name";
				$divisionorder_condition="name ASC";
	            $division_dd=$this->app->cmx->create_dd($division_tbl,$division_condition,$field_one,$field_two,$division_text,$divisionorder_condition);	
				$this->app->assign("division_dd",$division_dd);
				
				
				$record_id=$this->app->getGetVar("record_id");	
			
			
			
			
			if($record_id!="")
			{
							
				$record_data=unserialize($record_id);
				
				
				
				$exportexcel = $record_data['detailreportexcelexport'];
				
				$course = implode(",",$record_data['course1']);
				$sem = implode(",",$record_data['sem1']);
				$division = implode(",",$record_data['division1']);
				$from_date = $record_data['from_date'];
				$to_date = $record_data['to_date'];
				
				
				
				
				
				$dateranges = $this->app->cmx->createDateRange($from_date, $to_date, $format = "Y-m-d");
				
				$filterquery = '';
				if($course != '')
				{
					$filterquery .= " AND cm_attendance.course IN (".$course.")";
				}
				if($sem != '')
				{
					$filterquery .= " AND cm_attendance.sem  IN (".$sem.")";
				}
				if($division != '')
				{
					$filterquery .= " AND student.division  IN (".$division.")";
				}
				if($from_date != '' &&  $to_date != '')
				{
					$from_date = date('Y-m-d',strtotime($from_date));
					$to_date = date('Y-m-d',strtotime($to_date));
					
					$filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$from_date."'  AND '".$to_date."'";
				}
						
				$sql="SELECT `cm_attendance`.*,student.*,cm_classes.name as class_name,cm_divisions.name as division_name FROM `cm_attendance`
					  LEFT JOIN student ON student.id = cm_attendance.student_id 
					  LEFT JOIN cm_classes ON student.cm_class_id = cm_classes.id
					  LEFT JOIN cm_divisions ON student.division = cm_divisions.id
					  WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery." group by cm_attendance.student_id";
				$obj_model_detail_report = $this->app->load_model("cm_academicyears");
				$detail_report_result = $obj_model_detail_report->execute("SELECT",false,$sql);
				
				
				
				if(count($detail_report_result)>0)
		 		{
				 	$app->no_html=true;
					$obj_excel = $this->app->load_module("PHPExcel");
					$ExeclHeads = array("Sr.","ID NO.","Student Name","Class-Div");
					
					foreach($dateranges as $daterange)
					{
						//$ExeclHeads[] = date('j-M',strtotime($daterange));
						$workingdays = $this->app->cmx->workingdays_month($daterange);
						if($workingdays > 0)
						{
							$countworkingdays += 1;
						}
					}
					
					array_push($ExeclHeads,"Total Present","Total Absent","Working Days","Persent %","Library Hours","Assignments");
					
					
					$i=0+1;
					$full_price_total=0;
					$nights_total=0;
					$nr_pax=0;				
					$report_array = array();
					
					
					
					foreach($detail_report_result as $key => $row)
					{					
						$countpresent = '';	
						$countabsent = '';
						$countworkingdays = '';
						
						foreach($dateranges as $daterange)
						{
							$workingdays = $this->app->cmx->workingdays_month($daterange);
							if($workingdays > 0)
							{
								$countworkingdays += 1;
							}
							
							$present_or_absent = $this->app->cmx->detail_report_student_present_or_absent($row['student_id'],$row['course'],$row['sem'],$daterange);	
							
							if($present_or_absent == 1)
							{
								$report_array[$key][] = "p";
								$countpresent[] = "yes";							
							}
							else
							{
								$report_array[$key][] = "A";
								$countabsent[] = "no";							
							}
						}
						
						if(!empty($countpresent))
						{
							$countpresent = count($countpresent);						
						}else
						{
							$countpresent = 0;
						}
						
						$per = ($countpresent*100)/$countworkingdays;
						$percetageattadence = number_format((float)$per, 2, '.', '');
					
		
						$report_array[$key]['sr'] = $i;
						$report_array[$key]['id_no'] = $row["id_no"];
						$report_array[$key]['name'] = $row["name"];
						$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
						$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
						$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
						$report_array[$key]['working_days'] = $countworkingdays;
						$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
						
						$libraryassign = $this->app->cmx->libraryassignmentforstudentbypercentage($percetageattadence);
						
						$report_array[$key]['libraryhours'] = ($libraryassign[0]['library_hours'] != '') ? $libraryassign[0]['library_hours'] : '';
						$report_array[$key]['assignments'] = ($libraryassign[0]['assignment'] != '') ? $libraryassign[0]['assignment'] : '';
						
						
					}
					
					$array_field=array();
					$data_array = array();
					
					// this condition for only selecte by operator and value student
					foreach($report_array as $report_arra)
					{
						
						if($report_arra['libraryhours'] != '')
						{
							$data_array[] = $report_arra;
						}
					}
					
					
					$fields = array("id_no","name","class_div");
							
					array_push($fields,"total_present","total_absent","working_days","percent","libraryhours","assignments");
					$table = $this->libraryhours($ExeclHeads,$data_array,$fields,$operator,$operatorvalue);
					$this->app->assign("libraryhours_table",$table);
				}else
				{
					$this->app->assign("libraryhours_table","notfound");
				}				
			}	
				
				  
		  }
		  
		  
		  elseif($action=="detailattandencereports")
		  {
			  
			    $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'detailattandencereports');
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
					cf_datapager(1,'detailattandencereports');
					});
				});";
				
				$course_tbl="cm_course";
				$course_condition="status!=2";
				$course_text="Select Course";
				$field_one="id";
				$field_two="course_name";
				$courseorder_condition="course_name ASC";
	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	
				$this->app->assign("course_dd",$course_dd);
				
				$semester_tbl="cm_semesters";
				$semester_condition="status!=2";
				$semester_text="Select Semester";
				$field_one="id";
				$field_two="name";
				$semesterorder_condition="name ASC";
	            $semester_dd=$this->app->cmx->create_dd($semester_tbl,$semester_condition,$field_one,$field_two,$semester_text,$semesterorder_condition);	
				$this->app->assign("sem_dd",$semester_dd);
				
				
				$division_tbl="cm_divisions";
				$division_condition="status!=2";
				$division_text="Select Division";
				$field_one="id";
				$field_two="name";
				$divisionorder_condition="name ASC";
	            $division_dd=$this->app->cmx->create_dd($division_tbl,$division_condition,$field_one,$field_two,$division_text,$divisionorder_condition);	
				$this->app->assign("division_dd",$division_dd);
				
			$record_id=$this->app->getGetVar("record_id");	
			
			
			
			
			if($record_id!="")
			{
							
				$record_data=unserialize($record_id);
				
				$exportexcel = $record_data['detailreportexcelexport'];
				
				$course = $record_data['course_id'];
				$sem = $record_data['sem_id'];
				$division = $record_data['division_id'];
				$from_date = $record_data['from_date'];
				$to_date = $record_data['to_date'];
				$operator = $record_data['operator'];
				$operatorvalue = $record_data['operatorvalue'];
				
				$dateranges = $this->app->cmx->createDateRange($from_date, $to_date, $format = "Y-m-d");
				
				$filterquery = '';
				if($course != '')
				{
					$filterquery .= " AND cm_attendance.course = ".$course;
				}
				if($sem != '')
				{
					$filterquery .= " AND cm_attendance.sem = ".$sem;
				}
				if($division != '')
				{
					$filterquery .= " AND student.division = ".$division;
				}
				if($from_date != '' &&  $to_date != '')
				{
					$from_date = date('Y-m-d',strtotime($from_date));
					$to_date = date('Y-m-d',strtotime($to_date));
					
					$filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$from_date."'  AND '".$to_date."'";
				}
						
				$sql="SELECT `cm_attendance`.*,student.*,cm_classes.name as class_name,cm_divisions.name as division_name FROM `cm_attendance`
					  LEFT JOIN student ON student.id = cm_attendance.student_id 
					  LEFT JOIN cm_classes ON student.cm_class_id = cm_classes.id
					  LEFT JOIN cm_divisions ON student.division = cm_divisions.id
					  WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery." group by cm_attendance.student_id";
				$obj_model_detail_report = $this->app->load_model("cm_academicyears");
				$detail_report_result = $obj_model_detail_report->execute("SELECT",false,$sql);
				
					
				
				if(count($detail_report_result)>0)
		 		{
				 	$app->no_html=true;
					$obj_excel = $this->app->load_module("PHPExcel");
					$ExeclHeads = array("Sr.","ID NO.","Student Name","Class-Div");
					
					if($record_data['summeryreport'] == 1)
					{
						
					}else
					{
						foreach($dateranges as $daterange)
						{
							$ExeclHeads[] = date('j-M',strtotime($daterange));
							$workingdays = $this->app->cmx->workingdays_month($daterange);
							if($workingdays > 0)
							{
								$countworkingdays += 1;
							}
						}
					}
					array_push($ExeclHeads,"Total Present","Total Absent","Working Days","Persent %");
					
					
					$i=0+1;
					$full_price_total=0;
					$nights_total=0;
					$nr_pax=0;				
					$report_array = array();
					
					
					
					foreach($detail_report_result as $key => $row)
					{					
						$countpresent = '';	
						$countabsent = '';
						$countworkingdays = '';
						
						foreach($dateranges as $daterange)
						{
							$workingdays = $this->app->cmx->workingdays_month($daterange);
							if($workingdays > 0)
							{
								$countworkingdays += 1;
							}
							
							$present_or_absent = $this->app->cmx->detail_report_student_present_or_absent($row['student_id'],$row['course'],$row['sem'],$daterange);	
							
							if($present_or_absent == 1)
							{
								$report_array[$key][] = "p";
								$countpresent[] = "yes";							
							}
							else
							{
								$report_array[$key][] = "A";
								$countabsent[] = "no";							
							}
						}
						
						if(!empty($countpresent))
						{
							$countpresent = count($countpresent);						
						}else
						{
							$countpresent = 0;
						}
						
						$per = ($countpresent*100)/$countworkingdays;
						$percetageattadence = number_format((float)$per, 2, '.', '');
					
		
						
						if($operator == "eql" )
						{
								
							if($per == $operatorvalue)
							{
								$report_array[$key]['sr'] = $i;
								$report_array[$key]['id_no'] = $row["id_no"];
								$report_array[$key]['name'] = $row["name"];
								$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
								$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
								$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
								$report_array[$key]['working_days'] = $countworkingdays;
								$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
							}						
						}
						elseif($operator == "greter" )
						{
							if($per > $operatorvalue)
							{
								$report_array[$key]['sr'] = $i;
								$report_array[$key]['id_no'] = $row["id_no"];
								$report_array[$key]['name'] = $row["name"];
								$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
								$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
								$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
								$report_array[$key]['working_days'] = $countworkingdays;
								$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
							}
							
						}elseif($operator == "gretereql" )
						{
							if($per >= $operatorvalue)
							{
								$report_array[$key]['sr'] = $i;
								$report_array[$key]['id_no'] = $row["id_no"];
								$report_array[$key]['name'] = $row["name"];
								$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
								$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
								$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
								$report_array[$key]['working_days'] = $countworkingdays;
								$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
							}
							
						}
						elseif($operator == "less" )
						{													
							if($per < $operatorvalue)
							{
								$report_array[$key]['sr'] = $i;
								$report_array[$key]['id_no'] = $row["id_no"];
								$report_array[$key]['name'] = $row["name"];
								$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
								$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
								$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
								$report_array[$key]['working_days'] = $countworkingdays;
								$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
							}						
						}elseif($operator == "lesseql" )
						{
							if($per <= $operatorvalue)
							{
								$report_array[$key]['sr'] = $i;
								$report_array[$key]['id_no'] = $row["id_no"];
								$report_array[$key]['name'] = $row["name"];
								$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
								$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
								$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
								$report_array[$key]['working_days'] = $countworkingdays;
								$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
							}
						}
						else
						{							
							$report_array[$key]['sr'] = $i;
							$report_array[$key]['id_no'] = $row["id_no"];
							$report_array[$key]['name'] = $row["name"];
							$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
							$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
							$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
							$report_array[$key]['working_days'] = $countworkingdays;
							$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
						}
					}
					
					$array_field=array();
					$data_array = array();
					
					// this condition for only selecte by operator and value student
					foreach($report_array as $report_arra)
					{
						if($report_arra['id_no'] != '')
						{
							$data_array[] = $report_arra;
						}
					}
					
					//$fields=array("sr","id_no","name","class_div","present_or_absent","status","added_on","last_updated");
					
					$fields = array("id_no","name","class_div");
					if($record_data['summeryreport'] == 1)
					{
						
					}
					else
					{
						foreach($dateranges as $k => $daterange)
						{
							$fields[] = $k;
						}
					}
							
						
					
							
					array_push($fields,"total_present","total_absent","working_days","percent");
					$table = $this->detailreport($ExeclHeads,$data_array,$fields,$operator,$operatorvalue);
					$this->app->assign("display_table",$table);
				}else
				{
					$this->app->assign("display_table","notfound");
				}
			}	
		}
			

			

		  elseif($action=="monthlyaveragereports")
		  {
			    
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="name ASC";
	            $academicyears_dd=$this->app->cmx->create_dd($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				
				
				$class_tbl="cm_classes";
				$class_condition="status!=2";
				$class_text="Select Class";
				$field_one="id";
				$field_two="name";
				$classorder_condition="name ASC";
	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);	
				$this->app->assign("classes_dd",$class_dd);
				
				$record_id=$this->app->getGetVar("record_id");
				
				if($record_id!="")
				{					
					$record_data=unserialize($record_id);
					
					
					$academic_year = $record_data['year'];
					$month = $record_data['report_month'];
				}else
				{
					$academic_year = date('Y');
					$month = date('m');
				}	
					
					$date = $academic_year.'-'.$month.'-01';					
					$from_date = date('Y-m-d',strtotime($date));
					$to_date  =  date('Y-m-t',strtotime($date));
				
				
					$obj_classes = $this->app->load_model("cm_classes");
					$rs_classesarray=$obj_classes->execute("SELECT", false, ""," status != 2 and id!=0 ");
					$monthlyavgbyclass1=array();
					foreach($rs_classesarray as $classname)
					{
						$totalmonthattandencecount = 0;
						$monthlyaveragereport = $this->app->cmx->monthlyavereportbydate($classname['id'],$from_date,$to_date);
						
						$totalmonthattandencecount = count($monthlyaveragereport);	
						$absentstudentcount = 0;
						
						foreach($monthlyaveragereport as $monthlyaveragereportavg)
						{
							if($monthlyaveragereportavg['default_status'] == "Absent")
							{
								$absentstudentcount += 1;
							}						
						}
							
						$monthlyavgbyclass = ((($totalmonthattandencecount-$absentstudentcount) * 100) / $totalmonthattandencecount );
						$monthlyavgbyclass1[] = ($monthlyavgbyclass!= '')?$monthlyavgbyclass:0;
					}
					
					
					$monthlygraphdata = implode(',', $monthlyavgbyclass1);
					
					$inscript.="function loadorder_grahps(labls)
							{
								var barChart = c3.generate({
								        bindto: '#bar-chart1',
										axisX:{
								       title: 'axisX Title',
								       gridThickness: 1,
								       tickLength: 10
								      },
								        data: { x: 'x',
										    columns: [
								           labls.class_n,
								            ['data1', ".$monthlygraphdata."]
								           
								        ],
											
								            type: 'bar'
								        },
										axis: {
								    x: {
								       type: 'category',
									   
								    },
									y: {
								    max: 100
								  }
								  },
								        bar: {
								            width: {
								                ratio: 0.5
								            }
											
								        }
								    });
								}
							jQuery(document).ready(function() {
							    
							    'use strict';
							    
							 
							    $.ajax({
							            //beforeSend: function(){ sendRequest('canvas'); },
							            cache: false,
							            type: 'POST',
							            dataType: 'json',
							            url:'clientside/socket/call.php',
							            data: 'connector=monthly_avg_rpt',
							            success: function(data){
							              
							                loadorder_grahps(data);
							            },
							        });
							  
							  
							    
							    var delay = (function() {
								var timer = 0;
								return function(callback, ms) {
								    clearTimeout(timer);
								    timer = setTimeout(callback, ms);
								};
							    })();
							
							    jQuery(window).resize(function() {
								delay(function() {
								    m1.redraw();
								    m2.redraw();
								    m3.redraw();
								    m4.redraw();
								    m5.redraw();
								    m6.redraw();
								}, 200);
							    }).trigger('resize');
							  
							});
							$(document).ready(function() {
								cf_datapager(1,'monthlyaveragereports');
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
								cf_datapager(1,'monthlyaveragereports');
								});									
							});";				
		}
		
		elseif($action=="schoolattandencereport")
		{
			    
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="name ASC";
	            $academicyears_dd=$this->app->cmx->create_dd($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				
				
				$class_tbl="cm_classes";
				$class_condition="status!=2";
				$class_text="Select Class";
				$field_one="id";
				$field_two="name";
				$classorder_condition="name ASC";
	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);	
				$this->app->assign("classes_dd",$class_dd);
				
				$record_id=$this->app->getGetVar("record_id");
				
				if($record_id!="")
				{					
					$record_data=unserialize($record_id);			
					
					$school_atta_date = date('Y-m-d',strtotime($record_data['report_date']));
					
				}else
				{
					$school_atta_date = date('Y-m-d');
				}	
				
				
				
				
				
				
					
				
				
					$obj_classes = $this->app->load_model("cm_classes");
					$rs_classesarray=$obj_classes->execute("SELECT", false, ""," status != 2 and id!=0 ");
					$monthlyavgbyclass1=array();
					$present_percent = array();
					$absent_percent = array();
					$leave_percent = array();
					
					foreach($rs_classesarray as $classname)
					{
						
						$allclass[] = $classname['name'];
						
						$totalmonthattandencecount = 0;
						$school_attreports = $this->app->cmx->school_att_by_date($classname['id'],$school_atta_date);
						

						
						$totalmonthattandencecount = count($school_attreports);	
						$absentstudentcount = 0;
						$presentstudentcount = 0;
						
						
						foreach($school_attreports as $school_attreport)
						{
							if($school_attreport['default_status'] == "Absent")
							{
								$absentstudentcount += 1;
							}
							if($school_attreport['default_status'] == "Present")
							{
								$presentstudentcount += 1;
							}
							if($school_attreport['default_status'] == "Medical Leave" OR $monthlyaveragereportavg['default_status'] == "Official Leave")
							{
								$leavestudentcount += 1;
							}						
						}															
							
						$presentstudentattandence = ((($presentstudentcount * 100) / $totalmonthattandencecount ))?(($presentstudentcount * 100) / $totalmonthattandencecount ):'0';
						$absentstudentattandence = ((($absentstudentcount * 100) / $totalmonthattandencecount ))?(($absentstudentcount * 100) / $totalmonthattandencecount ):'0';
						$leavestudentattandence = ((($leavestudentcount * 100) / $totalmonthattandencecount ))?(($leavestudentcount * 100) / $totalmonthattandencecount ):'0';
						
						//$monthlyavgbyclass1[] = ($monthlyavgbyclass!= '')?$monthlyavgbyclass:0;
						
						$present_percent[] = number_format((float)$presentstudentattandence, 2, '.', '');
						$absent_percent[] = number_format((float)$absentstudentattandence, 2, '.', '');
						$leave_percent[] = number_format((float)$leavestudentattandence, 2, '.', '');
					
						if($presentstudentattandence == 0 AND $absentstudentattandence == 0 AND $leavestudentattandence == 0)
						{
							$not_marked_class[] = $classname['id'];
						}
						
					}
										
					
					
					$allclassexplodeforgraph = implode("','", $allclass);
										
					$presentatt_graph = implode(",", $present_percent);
					$absentatt_graph = implode(",", $absent_percent);
					$leaveatt_graph = implode(",", $leave_percent);
					
					$this->app->assign("schoolattandencedate",$school_atta_date);
					$this->app->assign("not_marked_class",$not_marked_class);
					
					
								
					$inscript.="function loadorder_grahps(labls)
							{
																
								var combinationChart = c3.generate({
						        bindto: '#combination-chart',
						        
						  
						        data: {				        	
						       		columns: [
						            	labls.class_n,
						                ['Present', ".$presentatt_graph."],
						                ['Absent', ".$absentatt_graph."],
						                ['Leave', ".$leaveatt_graph."],						               
						            ],
						            type: 'bar',
						            
						            groups: [
						                ['Present','Absent','Leave']
						            ]
						        },
						        axis: {
						          x: {
						           
						            type: 'category',
						            categories: ['".$allclassexplodeforgraph."'],						           
						          },          
						        },
						    });
						    }
							jQuery(document).ready(function() {
							    
							    'use strict';
							    
							 
							    $.ajax({
							            //beforeSend: function(){ sendRequest('canvas'); },
							            cache: false,
							            type: 'POST',
							            dataType: 'json',
							            url:'clientside/socket/call.php',
							            data: 'connector=monthly_avg_rpt',
							            success: function(data){
							              console.log(data);
							                loadorder_grahps(data);
							            },
							        });
							  
							  
							    
							    var delay = (function() {
								var timer = 0;
								return function(callback, ms) {
								    clearTimeout(timer);
								    timer = setTimeout(callback, ms);
								};
							    })();
							
							    jQuery(window).resize(function() {
								delay(function() {
								   
								}, 200);
							    }).trigger('resize');
							  
							});
							$(document).ready(function() {
								cf_datapager(1,'schoolattandencereport');
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
								cf_datapager(1,'schoolattandencereport');
								});									
							});";				
		}
		

		elseif($action=="leavereports")
		{
			    $inscript.="
				$(document).ready(function() {
					//cf_datapager(1,'leavereports');
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
					//cf_datapager(1,'leavereports');
					});								
				});";
				
			$academicyears_tbl="cm_academicyears";
			$academicyears_condition="status!=2";
			$academicyears_text="Select Academic Years";
			$field_one="id";
			$field_two="name";
			$academicyearsorder_condition="name ASC";
            $academicyears_dd=$this->app->cmx->create_dd($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
			$this->app->assign("academic_year_dd",$academicyears_dd);
			
				
			$record_id=$this->app->getGetVar("record_id");
			if($record_id!="")
			{
				$obj_excel = $this->app->load_module("PHPExcel");
				
				$record_data=unserialize($record_id);
				
				$academicyear1 = $record_data['academicyear1'];
				$from_date = $record_data['from_date'];
				$to_date = $record_data['to_date'];
				$leavetype = $record_data['leavetype'];
				$downloadreport = $record_data['downloadreport'];
				
				$filterquery = '';
				if($from_date != '' &&  $to_date != '')
				{
					$from_date = date('Y-m-d',strtotime($from_date));
					$to_date = date('Y-m-d',strtotime($to_date));
					
					$filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$from_date."'  AND '".$to_date."'";
				}
				if($leavetype != '')
				{
					if($leavetype == "ol")
					{
						$leavetype = "Official Leave";
					}else
					{
						$leavetype = "Medical Leave";
					}
					
					$filterquery .= " AND default_status = '".$leavetype."'";
				}
	
			
						
				$sql="SELECT `cm_attendance`.*,student.division,student.name as studentname,student.id_no as studentidno, cm_course.course_name,cm_semesters.name as sem_name,cm_divisions.name as divisionname FROM `cm_attendance`
					  LEFT JOIN student ON student.id = cm_attendance.student_id 
					  LEFT JOIN cm_course ON cm_attendance.course = cm_course.id
					  LEFT JOIN cm_semesters ON cm_attendance.sem = cm_semesters.id
					  LEFT JOIN cm_divisions ON student.division = cm_divisions.id
					  WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery."  group by cm_attendance.student_id";
				$obj_model_leave_report = $this->app->load_model("cm_attendance");
				$leave_report_result = $obj_model_leave_report->execute("SELECT",false,$sql);
				
				
				if(count($leave_report_result) > 0)
				{
				
					$leavereporttable = "<table class=\"table table-stripped\"><thead><tr>
		    			<th>Sr.</th>
		    			<th>ID NO.</th>
		    			<th>Name</th>
		    			<th>Course</th>
		    			<th>Semester</th>
		    			<th>Division</th>
		    			<th>Start Date</th>
		    			<th>End Date</th>
		    			<th>Total Days</th>
		    		</tr></thead><tbody>";	
					foreach($leave_report_result as $k => $leavereport)
					{						
						$sql="SELECT `cm_attendance`.*,student.division,student.name as studentname,student.id_no as studentidno, cm_course.course_name,cm_semesters.name as sem_name,cm_divisions.name as divisionname FROM `cm_attendance`
							  LEFT JOIN student ON student.id = cm_attendance.student_id 
							  LEFT JOIN cm_course ON cm_attendance.course = cm_course.id
							  LEFT JOIN cm_semesters ON cm_attendance.sem = cm_semesters.id
							  LEFT JOIN cm_divisions ON student.division = cm_divisions.id
							  WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery." and cm_attendance.student_id = ".$leavereport['student_id'];
						$obj_model_date_leave_report = $this->app->load_model("cm_attendance");
						$leave_date_report_result = $obj_model_date_leave_report->execute("SELECT",false,$sql);
					
						$countdate = count($leave_date_report_result);
						
						$startdate = date('Y-m-d',$leave_date_report_result[0]['add_date']);
						$enddate = date('Y-m-d',$leave_date_report_result[$countdate-1]['add_date']);
						
						$totaldays = $this->app->cmx->createDateRange($startdate, $enddate, $format = "Y-m-d");
					
						$srno = $k+1;
						$leavereporttable .= "<tr>";
						$leavereporttable .= "<td>".$srno."</td>";
						$leavereporttable .= "<td>".$leavereport['studentidno']."</td>";
						$leavereporttable .= "<td>".$leavereport['studentname']."</td>";
						$leavereporttable .= "<td>".$leavereport['course_name']."</td>";
						$leavereporttable .= "<td>".$leavereport['sem_name']."</td>";
						$leavereporttable .= "<td>".$leavereport['divisionname']."</td>";
						$leavereporttable .= "<td>".$startdate."</td>";
						$leavereporttable .= "<td>".$enddate."</td>";
						$leavereporttable .= "<td>".count($totaldays)."</td>";
						$leavereporttable .= "</tr>";
						
						
					   
					}
					$leavereporttable .= "</tbody></table>";
					$this->app->assign("leavereportrecords",$leavereporttable);	
				}else
				{
					$this->app->assign("leavereportrecords","notfound");	
				}
			}	
		}
		
		
		elseif($action=="absentreports")
		{
			    $inscript.="
				$(document).ready(function() {
					//cf_datapager(1,'absentreports');
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
					//cf_datapager(1,'absentreports');
					});								
				});";
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="name ASC";
	            $academicyears_dd=$this->app->cmx->create_dd($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				
				$course_tbl="cm_course";
				$course_condition="status!=2";
				$course_text="Select Course";
				$field_one="id";
				$field_two="course_name";
				$courseorder_condition="course_name ASC";
	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	
				$this->app->assign("course_dd",$course_dd);
				
				$semester_tbl="cm_semesters";
				$semester_condition="status!=2";
				$semester_text="Select Semester";
				$field_one="id";
				$field_two="name";
				$semesterorder_condition="name ASC";
	            $semester_dd=$this->app->cmx->create_dd($semester_tbl,$semester_condition,$field_one,$field_two,$semester_text,$semesterorder_condition);	
				$this->app->assign("sem_dd",$semester_dd);
				
				
				$division_tbl="cm_divisions";
				$division_condition="status!=2";
				$division_text="Select Division";
				$field_one="id";
				$field_two="name";
				$divisionorder_condition="name ASC";
	            $division_dd=$this->app->cmx->create_dd($division_tbl,$division_condition,$field_one,$field_two,$division_text,$divisionorder_condition);	
				$this->app->assign("division_dd",$division_dd);
			
			$record_id=$this->app->getGetVar("record_id");
			if($record_id!="")
			{
				$record_data=unserialize($record_id);
				
				
						
				$academicyear1 = $$record_data['academicyear1'];
				$course1 = $record_data['course1'];
				$sem1 = $record_data['sem1'];
				$division1 = $record_data['division1'];
				//$from_date = $record_data['date'];
				$lastdate = $record_data['lastdate'];
				
				$from_date = date('Y-m-d',(strtotime('+1day',strtotime($record_data['date']))));
				$to_date = date('Y-m-d',(strtotime ( '-'.$lastdate.'day' , strtotime ( $from_date) ) ));
			
			
			
		
			$filterquery = '';
			if($course1 != '')
			{			
				$filterquery .= " AND cm_attendance.course = '".$course1."'";
			}
			if($sem1 != '')
			{			
				$filterquery .= " AND cm_attendance.sem = '".$sem1."'";
			}
			if($division1 != '')
			{			
				$filterquery .= " AND cm_attendance.div_id = '".$division1."'";
			}
			
			
			if($division1 != '')
			{			
				$filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$to_date."'  AND '".$from_date."'";
			}
			
			
				$sql="SELECT `cm_attendance`.*,student.division,cm_classes.name as class_name,student.name as studentname,student.student_mobile_no,student.id_no as studentidno, cm_course.course_name,cm_semesters.name as sem_name,cm_divisions.name as divisionname FROM `cm_attendance`
					  LEFT JOIN student ON student.id = cm_attendance.student_id 
					  LEFT JOIN cm_course ON cm_attendance.course = cm_course.id
					  LEFT JOIN cm_semesters ON cm_attendance.sem = cm_semesters.id
					  LEFT JOIN cm_divisions ON cm_attendance.div_id = cm_divisions.id
					  LEFT JOIN cm_classes ON cm_attendance.class_id = cm_classes.id
					  WHERE cm_attendance.id!=0 and cm_attendance.default_status = 'Absent' and cm_attendance.status!=2  ".$filterquery."  group by cm_attendance.student_id";
				$obj_model_absent_report = $this->app->load_model("cm_attendance");
				$absent_report_result = $obj_model_absent_report->execute("SELECT",false,$sql);
				
				
				if(count($absent_report_result) > 0)
				{
					$this->app->assign("absentreportrecords",$absent_report_result);
				}else
				{
					$this->app->assign("absentreportrecords","notfound");
				}
			}	
		}


		  elseif($action=="editattandencereports")
		  {
			  
			    $inscript.="
				$(document).ready(function() {
					//cf_datapager(1,'editattandencereports');
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
					//cf_datapager(1,'editattandencereports');
					});
				});";
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="name ASC";
	            $academicyears_dd=$this->app->cmx->create_dd($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				
				$course_tbl="cm_course";
				$course_condition="status!=2";
				$course_text="Select Course";
				$field_one="id";
				$field_two="course_name";
				$courseorder_condition="course_name ASC";
	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	
				$this->app->assign("course_dd",$course_dd);
				
				$semester_tbl="cm_semesters";
				$semester_condition="status!=2";
				$semester_text="Select Semester";
				$field_one="id";
				$field_two="name";
				$semesterorder_condition="name ASC";
	            $semester_dd=$this->app->cmx->create_dd($semester_tbl,$semester_condition,$field_one,$field_two,$semester_text,$semesterorder_condition);	
				$this->app->assign("sem_dd",$semester_dd);
				
				
				$division_tbl="cm_divisions";
				$division_condition="status!=2";
				$division_text="Select Division";
				$field_one="id";
				$field_two="name";
				$divisionorder_condition="name ASC";
	            $division_dd=$this->app->cmx->create_dd($division_tbl,$division_condition,$field_one,$field_two,$division_text,$divisionorder_condition);	
				$this->app->assign("division_dd",$division_dd);
				
				
				
			if($this->app->getGetVar("record_id"))
			{
				$postrecord=unserialize($this->app->getGetVar("record_id"));
				   	
				$academic_year = $postrecord['academic_year1'];			
				$report_month = $postrecord['report_month'];			
				$course = $postrecord['course1'];
				$sem = $postrecord['sem1'];
				$division = $postrecord['division1'];
				
				$date = $academic_year.'-'.$report_month.'-01';					
				$from_date = date('d-m-Y',strtotime($date));
				$to_date  =  date('t-m-Y',strtotime($date));
			
			
			$dateranges = $this->app->cmx->createDateRange($from_date, $to_date, $format = "Y-m-d");
			
			$filterquery = '';
			if($course != '')
			{
				$filterquery .= " AND cm_attendance.course = ".$course;
			}
			if($sem != '')
			{
				$filterquery .= " AND cm_attendance.sem = ".$sem;
			}
			if($division != '')
			{
				$filterquery .= " AND student.division = ".$division;
			}
			if($from_date != '' &&  $to_date != '')
			{
				$from_date = date('Y-m-d',strtotime($from_date));
				$to_date = date('Y-m-d',strtotime($to_date));
				
				$filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$from_date."'  AND '".$to_date."'";
			}
				
			$sql="SELECT `cm_attendance`.*,cm_attendance.id as attendanceid, student.*,cm_classes.name as class_name,cm_divisions.name as division_name FROM `cm_attendance`
			  LEFT JOIN student ON student.id = cm_attendance.student_id 
			  LEFT JOIN cm_classes ON student.cm_class_id = cm_classes.id
			  LEFT JOIN cm_divisions ON student.division = cm_divisions.id
			  WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery." group by cm_attendance.student_id";
			$obj_model_edit_report = $this->app->load_model("cm_academicyears");
			$edit_report_result = $obj_model_edit_report->execute("SELECT",false,$sql);
		   
		   
		   
		    if(count($edit_report_result)>0)
	 		{
			 	$ExeclHeads = array("Sr.","ID NO.","Student Name","Class-Div");
				
				if($this->app->getPostvar('summeryreport') == 1)
				{
					
				}else
				{
					foreach($dateranges as $daterange)
					{
						$ExeclHeads[] = date('j-M',strtotime($daterange));
						$workingdays = $this->app->cmx->workingdays_month($daterange);
						if($workingdays > 0)
						{
							$countworkingdays += 1;
						}
					}
				}
				array_push($ExeclHeads,"Total Present","Total Absent","Working Days","Persent %");
				
				
				$report_array = array();
				foreach($edit_report_result as $key => $row)
				{
					$countpresent = '';	
					$countabsent = '';
					$countworkingdays = '';
					foreach($dateranges as $daterange)
					{
						$workingdays = $this->app->cmx->workingdays_month($daterange);
						if($workingdays > 0)
						{
							$countworkingdays += 1;
						}
						
						$present_or_absent = $this->app->cmx->detail_report_student_present_or_absent($row['student_id'],$row['course'],$row['sem'],$daterange);	
						if($present_or_absent == 1)
						{
							$report_array[$key][] = "p";
							$countpresent[] = "yes";
						}else
						{
							$report_array[$key][] = "A";
							$countabsent[] = "no";
						}
					}
								
					if(!empty($countpresent))
					{
						$countpresent = count($countpresent);						
					}else
					{
						$countpresent = 0;
					}			
								
										
					$per = ($countpresent*100)/$countworkingdays;
					$percetageattadence = number_format((float)$per, 2, '.', '');
					
					$report_array[$key]['sr'] = $i;
					$report_array[$key]['id_no'] = $row["id_no"];
					$report_array[$key]['name'] = $row["name"];
					$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
					$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
					$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
					$report_array[$key]['working_days'] = $countworkingdays;
					$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
				

				}
				$array_field=array();
				$data_array=$report_array;
				$fields = array("id_no","name","class_div");
				if($this->app->getPostvar('summeryreport') == 1)
				{
					
				}else
				{
					foreach($dateranges as $k => $daterange)
					{
						$fields[] = $k;
					}
				}
				array_push($fields,"total_present","total_absent","working_days","percent");
				$table = $this->editreporttable($ExeclHeads,$report_array,$fields,$edit_report_result);
				$this->app->assign("display_table",$table);
			}else
			{
				$this->app->assign("display_table","notfound");
			}
			}
		}	


		  
		  
		  elseif($action=="markattandences")
		  {
			$action=$this->app->getGetVar("action");
			$subaction=$this->app->getGetVar("subaction");
			$record_id=$this->app->getGetVar("record_id");
			  if($record_id=="") {
				$inscript.="
				$(document).ready(function() {
					cf_datapager(1,'markattandences');
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
					cf_datapager(1,'markattandences');
					});
				});";
			  }

				$class_tbl="cm_classes";
				$class_condition="status!=2";
				$class_text="Select Class";
				$field_one="id";
				$field_two="name";
				$classorder_condition="name ASC";
	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);	
				$this->app->assign("classes_dd",$class_dd);
				
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="name ASC";
	            $academicyears_dd=$this->app->cmx->create_dd($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				
				$section_tbl="cm_sections";
				$section_condition="status!=2";
				$section_text="Select Section";
				$field_one="id";
				$field_two="section_name";
				$sectionorder_condition="section_name ASC";
				$gruopby_condition = "section_name";
				$section_dd=$this->app->cmx->create_dd($section_tbl,$section_condition,$field_one,$field_two,$section_text,$sectionorder_condition,$gruopby_condition);	
				//print_r($section_dd); exit;
				$this->app->assign("section_dd",$section_dd);
				
				$course_tbl="cm_course";
				$course_condition="status!=2";
				$course_text="Select Course";
				$field_one="id";
				$field_two="course_name";
				$courseorder_condition="course_name ASC";
	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	
				$this->app->assign("course_dd",$course_dd);
				
				$semester_tbl="cm_semesters";
				$semester_condition="status!=2";
				$semester_text="Select Semester";
				$field_one="id";
				$field_two="name";
				$semesterorder_condition="name ASC";
	            $semester_dd=$this->app->cmx->create_dd($semester_tbl,$semester_condition,$field_one,$field_two,$semester_text,$semesterorder_condition);	
				$this->app->assign("sem_dd",$semester_dd);
				
				
				$division_tbl="cm_divisions";
				$division_condition="status!=2";
				$division_text="Select Division";
				$field_one="id";
				$field_two="name";
				$divisionorder_condition="name ASC";
	            $division_dd=$this->app->cmx->create_dd($division_tbl,$division_condition,$field_one,$field_two,$division_text,$divisionorder_condition);	
				$this->app->assign("division_dd",$division_dd);
				
				
				/*  Add Attendence List*/
								
				$id_dec=$this->app->cmx->decrypt($record_id,ency_key);	
				
				if($id_dec > 0 && $record_id!="")
				{
					$this->app->assign("markattandence_id",$record_id);	
					
					
					$todayleavestudents = $this->app->cmx->today_leave();
					
					if(count($todayleavestudents)>0)
					{
						$ts=array();
						foreach($todayleavestudents as $ts)
						{
							$studarray[]=$ts["student_id"];
						}
					}
					else 
					{
						$ts=array();
					}
					
									
					$this->app->assign("official_and_medical_leave_students",$studarray);	
					
					$comparedatefortodayattandance = "STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') = '".date('Y-m-d')."'";
					$obj_atten = $this->app->load_model("cm_attendance");
					$obj_atten->join_table("student","left",array('id_no,name,branch'),array("student_id"=>"id"));
					$rs_check = $obj_atten->execute("SELECT",false,"","cm_attendance.mkattend_id=".$id_dec." AND ".$comparedatefortodayattandance);
					
					if(count($rs_check)>0)
					{
						$this->app->assign("editr",$rs_check);
										
					}
					else 
					{
						$this->app->assign("editr",null);		
					}
					
					
					$obj_model_admin = $this->app->load_model("cm_markattandence");
					$rsres = $obj_model_admin->execute("SELECT",false,"","id=".$id_dec);
					$this->app->assign("atten",$rsres);
					$this->app->assign("add_date",$rsres[0]["add_date"]);

					
					$this->app->assign("markattandence_id",$id_dec);
					
					
					$obj_model_admin = $this->app->load_model("student");
					
					//$studentsres = $obj_model_admin->execute("SELECT",false,"","course_id=".$rsres[0]['course']." AND student.sem = ".$rsres[0]['sem']);
					$studentsres = $obj_model_admin->execute("SELECT",false,"","cm_class_id=".$rsres[0]['class_id'],"id_no asc");
					 //echo $obj_model_admin->sql; exit;
					$this->app->assign("students",$studentsres);
					$this->app->assign("class_id",$rsres[0]['class_id']);


					$inscript.="
					$(document).ready(function() {
						cf_datapager(1,'entermarkattendance');
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
						cf_datapager(1,'entermarkattendance');
						});									
					});";	
				
				
				}
			    else
			    {
	
                }
		  }
			 elseif($action=="import")
		  {
						//$this->app->setAddJS(SERVER_ROOT.'/cm/js/ajax.form.js');
						$this->app->setAddJS(SERVER_ROOT .'/cm/js/importstudent.js');
			}
		  else
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'markattandences');
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
					cf_datapager(1,'markattandences');
					});
				});";
				
		  }
		
		//1489363200
		
			$this->app->setInlineScripts($inscript);			
			$this->app->assign("module_title","studententry");
			$this->app->assign("menu_base",CMX_ROOT.'/studententry');
		}


		function save_attendance()
		{
			
				//$obj_model_pro = $this->app->load_model("cm_attendance", $id);
				
				$student_id = $this->app->getPostVar("student_id1");
				$course = $this->app->getPostVar("course1");
				$sem = $this->app->getPostVar("sem1");
				$add_date = $this->app->getPostVar("add_date1");
				$default_status = $this->app->getPostVar("default_status1");
				$remarks = $this->app->getPostVar("remarks1");
				$record_id = $this->app->getPostVar("record_id");
				$attandence_id = $this->app->getPostVar("attandence_id");
				$returnUrl=$this->app->getPostVar("returnUrl");
				$recid=$this->app->cmx->decrypt($record_id,ency_key);				
				$attandenceidforedit = $this->app->getPostVar('edit_id');
					
				
			
				$classid = $this->app->load_model("cm_markattandence");
				$classidanddivision = $classid->execute("SELECT",false,"","id=".$record_id);
				

							
				for($i=0;$i<count($student_id);$i++)
				{
					
					$student_atten_check=$this->app->cmx->check_student_attendence($student_id[$i],$add_date[$i]);		
					$comparedatefortodayattandance = "STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') = '".$add_date[$i]."'";
														
					if(count($student_atten_check)>0)
					{							
						if($i == 0)
						{
							$obj_model_log = $this->app->load_model("cm_attendance");
							$obj_model_log->execute("DELETE",false,"","mkattend_id=".$record_id." AND ".$comparedatefortodayattandance." AND default_status NOT IN('Official Leave','Medical Leave')");
						}
						
						if($default_status[$i]!='NA')
						{							
							$data = array();
							$data["student_id"] = $student_id[$i];							
							$data["course"] = $course[$i];
							$data["div_id"] = $classidanddivision[0]['division'];							
							$data["class_id"] = $classidanddivision[0]['class_id'];
							$data['acd_year']=$classidanddivision[0]['academic_year'];
							$data["sem"] = $sem[$i];
							$data["add_date"] = strtotime($add_date[$i]);
							$data["default_status"] = $default_status[$i];
							$data["remarks"] = $remarks[$i];
							$data["added_on"] = strtotime(date('Y-m-d'));
							$data["added_by"] = $_SESSION['StaffID'];
							$data["mkattend_id"] = $record_id;
							$obj_model_atten = $this->app->load_model("cm_attendance");		
							$obj_model_atten->map_fields($data);
							$obj_model_atten->execute("INSERT");
						}else
						{
							
						}
					}else
					{
						$data = array();
						$data["student_id"] = $student_id[$i];
						$data["course"] = $course[$i];
						$data["div_id"] = $classidanddivision[0]['division'];							
						$data["class_id"] = $classidanddivision[0]['class_id'];
						$data['acd_year']=$classidanddivision[0]['academic_year'];
						$data["sem"] = $sem[$i];
						$data["add_date"] = strtotime($add_date[$i]);
						$data["default_status"] = $default_status[$i];
						$data["remarks"] = $remarks[$i];
						$data["added_on"] = strtotime(date('Y-m-d'));
						$data["added_by"] = $_SESSION['StaffID'];
						$data["mkattend_id"] = $record_id;
							
						$obj_model_atten = $this->app->load_model("cm_attendance");		
						$obj_model_atten->map_fields($data);
						$obj_model_atten->execute("INSERT");
					}						
				}
				
				$this->app->utility->set_message("Attandence Updated Successfully.","SUCCESS");
				
				if($this->app->getPostVar("save") == "save")
				{
					$this->app->redirect($returnUrl);	
				}else
				{
					$this->app->redirect(CMX_ROOT."/studententry/markattandences/");
				}	
		}

		function export_report()
		{
					
			$postvalues=$this->app->getPostVars();
			$pstring=serialize($postvalues);
			$url_redirect=CMX_ROOT.'/studententry/detailattandencereports/'.$pstring.'/';
			$this->app->redirect($url_redirect);
			exit;	
			
			// $course = $this->app->getPostvar('course_id');
			// $sem = $this->app->getPostvar('sem_id');
			// $division = $this->app->getPostvar('division_id');
			// $from_date = $this->app->getPostvar('from_date');
			// $to_date = $this->app->getPostvar('to_date');
			// $operator = $this->app->getPostvar('operator');
			// $operatorvalue = $this->app->getPostvar('operatorvalue');
// 			
			// $dateranges = $this->app->cmx->createDateRange($from_date, $to_date, $format = "Y-m-d");
// 			
			// $filterquery = '';
			// if($course != '')
			// {
				// $filterquery .= " AND cm_attendance.course = ".$course;
			// }
			// if($sem != '')
			// {
				// $filterquery .= " AND cm_attendance.sem = ".$sem;
			// }
			// if($division != '')
			// {
				// $filterquery .= " AND student.division = ".$division;
			// }
			// if($from_date != '' &&  $to_date != '')
			// {
				// $from_date = date('Y-m-d',strtotime($from_date));
				// $to_date = date('Y-m-d',strtotime($to_date));
// 				
				// $filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$from_date."'  AND '".$to_date."'";
			// }
// 					
			// $sql="SELECT `cm_attendance`.*,student.*,cm_classes.name as class_name,cm_divisions.name as division_name FROM `cm_attendance`
				  // LEFT JOIN student ON student.id = cm_attendance.student_id 
				  // LEFT JOIN cm_classes ON student.class_id = cm_classes.id
				  // LEFT JOIN cm_divisions ON student.division = cm_divisions.id
				  // WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery." group by cm_attendance.student_id";
			// $obj_model_detail_report = $this->app->load_model("cm_academicyears");
			// $detail_report_result = $obj_model_detail_report->execute("SELECT",false,$sql);
// 			
// 					
// 			
			// if(count($detail_report_result)>0)
	 		// {
			 	// $app->no_html=true;
				// $obj_excel = $this->app->load_module("PHPExcel");
				// $ExeclHeads = array("Sr.","ID NO.","Student Name","Class-Div");
// 				
				// if($this->app->getPostvar('summeryreport') == 1)
				// {
// 					
				// }else
				// {
					// foreach($dateranges as $daterange)
					// {
						// $ExeclHeads[] = date('j-M',strtotime($daterange));
						// $workingdays = $this->app->cmx->workingdays_month($daterange);
						// if($workingdays > 0)
						// {
							// $countworkingdays += 1;
						// }
					// }
				// }
				// array_push($ExeclHeads,"Total Present","Total Absent","Working Days","Persent %");
// 				
// 				
				// $i=0+1;
				// $full_price_total=0;
				// $nights_total=0;
				// $nr_pax=0;				
				// $report_array = array();
// 				
// 				
// 				
				// foreach($detail_report_result as $key => $row)
				// {					
					// $countpresent = '';	
					// $countabsent = '';
					// $countworkingdays = '';
// 					
					// foreach($dateranges as $daterange)
					// {
						// $workingdays = $this->app->cmx->workingdays_month($daterange);
						// if($workingdays > 0)
						// {
							// $countworkingdays += 1;
						// }
// 						
						// $present_or_absent = $this->app->cmx->detail_report_student_present_or_absent($row['student_id'],$row['course'],$row['sem'],$daterange);	
// 						
						// if($present_or_absent == 1)
						// {
							// $report_array[$key][] = "p";
							// $countpresent[] = "yes";							
						// }
						// else
						// {
							// $report_array[$key][] = "A";
							// $countabsent[] = "no";							
						// }
					// }
// 					
					// if(!empty($countpresent))
					// {
						// $countpresent = count($countpresent);						
					// }else
					// {
						// $countpresent = 0;
					// }
// 					
					// $per = ($countpresent*100)/$countworkingdays;
// 					
// 					
// 					
					// if($operator == "eql" )
					// {
// 							
						// if($per == $operatorvalue)
						// {
							// $report_array[$key]['sr'] = $i;
							// $report_array[$key]['id_no'] = $row["id_no"];
							// $report_array[$key]['name'] = $row["name"];
							// $report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
							// $report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
							// $report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
							// $report_array[$key]['working_days'] = $countworkingdays;
							// $report_array[$key]['percent'] = ((($countpresent*100)/$countworkingdays) != '') ? (($countpresent*100)/$countworkingdays) : '00';
						// }						
					// }
					// elseif($operator == "greter" )
					// {
						// if($per > $operatorvalue)
						// {
							// $report_array[$key]['sr'] = $i;
							// $report_array[$key]['id_no'] = $row["id_no"];
							// $report_array[$key]['name'] = $row["name"];
							// $report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
							// $report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
							// $report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
							// $report_array[$key]['working_days'] = $countworkingdays;
							// $report_array[$key]['percent'] = ((($countpresent*100)/$countworkingdays) != '') ? (($countpresent*100)/$countworkingdays) : '00';
						// }
// 						
					// }elseif($operator == "gretereql" )
					// {
						// if($per >= $operatorvalue)
						// {
							// $report_array[$key]['sr'] = $i;
							// $report_array[$key]['id_no'] = $row["id_no"];
							// $report_array[$key]['name'] = $row["name"];
							// $report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
							// $report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
							// $report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
							// $report_array[$key]['working_days'] = $countworkingdays;
							// $report_array[$key]['percent'] = ((($countpresent*100)/$countworkingdays) != '') ? (($countpresent*100)/$countworkingdays) : '00';
						// }
// 						
					// }
					// elseif($operator == "less" )
					// {						
						// if($per < $operatorvalue)
						// {
							// $report_array[$key]['sr'] = $i;
							// $report_array[$key]['id_no'] = $row["id_no"];
							// $report_array[$key]['name'] = $row["name"];
							// $report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
							// $report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
							// $report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
							// $report_array[$key]['working_days'] = $countworkingdays;
							// $report_array[$key]['percent'] = ((($countpresent*100)/$countworkingdays) != '') ? (($countpresent*100)/$countworkingdays) : '00';
						// }						
					// }elseif($operator == "lesseql" )
					// {
						// if($per <= $operatorvalue)
						// {
							// $report_array[$key]['sr'] = $i;
							// $report_array[$key]['id_no'] = $row["id_no"];
							// $report_array[$key]['name'] = $row["name"];
							// $report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
							// $report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
							// $report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
							// $report_array[$key]['working_days'] = $countworkingdays;
							// $report_array[$key]['percent'] = ((($countpresent*100)/$countworkingdays) != '') ? (($countpresent*100)/$countworkingdays) : '00';
						// }
					// }
					// else
					// {
						// $report_array[$key]['sr'] = $i;
						// $report_array[$key]['id_no'] = $row["id_no"];
						// $report_array[$key]['name'] = $row["name"];
						// $report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
						// $report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
						// $report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
						// $report_array[$key]['working_days'] = $countworkingdays;
						// $report_array[$key]['percent'] = ((($countpresent*100)/$countworkingdays) != '') ? (($countpresent*100)/$countworkingdays) : '00';
					// }
				// }
// 				
				// $array_field=array();
				// $data_array = array();
// 				
				// // this condition for only selecte by operator and value student
				// foreach($report_array as $report_arra)
				// {
					// if($report_arra['id_no'] != '')
					// {
						// $data_array[] = $report_arra;
					// }
				// }
// 				
				// //$fields=array("sr","id_no","name","class_div","present_or_absent","status","added_on","last_updated");
// 				
				// $fields = array("sr","id_no","name","class_div");
				// if($this->app->getPostvar('summeryreport') == 1)
				// {
// 					
				// }
				// else
				// {
					// foreach($dateranges as $k => $daterange)
					// {
						// $fields[] = $k;
					// }
				// }
// 						
				// array_push($fields,"total_present","total_absent","working_days","percent");
// 				
				// if($this->app->getPostvar('course_id') == 1)
				// {
					// $excel_postfix="detailreport_".time();
					// $filename="report_".$excel_postfix;
					// $this->app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
					// $path=ABS_PATH.'/'.$this->app->get_user_config("table_backups").$filename.'.xls';
					// $url=SERVER_ROOT.'/cm/download.php?f='.$path;
					// $this->app->redirect($url);
// 					
					// $table = $this->detailreport($ExeclHeads,$report_array,$fields,$operator,$operatorvalue);
					// $this->app->assign("display_table",$table);
// 			
				// }else
				// {
					// $table = $this->detailreport($ExeclHeads,$report_array,$fields,$operator,$operatorvalue);
					// $this->app->assign("display_table",$table);
				// }
			// }
		}


		
		function libraryhours($ExeclHeads,$array_field,$fields,$operator='',$operatorvalue='')
		{
						
			
			$html = "<table class=\"table table-stripped reporttable\" ><thead><tr>";
					foreach($ExeclHeads as $ExeclHead)
					{
			$html .= "<th>".$ExeclHead."</th>";
					} 
			$html .= "</tr></thead>";
					for($i=0;$i<count($array_field);$i++)
					{					
			$html .= "<tr>";
					$k=$i+1;
					$html .= "<td>".$k."</td>";
					for($j=0;$j<count($fields);$j++)
					{
						
						$html .= "<td>".$array_field[$i][$fields[$j]]."</td>";
						
					}					
			$html .= "</tr>";
					}
			$html .= "</table>";
			
			return $html;
		}
		

		function detailreport($ExeclHeads,$array_field,$fields,$operator='',$operatorvalue='')
		{			
		
			
			$html = "
			<style>
table.dataTable thead>tr>th.sorting
{
min-width:94px !important;
}
</style>
			<table class=\"table table-stripped reporttable\" ><thead><tr>";
					foreach($ExeclHeads as $ExeclHead)
					{
			$html .= "<th>".$ExeclHead."</th>";
					} 
			$html .= "</tr></thead>";
					for($i=0;$i<count($array_field);$i++)
					{					
			$html .= "<tr>";
						$k=$i+1;
						$html .= "<td>".$k."</td>";
					for($j=0;$j<count($fields);$j++)
					{					
						if($operator == "eql")
						{
							if($array_field[$i]["percent"]  == $operatorvalue)
							{							
									
								$html .= "<td>".$array_field[$i][$fields[$j]]."</td>";
							}
						}elseif($operator == "lesseql")
						{
							if($array_field[$i]["percent"]  <= $operatorvalue)
							{							
									
								$html .= "<td>".$array_field[$i][$fields[$j]]."</td>";
							}
						}
						elseif($operator == "less")
						{
							
							if($array_field[$i]["percent"]  < $operatorvalue)
							{							
									
								$html .= "<td>".$array_field[$i][$fields[$j]]."</td>";
							}
						}
						elseif($operator == "greter")
						{
							if($array_field[$i]["percent"]  > $operatorvalue)
							{							
									
								$html .= "<td>".$array_field[$i][$fields[$j]]."</td>";
							}
						}
						elseif($operator == "gretereql")
						{
							if($array_field[$i]["percent"]  >= $operatorvalue)
							{							
									
								$html .= "<td>".$array_field[$i][$fields[$j]]."</td>";
							}
						}else
						{
							$html .= "<td>".$array_field[$i][$fields[$j]]."</td>";
						}
					}					
			$html .= "</tr>";
					}
			$html .= "</table>";
			
			return $html;
		}



		
		
		public function edit_report()
		{			
			$academic_year = $this->app->getPostvar('academic_year1');
			
			
			
			$report_month = $this->app->getPostvar('report_month');			
			$course = $this->app->getPostvar('course1');
			$sem = $this->app->getPostvar('sem1');
			$division = $this->app->getPostvar('division1');
			
			$date = $academic_year.'-'.$report_month.'-01';					
			$from_date = date('d-m-Y',strtotime($date));
			$to_date  =  date('t-m-Y',strtotime($date));
			
			
			$dateranges = $this->app->cmx->createDateRange($from_date, $to_date, $format = "Y-m-d");
			
			$filterquery = '';
			if($course != '')
			{
				$filterquery .= " AND cm_attendance.course = ".$course;
			}
			if($sem != '')
			{
				$filterquery .= " AND cm_attendance.sem = ".$sem;
			}
			if($division != '')
			{
				$filterquery .= " AND student.division = ".$division;
			}
			if($from_date != '' &&  $to_date != '')
			{
				$from_date = date('Y-m-d',strtotime($from_date));
				$to_date = date('Y-m-d',strtotime($to_date));
				
				$filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$from_date."'  AND '".$to_date."'";
			}
					
			/*$sql="SELECT `cm_attendance`.*,student.*,cm_classes.name as class_name,cm_divisions.name as division_name FROM `cm_attendance`
				  LEFT JOIN student ON student.id = cm_attendance.student_id 
				  LEFT JOIN cm_classes ON student.class_id = cm_classes.id
				  LEFT JOIN cm_divisions ON student.division = cm_divisions.id
				  WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery;
			$obj_model_detail_report = $this->app->load_model("cm_academicyears");
			$detail_report_result = $obj_model_detail_report->execute("SELECT",false,$sql);
			$this->app->assign("display_table",$table);*/
			
			$postvalues=$this->app->getPostVars();
			
			$pstring=serialize($postvalues);
			$url_redirect=CMX_ROOT.'/studententry/editattandencereports/'.$pstring.'/';
			$this->app->redirect($url_redirect);
			exit;
		} 


		function editreporttable($ExeclHeads,$array_field,$fields,$edit_report_result)
		{
			$postrecord=unserialize($this->app->getGetVar("record_id"));
				
			$month=$postrecord['report_month'];
			$month=sprintf('%02d', $month);
			
			
			$html = "<table class=\"table table-stripped\" ><thead><tr>";
					foreach($ExeclHeads as $ExeclHead)
					{
			$html .= "<th>".$ExeclHead."</th>";
					} 
			$html .= "</tr></thead>";
			$html .= "
					<input type='hidden' name='course' value='".$edit_report_result[0]['course']."'/>
					<input type='hidden' name='mkattend_id' value='".$edit_report_result[0]['mkattend_id']."'/>
					<input type='hidden' name='sem' value='".$edit_report_result[0]['sem']."'/>";					
					
					for($i=0;$i<count($array_field);$i++)
					{					
			$html .= "<tr>";
			$html .= "
					<input type='hidden' name='student_id[]' value='".$edit_report_result[$i]['student_id']."'/>";					
					
					$k = $i + 1;
					$html .= "<td>".$k."</td>";
							
					for($j=0;$j<count($fields);$j++)
					{				
						
						if(gettype($fields[$j]) == string)
						{						
							$html .= "<td>".$array_field[$i][$fields[$j]]."</td>";
						}else
						{
							$date=date('Y').'-'.$month.'-'.sprintf('%02d', ($j-2));	
							$date_stp=strtotime($date);
							$html .= "<td>
							<select name='editattandence[".$date_stp."][]'>";
								$absentselected = ($array_field[$i][$fields[$j]] == 'A')?'selected':'';
								$presentselected = ($array_field[$i][$fields[$j]] == 'p')?'selected':'';
								
								$html .= "<option value='Absent' ".$absentselected.">A</option>";
								$html .= "<option value='Present' ".$presentselected.">P</option>";
								
							$html .= "</select></td>";
						}
					}					
			$html .= "</tr>";
					}
			$html .= "</table>";
			
			return $html;
		}
		
		
		
		function updateattandence()
		{
				
						
			$dates = $this->app->getPostVar('editattandence');
			$students = $this->app->getPostVar('student_id');
			$semester = $this->app->getPostVar('sem');
			$mkattend_id = $this->app->getPostVar('mkattend_id');
			$course = $this->app->getPostVar('course');
			
			foreach($students as $student)
			{
				$studentarray[] = $student;
			}
			
			foreach($dates as $key => $date)
			{
				$datekey[] = $key;
				$dateval[] = $date;
			}		
			
			foreach($studentarray as $s => $studentarra)
			{
				foreach($datekey as $dk => $dateke)
				{
					$comparedate = " STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') = '".date('Y-m-d',$dateke)."'";
					$sql="update cm_attendance set default_status='".$dateval[$dk][$s]."' where sem='".$semester."' AND course='".$course."' AND mkattend_id='".$mkattend_id."' AND student_id='".$studentarra."' AND ".$comparedate;
					$obj_model_update_report = $this->app->load_model("cm_attendance");
					$update_report_result = $obj_model_update_report->execute("SELECT",false,$sql);
  		   		}
			}
			
			$returnUrl=$this->app->getPostVar("returnUrl");
			$this->app->redirect($returnUrl);
	
		}
		
		
		public function frm_leavereport()
		{
			$postvalues=$this->app->getPostVars();
			
			$pstring=serialize($postvalues);
			$url_redirect=CMX_ROOT.'/studententry/leavereports/'.$pstring.'/';
			$this->app->redirect($url_redirect);
			exit;
			
			// $obj_excel = $this->app->load_module("PHPExcel");
// 				
			// $academicyear1 = $this->app->getPostVar('academicyear1');
			// $from_date = $this->app->getPostVar('from_date');
			// $to_date = $this->app->getPostVar('to_date');
			// $leavetype = $this->app->getPostVar('leavetype');
			// $downloadreport = $this->app->getPostVar('downloadreport');
// 			
			// $filterquery = '';
			// if($from_date != '' &&  $to_date != '')
			// {
				// $from_date = date('Y-m-d',strtotime($from_date));
				// $to_date = date('Y-m-d',strtotime($to_date));
// 				
				// $filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$from_date."'  AND '".$to_date."'";
			// }
			// if($leavetype != '')
			// {
				// if($leavetype == "ol")
				// {
					// $leavetype = "Official Leave";
				// }else
				// {
					// $leavetype = "Medical Leave";
				// }
// 				
				// $filterquery .= " AND default_status = '".$leavetype."'";
			// }
// 
// 		
// 					
			// $sql="SELECT `cm_attendance`.*,student.division,student.name as studentname,student.id_no as studentidno, cm_course.course_name,cm_semesters.name as sem_name,cm_divisions.name as divisionname FROM `cm_attendance`
				  // LEFT JOIN student ON student.id = cm_attendance.student_id 
				  // LEFT JOIN cm_course ON cm_attendance.course = cm_course.id
				  // LEFT JOIN cm_semesters ON cm_attendance.sem = cm_semesters.id
				  // LEFT JOIN cm_divisions ON student.division = cm_divisions.id
				  // WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery."  group by cm_attendance.student_id";
			// $obj_model_leave_report = $this->app->load_model("cm_attendance");
			// $leave_report_result = $obj_model_leave_report->execute("SELECT",false,$sql);
// 			
// 			
// 			
// 			
			// $leavereporttable = "<table class='table table-striped'><tr>
    			// <th>Sr.</th>
    			// <th>ID NO.</th>
    			// <th>Name</th>
    			// <th>Course</th>
    			// <th>Semester</th>
    			// <th>Division</th>
    			// <th>Start Date</th>
    			// <th>End Date</th>
    			// <th>Total Days</th>
    		// </tr>";	
			// foreach($leave_report_result as $k => $leavereport)
			// {						
				// $sql="SELECT `cm_attendance`.*,student.division,student.name as studentname,student.id_no as studentidno, cm_course.course_name,cm_semesters.name as sem_name,cm_divisions.name as divisionname FROM `cm_attendance`
					  // LEFT JOIN student ON student.id = cm_attendance.student_id 
					  // LEFT JOIN cm_course ON cm_attendance.course = cm_course.id
					  // LEFT JOIN cm_semesters ON cm_attendance.sem = cm_semesters.id
					  // LEFT JOIN cm_divisions ON student.division = cm_divisions.id
					  // WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery." and cm_attendance.student_id = ".$leavereport['student_id'];
				// $obj_model_date_leave_report = $this->app->load_model("cm_attendance");
				// $leave_date_report_result = $obj_model_date_leave_report->execute("SELECT",false,$sql);
// 			
				// $countdate = count($leave_date_report_result);
// 				
				// $startdate = date('Y-m-d',$leave_date_report_result[0]['add_date']);
				// $enddate = date('Y-m-d',$leave_date_report_result[$countdate-1]['add_date']);
// 				
				// $totaldays = $this->app->cmx->createDateRange($startdate, $enddate, $format = "Y-m-d");
// 			
				// $srno = $k+1;
				// $leavereporttable .= "<tr>";
				// $leavereporttable .= "<td>".$srno."</td>";
				// $leavereporttable .= "<td>".$leavereport['studentidno']."</td>";
				// $leavereporttable .= "<td>".$leavereport['studentname']."</td>";
				// $leavereporttable .= "<td>".$leavereport['course_name']."</td>";
				// $leavereporttable .= "<td>".$leavereport['sem_name']."</td>";
				// $leavereporttable .= "<td>".$leavereport['divisionname']."</td>";
				// $leavereporttable .= "<td>".$startdate."</td>";
				// $leavereporttable .= "<td>".$enddate."</td>";
				// $leavereporttable .= "<td>".count($totaldays)."</td>";
				// $leavereporttable .= "</tr>";
// 				
// 				
			   // $ExeclHeads=array("Sr.","ID NO.","Name","Course","Semester","Division","Start Date","End Date","Total Days");
// 				
// 				
			   // $report_array[]=array(
					// "sr"=>$srno,
					// "studentidno"=>$leavereport['studentidno'],
					// "studentname"=>$leavereport['studentname'],
					// "course_name"=>$leavereport['course_name'],
					// "sem_name"=>$leavereport['sem_name'],
					// "divisionname"=>$leavereport['divisionname'],
					// "startdate"=>$startdate,
					// "enddate"=>$enddate,
					// "totaldays"=>count($totaldays),
					// );
				// $array_field=array();
			// }
// 
				// $data_array=$report_array;
				// $fields=array("sr","studentidno","studentname","course_name","sem_name","divisionname","startdate","enddate","totaldays");
// 					
				// $excel_postfix="leavereport_".time();
				// $filename="report_".$excel_postfix;
				// $this->app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
				// $path=ABS_PATH.'/'.$this->app->get_user_config("table_backups").$filename.'.xls';
				// $url=SERVER_ROOT.'/cm/download.php?f='.$path;
				// $this->app->redirect($url);
// 			
			// $this->app->assign("leavereportrecords",$leavereporttable);			

		}

		public function frm_absentreport()
		{		
			$postvalues=$this->app->getPostVars();
			
			$pstring=serialize($postvalues);
			$url_redirect=CMX_ROOT.'/studententry/absentreports/'.$pstring.'/';
			$this->app->redirect($url_redirect);
			exit;
		}
		
		
		public function frm_libraryhoursreport()
		{		
			$postvalues=$this->app->getPostVars();
			
			$pstring=serialize($postvalues);
			$url_redirect=CMX_ROOT.'/studententry/libraryhoursreports/'.$pstring.'/';
			$this->app->redirect($url_redirect);
			exit;
		}
		
		
		public function frm_monthlyaveragereport()
		{		
			$postvalues=$this->app->getPostVars();
			
			$pstring=serialize($postvalues);
			$url_redirect=CMX_ROOT.'/studententry/monthlyaveragereports/'.$pstring.'/';
			$this->app->redirect($url_redirect);
			exit;
		}
		
		public function frm_schoolattandencereport()
		{		
			$postvalues=$this->app->getPostVars();
			
			$pstring=serialize($postvalues);
			$url_redirect=CMX_ROOT.'/studententry/schoolattandencereport/'.$pstring.'/';
			$this->app->redirect($url_redirect);
			exit;
		}
		
		
		function frm_absentreportexcelexport()
		{
			
			$record_id=$this->app->getPostVar("absentreportexcelexport");
			$record_data=unserialize($record_id);				
			
			$academicyear1 = $$record_data['academicyear1'];
			$course1 = $record_data['course1'];
			$sem1 = $record_data['sem1'];
			$division1 = $record_data['division1'];
			$from_date = $record_data['date'];
			$lastdate = $record_data['lastdate'];
			
			$to_date = date('Y-m-d',(strtotime ( '-'.$lastdate.'day' , strtotime ( $from_date) ) ));
		
			
			
			$filterquery = '';
			if($course1 != '')
			{			
				$filterquery .= " AND cm_attendance.course = '".$course1."'";
			}
			if($sem1 != '')
			{			
				$filterquery .= " AND cm_attendance.sem = '".$sem1."'";
			}
			if($division1 != '')
			{			
				$filterquery .= " AND cm_attendance.div_id = '".$division1."'";
			}
			
			
			if($division1 != '')
			{			
				$filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$to_date."'  AND '".$from_date."'";
			}
			
			
			$sql="SELECT `cm_attendance`.*,student.division,cm_classes.name as class_name,student.name as studentname,student.student_mobile_no,student.id_no as studentidno, cm_course.course_name,cm_semesters.name as sem_name,cm_divisions.name as divisionname FROM `cm_attendance`
				  LEFT JOIN student ON student.id = cm_attendance.student_id 
				  LEFT JOIN cm_course ON cm_attendance.course = cm_course.id
				  LEFT JOIN cm_semesters ON cm_attendance.sem = cm_semesters.id
				  LEFT JOIN cm_divisions ON cm_attendance.div_id = cm_divisions.id
				  LEFT JOIN cm_classes ON cm_attendance.class_id = cm_classes.id
				  WHERE cm_attendance.id!=0 and cm_attendance.default_status = 'Absent' and cm_attendance.status!=2  ".$filterquery."  group by cm_attendance.student_id";
			$obj_model_absent_report = $this->app->load_model("cm_attendance");
			$absent_report_result = $obj_model_absent_report->execute("SELECT",false,$sql);
			//$this->app->assign("absentreportrecords",$absent_report_result);
			
			foreach($absent_report_result as $k => $absentreport)
			{
			   	
			   $ExeclHeads=array("Sr.","Class","Division","ID No.","Student Name","Mobile");
				
			   $srno = $k+1; 			
			   $report_array[]=array(
					"sr"=>$srno,
					"class_name"=>$absentreport['class_name'],
					"divisionname"=>$absentreport['divisionname'],
					"studentidno"=>$absentreport['studentidno'],
					"studentname"=>$absentreport['studentname'],
					"student_mobile_no"=>$absentreport['student_mobile_no'],
					);
				$array_field=array();
			}
				
				$obj_excel = $this->app->load_module("PHPExcel");
				$data_array=$report_array;
				$fields=array("sr","class_name","divisionname","studentidno","studentname","student_mobile_no");
					
				$excel_postfix="absentreport_".time();
				$filename="report_".$excel_postfix;
				$this->app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
				$path=ABS_PATH.'/'.$this->app->get_user_config("table_backups").$filename.'.xls';
				$url=SERVER_ROOT.'/cm/download.php?f='.$path;
				$this->app->redirect($url);
		}
		
		
		function frm_detailreportexcelexport()
		{
			$record_id =  $this->app->getPostVar('detailreportexcelexport');				
			$record_data=unserialize($record_id);
			
			if($record_id!="")
			{							
				$record_data=unserialize($record_id);
				
				
				$course = $record_data['course_id'];
				$sem = $record_data['sem_id'];
				$division = $record_data['division_id'];
				$from_date = $record_data['from_date'];
				$to_date = $record_data['to_date'];
				$operator = $record_data['operator'];
				$operatorvalue = $record_data['operatorvalue'];
				
				$dateranges = $this->app->cmx->createDateRange($from_date, $to_date, $format = "Y-m-d");
				
				$filterquery = '';
				if($course != '')
				{
					$filterquery .= " AND cm_attendance.course = ".$course;
				}
				if($sem != '')
				{
					$filterquery .= " AND cm_attendance.sem = ".$sem;
				}
				if($division != '')
				{
					$filterquery .= " AND student.division = ".$division;
				}
				if($from_date != '' &&  $to_date != '')
				{
					$from_date = date('Y-m-d',strtotime($from_date));
					$to_date = date('Y-m-d',strtotime($to_date));
					
					$filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$from_date."'  AND '".$to_date."'";
				}
						
				$sql="SELECT `cm_attendance`.*,student.*,cm_classes.name as class_name,cm_divisions.name as division_name FROM `cm_attendance`
					  LEFT JOIN student ON student.id = cm_attendance.student_id 
					  LEFT JOIN cm_classes ON student.cm_class_id = cm_classes.id
					  LEFT JOIN cm_divisions ON student.division = cm_divisions.id
					  WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery." group by cm_attendance.student_id";
				$obj_model_detail_report = $this->app->load_model("cm_academicyears");
				$detail_report_result = $obj_model_detail_report->execute("SELECT",false,$sql);
				
						
				
				if(count($detail_report_result)>0)
		 		{
				 	$app->no_html=true;
					$obj_excel = $this->app->load_module("PHPExcel");
					$ExeclHeads = array("Sr.","ID NO.","Student Name","Class-Div");
					
					if($record_data['summeryreport'] == 1)
					{
						
					}else
					{
						foreach($dateranges as $daterange)
						{
							$ExeclHeads[] = date('j-M',strtotime($daterange));
							$workingdays = $this->app->cmx->workingdays_month($daterange);
							if($workingdays > 0)
							{
								$countworkingdays += 1;
							}
						}
					}
					array_push($ExeclHeads,"Total Present","Total Absent","Working Days","Persent %");
					
					
					$i=0+1;
					$full_price_total=0;
					$nights_total=0;
					$nr_pax=0;				
					$report_array = array();
					
					
					
					foreach($detail_report_result as $key => $row)
					{					
						$countpresent = '';	
						$countabsent = '';
						$countworkingdays = '';
						
						foreach($dateranges as $daterange)
						{
							$workingdays = $this->app->cmx->workingdays_month($daterange);
							if($workingdays > 0)
							{
								$countworkingdays += 1;
							}
							
							$present_or_absent = $this->app->cmx->detail_report_student_present_or_absent($row['student_id'],$row['course'],$row['sem'],$daterange);	
							
							if($present_or_absent == 1)
							{
								$report_array[$key][] = "p";
								$countpresent[] = "yes";							
							}
							else
							{
								$report_array[$key][] = "A";
								$countabsent[] = "no";							
							}
						}
						
						if(!empty($countpresent))
						{
							$countpresent = count($countpresent);						
						}else
						{
							$countpresent = 0;
						}
						
						$per = ($countpresent*100)/$countworkingdays;
						$percetageattadence = number_format((float)$per, 2, '.', '');
						
						
						
						if($operator == "eql" )
						{								
							if($per == $operatorvalue)
							{
								$report_array[$key]['sr'] = $key+1;
								$report_array[$key]['id_no'] = $row["id_no"];
								$report_array[$key]['name'] = $row["name"];
								$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
								$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
								$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
								$report_array[$key]['working_days'] = $countworkingdays;
								$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
							}						
						}
						elseif($operator == "greter" )
						{
							if($per > $operatorvalue)
							{
								$report_array[$key]['sr'] = $key+1;
								$report_array[$key]['id_no'] = $row["id_no"];
								$report_array[$key]['name'] = $row["name"];
								$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
								$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
								$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
								$report_array[$key]['working_days'] = $countworkingdays;
								$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
							}
							
						}elseif($operator == "gretereql" )
						{
							if($per >= $operatorvalue)
							{
								$report_array[$key]['sr'] = $key+1;
								$report_array[$key]['id_no'] = $row["id_no"];
								$report_array[$key]['name'] = $row["name"];
								$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
								$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
								$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
								$report_array[$key]['working_days'] = $countworkingdays;
								$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
							}
							
						}
						elseif($operator == "less" )
						{						
							if($per < $operatorvalue)
							{
								$report_array[$key]['sr'] = $key+1;
								$report_array[$key]['id_no'] = $row["id_no"];
								$report_array[$key]['name'] = $row["name"];
								$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
								$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
								$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
								$report_array[$key]['working_days'] = $countworkingdays;
								$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
							}						
						}elseif($operator == "lesseql" )
						{
							if($per <= $operatorvalue)
							{
								$report_array[$key]['sr'] = $key+1;
								$report_array[$key]['id_no'] = $row["id_no"];
								$report_array[$key]['name'] = $row["name"];
								$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
								$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
								$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
								$report_array[$key]['working_days'] = $countworkingdays;
								$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
							}
						}
						else
						{
							$report_array[$key]['sr'] = $key+1;
							$report_array[$key]['id_no'] = $row["id_no"];
							$report_array[$key]['name'] = $row["name"];
							$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
							$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
							$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
							$report_array[$key]['working_days'] = $countworkingdays;
							$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
						}
					}
					
					$array_field=array();
					$data_array = array();
					
					// this condition for only selecte by operator and value student
					foreach($report_array as $report_arra)
					{
						if($report_arra['id_no'] != '')
						{
							$data_array[] = $report_arra;
						}
					}
					
					//$fields=array("sr","id_no","name","class_div","present_or_absent","status","added_on","last_updated");
					
					$fields = array("sr","id_no","name","class_div");
					if($record_data['summeryreport'] == 1)
					{
						
					}
					else
					{
						foreach($dateranges as $k => $daterange)
						{
							$fields[] = $k;
						}
					}
							
					array_push($fields,"total_present","total_absent","working_days","percent");
					
					$excel_postfix="detailreport_".time();
					$filename="report_".$excel_postfix;
					$this->app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
					$path=ABS_PATH.'/'.$this->app->get_user_config("table_backups").$filename.'.xls';
					$url=SERVER_ROOT.'/cm/download.php?f='.$path;
					$this->app->redirect($url);	
									
				}				
			}
		}



		
		
		public function frm_leavereportexcelexport()
		{
			$record_id=$this->app->getPostVar("leavereportexcelexport");
			$record_data=unserialize($record_id);
			
			$obj_excel = $this->app->load_module("PHPExcel");
			
			if($record_id!="")
			{
				
				$academicyear1 = $record_data['academicyear1'];
				$from_date = $record_data['from_date'];
				$to_date = $record_data['to_date'];
				$leavetype = $record_data['leavetype'];
				$downloadreport = $record_data['downloadreport'];
				
				$filterquery = '';
				if($from_date != '' &&  $to_date != '')
				{
					$from_date = date('Y-m-d',strtotime($from_date));
					$to_date = date('Y-m-d',strtotime($to_date));
					
					$filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$from_date."'  AND '".$to_date."'";
				}
				if($leavetype != '')
				{
					if($leavetype == "ol")
					{
						$leavetype = "Official Leave";
					}else
					{
						$leavetype = "Medical Leave";
					}
					
					$filterquery .= " AND default_status = '".$leavetype."'";
				}
	
			
						
				$sql="SELECT `cm_attendance`.*,student.division,student.name as studentname,student.id_no as studentidno, cm_course.course_name,cm_semesters.name as sem_name,cm_divisions.name as divisionname FROM `cm_attendance`
					  LEFT JOIN student ON student.id = cm_attendance.student_id 
					  LEFT JOIN cm_course ON cm_attendance.course = cm_course.id
					  LEFT JOIN cm_semesters ON cm_attendance.sem = cm_semesters.id
					  LEFT JOIN cm_divisions ON student.division = cm_divisions.id
					  WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery."  group by cm_attendance.student_id";
				$obj_model_leave_report = $this->app->load_model("cm_attendance");
				$leave_report_result = $obj_model_leave_report->execute("SELECT",false,$sql);
				
				
				
					
				foreach($leave_report_result as $k => $leavereport)
				{						
					$sql="SELECT `cm_attendance`.*,student.division,student.name as studentname,student.id_no as studentidno, cm_course.course_name,cm_semesters.name as sem_name,cm_divisions.name as divisionname FROM `cm_attendance`
						  LEFT JOIN student ON student.id = cm_attendance.student_id 
						  LEFT JOIN cm_course ON cm_attendance.course = cm_course.id
						  LEFT JOIN cm_semesters ON cm_attendance.sem = cm_semesters.id
						  LEFT JOIN cm_divisions ON student.division = cm_divisions.id
						  WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery." and cm_attendance.student_id = ".$leavereport['student_id'];
					$obj_model_date_leave_report = $this->app->load_model("cm_attendance");
					$leave_date_report_result = $obj_model_date_leave_report->execute("SELECT",false,$sql);
				
					$countdate = count($leave_date_report_result);
					
					$startdate = date('Y-m-d',$leave_date_report_result[0]['add_date']);
					$enddate = date('Y-m-d',$leave_date_report_result[$countdate-1]['add_date']);
					
					$totaldays = $this->app->cmx->createDateRange($startdate, $enddate, $format = "Y-m-d");
				
					
					
					
				   $ExeclHeads=array("Sr.","ID NO.","Name","Course","Semester","Division","Start Date","End Date","Total Days");
					
					
				   $report_array[]=array(
								"sr"=>$k+1,
								"studentidno"=>$leavereport['studentidno'],
								"studentname"=>$leavereport['studentname'],
								"course_name"=>$leavereport['course_name'],
								"sem_name"=>$leavereport['sem_name'],
								"divisionname"=>$leavereport['divisionname'],
								"startdate"=>$startdate,
								"enddate"=>$enddate,
								"totaldays"=>count($totaldays),
								);
							$array_field=array();
				}
	
					$data_array=$report_array;
					$fields=array("sr","studentidno","studentname","course_name","sem_name","divisionname","startdate","enddate","totaldays");
						
					$excel_postfix="leavereport_".time();
					$filename="report_".$excel_postfix;
					$this->app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
					$path=ABS_PATH.'/'.$this->app->get_user_config("table_backups").$filename.'.xls';
					$url=SERVER_ROOT.'/cm/download.php?f='.$path;
					$this->app->redirect($url);
			}	
		}

		
		function frm_libraryhoursreportexcelexport()
		{
			$record_id=$this->app->getPostVar("libraryhoursreportexcelexport");	
			$record_data=unserialize($record_id);			
			$obj_excel = $this->app->load_module("PHPExcel");
				
				
				$course = implode(",",$record_data['course1']);
				$sem = implode(",",$record_data['sem1']);
				$division = implode(",",$record_data['division1']);
				$from_date = $record_data['from_date'];
				$to_date = $record_data['to_date'];
				
				$dateranges = $this->app->cmx->createDateRange($from_date, $to_date, $format = "Y-m-d");
				
				$filterquery = '';
				if($course != '')
				{
					$filterquery .= " AND cm_attendance.course IN (".$course.")";
				}
				if($sem != '')
				{
					$filterquery .= " AND cm_attendance.sem  IN (".$sem.")";
				}
				if($division != '')
				{
					$filterquery .= " AND student.division  IN (".$division.")";
				}
				if($from_date != '' &&  $to_date != '')
				{
					$from_date = date('Y-m-d',strtotime($from_date));
					$to_date = date('Y-m-d',strtotime($to_date));
					
					$filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$from_date."'  AND '".$to_date."'";
				}
						
				$sql="SELECT `cm_attendance`.*,student.*,cm_classes.name as class_name,cm_divisions.name as division_name FROM `cm_attendance`
					  LEFT JOIN student ON student.id = cm_attendance.student_id 
					  LEFT JOIN cm_classes ON student.cm_class_id = cm_classes.id
					  LEFT JOIN cm_divisions ON student.division = cm_divisions.id
					  WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery." group by cm_attendance.student_id";
				$obj_model_detail_report = $this->app->load_model("cm_academicyears");
				$detail_report_result = $obj_model_detail_report->execute("SELECT",false,$sql);
				
						
				
				if(count($detail_report_result)>0)
		 		{
				 	$app->no_html=true;
					$obj_excel = $this->app->load_module("PHPExcel");
					$ExeclHeads = array("Sr.","ID NO.","Student Name","Class-Div");
					
					foreach($dateranges as $daterange)
					{
						//$ExeclHeads[] = date('j-M',strtotime($daterange));
						$workingdays = $this->app->cmx->workingdays_month($daterange);
						if($workingdays > 0)
						{
							$countworkingdays += 1;
						}
					}
					
					array_push($ExeclHeads,"Total Present","Total Absent","Working Days","Persent %","Library Hours","Assignments");
					
					
					$i=0+1;
					$full_price_total=0;
					$nights_total=0;
					$nr_pax=0;				
					$report_array = array();
					
					
					
					foreach($detail_report_result as $key => $row)
					{					
						$countpresent = '';	
						$countabsent = '';
						$countworkingdays = '';
						
						foreach($dateranges as $daterange)
						{
							$workingdays = $this->app->cmx->workingdays_month($daterange);
							if($workingdays > 0)
							{
								$countworkingdays += 1;
							}
							
							$present_or_absent = $this->app->cmx->detail_report_student_present_or_absent($row['student_id'],$row['course'],$row['sem'],$daterange);	
							
							if($present_or_absent == 1)
							{
								$report_array[$key][] = "p";
								$countpresent[] = "yes";							
							}
							else
							{
								$report_array[$key][] = "A";
								$countabsent[] = "no";							
							}
						}
						
						if(!empty($countpresent))
						{
							$countpresent = count($countpresent);						
						}else
						{
							$countpresent = 0;
						}
						
						$per = ($countpresent*100)/$countworkingdays;
						$percetageattadence = number_format((float)$per, 2, '.', '');
					
		
						$report_array[$key]['sr'] = $key+1;
						$report_array[$key]['id_no'] = $row["id_no"];
						$report_array[$key]['name'] = $row["name"];
						$report_array[$key]['class_div'] = $row["class_name"].'-'.$row["division_name"];
						$report_array[$key]['total_present'] = ($countpresent != '') ? $countpresent :'00';
						$report_array[$key]['total_absent'] = (($countworkingdays - $countpresent) != '')?$countworkingdays - $countpresent:'00';
						$report_array[$key]['working_days'] = $countworkingdays;
						$report_array[$key]['percent'] = ($percetageattadence != '') ? $percetageattadence : '00';
						
						$libraryassign = $this->app->cmx->libraryassignmentforstudentbypercentage($percetageattadence);
						
						$report_array[$key]['libraryhours'] = ($libraryassign[0]['library_hours'] != '') ? $libraryassign[0]['library_hours'] : '-';
						$report_array[$key]['assignments'] = ($libraryassign[0]['assignment'] != '') ? $libraryassign[0]['assignment'] : '-';
					}
					
					$array_field=array();
					$data_array = array();
					
					foreach($report_array as $report_arra)
					{
						if($report_arra['libraryhours'] != '-')
						{
							$data_array[] = $report_arra;
						}
					}
					
					
					
					$fields = array("sr","id_no","name","class_div");								
							
					array_push($fields,"total_present","total_absent","working_days","percent","libraryhours","assignments");
					
					$excel_postfix="leavereport_".time();
					$filename="report_".$excel_postfix;
					$this->app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
					$path=ABS_PATH.'/'.$this->app->get_user_config("table_backups").$filename.'.xls';
					$url=SERVER_ROOT.'/cm/download.php?f='.$path;
					$this->app->redirect($url);
				}				
		}


		function frm_holidays()
		{
			if($this->app->getPostVar('populatedate') == 'populatedate')
			{	
				$fromdate = $this->app->getPostVar('from_date');
				$todate = $this->app->getPostVar('to_date');
				
				$dates = $this->app->cmx->createDateRange($fromdate, $todate, $format = "d-M-Y");
				$this->app->assign('alldaysfroholidays',$dates);
			}
			
			if($this->app->getPostVar('holidayform-save') == 'holidayform-save')
			{
				$holiday_dates = $this->app->getPostVar('holiday_dates');
				$holidayname = $this->app->getPostVar('holidayname');
				
				foreach($holiday_dates as $k => $holiday_date)
				{	
					$comparedate = "STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(date), '%Y-%m-%d'),'%Y-%m-%d') = '".$holiday_date."'";
					$save_holiday = $this->app->load_model('cm_holidays');
					$dateexis = $save_holiday->execute('SELECT',false,"",$comparedate);
					if(count($dateexis) > 0 )
					{
						$data = array();
						$data["date"] = strtotime($holiday_date);							
						$data["marked_as"] = $holidayname[$k];
						$data["updated_on"] = time();							
						$data["updated_by"] = $_SESSION['StaffID'];														
						$obj_model_atten = $this->app->load_model("cm_holidays",$dateexis[0]['id']);		
						$obj_model_atten->map_fields($data);
						$obj_model_atten->execute("UPDATE");
					}else
					{
						$data = array();
						$data["date"] = strtotime($holiday_date);							
						$data["marked_as"] = $holidayname[$k];
						$data["updated_on"] = time();							
						$data["updated_by"] = $_SESSION['StaffID'];														
						$obj_model_atten = $this->app->load_model("cm_holidays");		
						$obj_model_atten->map_fields($data);
						$obj_model_atten->execute("INSERT");
					}
				}
			}
		}
	}	
?>