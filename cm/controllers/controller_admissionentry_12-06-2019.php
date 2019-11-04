<?
	class _admissionentry extends controller{
		
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
			$this->app->setAddJS("js/dizzijs/studententry.js");
			$this->app->setAddJS("js/dizzijs/monthly_average_report.js");
			
			
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
		
		
		  if($action=="" || $action=="dashboard")
		  {
			  
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="id DESC";
	            $academicyears_dd=$this->app->cmx->create_dd_new($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				$record_id=$this->app->getGetVar("record_id");
					$academic_year = date('Y');
					$month = date('m');
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
					$inscript.="function loadorder_grahps(res)
							{
								/*var barChart = c3.generate({
								        bindto: '#bar-chart1',
										axisY: { 
											title: 'xyz' 
										},
										axisX:{
								       title: 'axisX Title',
								       gridThickness: 1,
								       tickLength: 50
								      },
								        data: { x: 'x',
										    columns: [
								           ['x', 'Enquiry Form', 'Registration Form', 'Admission Selected'],
								           res.adm_sum
								           
								        ],
								            type: 'bar'
								        },
										axis: {
								    x: {
								       type: 'category',
								    },
									y: {
								   label: { // ADD
										  text: 'No. Of Forms',
										  position: 'outer-middle'
										}
								  }
								  },
								        bar: {
								            width: {
								                ratio: 0.5
								            }
								        }
								    });*/
									var chart2 = c3.generate({
											bindto: '#bar-chart1',
											data: {
												rows: [
													['BCOM', 'BBA', 'BCA'],
													res.clsenq_sum1,
													res.clsreg_sum1,
													res.clscnf_sum1
												],
												type: 'bar'
											},
											axis: {
												x: {
													type: 'category',
													categories: ['Enquiry Form', 'Registration Form', 'Admission Selected']
												},y: {
											   label: { // ADD
													  text: 'No. Of Forms',
													  position: 'outer-middle'
													}
											  }
											},
											grid: {
												y: {
													lines: [{value:0}]
												}
											}
										});
									var chart = c3.generate({
										 	bindto: '#bar-chart2',
											data: {
												columns: [
													res.clsenq_sum,
													res.clsreg_sum,
													res.clscnf_sum
												],
												type: 'bar'
											},
											axis: {
												x: {
													type: 'category',
													categories: ['BCOM', 'BBA', 'BCA']
												},y: {
											   label: { // ADD
													  text: 'No. Of Forms',
													  position: 'outer-middle'
													}
											  }
											},
											bar: {
												width: {
													ratio: 0.5 // this makes bar width 50% of length between ticks
												}
											}
										});
								}
								function change_sel_year()
								{
									var year_id=$('#academicyear1').val();
							   // var year_id= = $('#select2-academicyear1-container').val();
							 	
							    $.ajax({
							            //beforeSend: function(){ sendRequest('canvas'); },
							            cache: false,
							            type: 'POST',
							            dataType: 'json',
							            url:'clientside/socket/call.php',
							            data: 'connector=admission_summary&year='+year_id,
							            success: function(data){
							                loadorder_grahps(data);
							            },
							        });
								}
							jQuery(document).ready(function() {
							    
							    'use strict';
								var year_id=$('#academicyear1').val();
							   // var year_id= = $('#select2-academicyear1-container').val();
							 	
							    $.ajax({
							            //beforeSend: function(){ sendRequest('canvas'); },
							            cache: false,
							            type: 'POST',
							            dataType: 'json',
							            url:'clientside/socket/call.php',
							            data: 'connector=admission_summary&year='+year_id,
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
							
							    /*jQuery(window).resize(function() {
								delay(function() {
								    m1.redraw();
								    m2.redraw();
								    m3.redraw();
								    m4.redraw();
								    m5.redraw();
								    m6.redraw();
								}, 200);
							    }).trigger('resize');*/
							  
							});
							$(document).ready(function() {
								/*cf_datapager(1,'monthlyaveragereports');
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
								//loadorder_grahps(data);
								
								});	*/
								//loadorder_grahps();								
							});";				
		
			
			} elseif($action=="initiate")
		  {
			  $this->app->setAddJS("js/dizzijs/admissionentry.js");
			  	$class_tbl="cm_classes";
				$class_condition="status!=2";
				$class_text="Select Class";
				$field_one="id";
				$field_two="abbreviation";
				$classorder_condition="seq ASC";
	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);	
				$this->app->assign("class_dd",$class_dd);
				
				$course_tbls="cm_classes";
				$course_conditions="status!=2";
				$course_texts="Select Class";
				$field_ones="abbreviation";
				$field_twos="abbreviation";
				$courseorder_conditions="seq ASC";
	            $course_dds=$this->app->cmx->create_dd($course_tbls,$course_conditions,$field_ones,$field_twos,$course_texts,$courseorder_conditions);	
				$this->app->assign("branch_dds",$course_dds);
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="id DESC";
	            $academicyears_dd=$this->app->cmx->create_dd_new($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				
				$academicyears_tbls="cm_academicyears";
				$academicyears_conditions="status!=2";
				$academicyears_texts="Select Academic Years";
				$field_ones="name";
				$field_twos="name";
				$academicyearsorder_conditions="id DESc";
	            $academicyears_dds=$this->app->cmx->create_dd_new($academicyears_tbls,$academicyears_conditions,$field_ones,$field_twos,$academicyears_texts,$academicyearsorder_conditions);	
				$this->app->assign("academic_year_dds",$academicyears_dds);
				//$data = array_keys($academicyears_dds)[0];
				$keys_y_d   =   array_keys($academicyears_dds);
				$this->app->assign("academic_year_default_int",$keys_y_d[0]); 
				
				
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'initiate');
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
					cf_datapager(1,'initiate');
					});
					$( '#serach_string' ).change(function() {
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
						cf_datapager(1,'initiate');
					  
					});
					$('.indatepicker1').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
     			 autoUpdateInput: false,
     			 locale: {
           			 format: 'DD-MM-YYYY',
					 separator:'-'
       				 }},function(start, end, label) {
        var years = moment().diff(start, 'years');
        alert(start.format('DD-MM-YYYY'));
		$('.indatepicker1').val(start.format('DD-MM-YYYY'));
    });
				});";
			  }
		  elseif($action=="enquiries")
		  {
			// $this->app->setAddJS("http://maps.googleapis.com/maps/api/js?key=AIzaSyBDyogimT22Vo14OJJ87IgUFvoHwbKUfME&libraries=places");
			 	//$this->app->setAddJS("http://maps.googleapis.com/maps/api/js?key=AIzaSyAoIR8PMfQMIpQ4p02O9LN5LKPo4bGsmeo&libraries=places");
				//AIzaSyAigQS9SCX1KFa2SG0DcFa8vm7rgG23YSM
				//AIzaSyARpx_zZJim5IANGusnzXrB2JB4_46D_pM
				$this->app->setAddJS("http://maps.googleapis.com/maps/api/js?key=AIzaSyARpx_zZJim5IANGusnzXrB2JB4_46D_pM&libraries=places");
			  $this->app->setAddJS("js/dizzijs/enquiries.js");
			  $course_tbl="cm_course";
				$course_condition="status!=2";
				$course_text="Select Course";
				$field_one="id";
				$field_two="course_name";
				$courseorder_condition="course_name ASC";
	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	
				$this->app->assign("branch_dd",$course_dd);
				
				$class_tbl="cm_classes";
				$class_condition="status!=2";
				$class_text="Select Class";
				$field_one="id";
				$field_two="abbreviation";
				$classorder_condition="abbreviation ASC";
	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);	
				$this->app->assign("class_dd",$class_dd);
				
				$sem_tbl="cm_semesters";
				$sem_condition="status!=2";
				$sem_text="Select Semester";
				$field_one="id";
				$field_two="name";
				$semorder_condition="name ASC";
	            $sem_dd=$this->app->cmx->create_dd($sem_tbl,$sem_condition,$field_one,$field_two,$sem_text,$semorder_condition);	
				$this->app->assign("sem_dd",$sem_dd);
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="id DESC";
	            $academicyears_dd=$this->app->cmx->create_dd_new($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				$keys_y_d   =   array_keys($academicyears_dd);
				$this->app->assign("academic_year_default_int",$keys_y_d[0]); 
				$last_id=$this->app->cmx->get_last_enq_id();	
				$this->app->assign("last_id1",$last_id);
				
				$college_tbl="cm_last_school";

				$college_condition="status!=2";

				$college_text="Select School/collage";

				$field_one="id";

				$field_two="name";

				$collegeorder_condition="name ASC";

	            $college_dd=$this->app->cmx->create_dd($college_tbl,$college_condition,$field_one,$field_two,$college_text,$collegeorder_condition);	

				$this->app->assign("sch_dd",$college_dd);
				
				
				
			
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'enquiries');
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
					cf_datapager(1,'enquiries');
					});
					$( '#serach_string' ).change(function() {
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
						cf_datapager(1,'enquiries');
					  
					});
					$('.indatepicker2').daterangepicker({
						  autoUpdateInput: false,
						  singleDatePicker: true,
						 
						showDropdowns: true,
						  locale: {
							  cancelLabel: 'Clear'
						  }
					  });
				});";
			 
		  }
		  elseif($action=="registration")
		  {
			  
			//$this->app->setAddJS("http://maps.googleapis.com/maps/api/js?key=AIzaSyBDyogimT22Vo14OJJ87IgUFvoHwbKUfME&libraries=places");	
			  $this->app->setAddJS("http://maps.googleapis.com/maps/api/js?key=AIzaSyARpx_zZJim5IANGusnzXrB2JB4_46D_pM&libraries=places");
			 $this->app->setAddJS("js/dizzijs/registration.js");
			  $course_tbl="cm_course";
				$course_condition="status!=2";
				$course_text="Select Course";
				$field_one="id";
				$field_two="course_name";
				$courseorder_condition="course_name ASC";
	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	
				$this->app->assign("branch_dd",$course_dd);
				
				$class_tbl="cm_classes";
				$class_condition="status!=2";
				$class_text="Select Class";
				$field_one="id";
				$field_two="abbreviation";
				$classorder_condition="abbreviation ASC";
	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);	
				$this->app->assign("class_dd",$class_dd);
				
				$sem_tbl="cm_semesters";
				$sem_condition="status!=2";
				$sem_text="Select Semester";
				$field_one="id";
				$field_two="name";
				$semorder_condition="name ASC";
	            $sem_dd=$this->app->cmx->create_dd($sem_tbl,$sem_condition,$field_one,$field_two,$sem_text,$semorder_condition);	
				$this->app->assign("sem_dd",$sem_dd);
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="id DESC";
	            $academicyears_dd=$this->app->cmx->create_dd_new($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				$keys_y_d   =   array_keys($academicyears_dd);
				$this->app->assign("academic_year_default_int",$keys_y_d[0]);
				
				$last_id=$this->app->cmx->get_last_enq_id();	
				$this->app->assign("last_id1",$last_id);
				
				$occupation_tbl="cm_occupationoffather";
				$occupation_condition="status!=2";
				$occupation_text="Select Occupation";
				$field_one="id";
				$field_two="name";
				$occupationorder_condition="name ASC";
	            $occupation_dd=$this->app->cmx->create_dd($occupation_tbl,$occupation_condition,$field_one,$field_two,$occupation_text,$occupationorder_condition);	
				$this->app->assign("occupation_dd",$occupation_dd);
				
				$category_tbl="cm_categories";
				$category_condition="status!=2";
				$category_text="Select Category";
				$field_one="id";
				$field_two="name";
				$categoryorder_condition="name ASC";
	            $category_dd=$this->app->cmx->create_dd($category_tbl,$category_condition,$field_one,$field_two,$category_text,$categoryorder_condition);	
				$this->app->assign("category_dd",$category_dd);
				//ini_set('display_errors', 1);
				$enq_tbl="cm_enquiries";
				$enq_condition="status!='Deleted'";
				$enq_text="Select Number";
				$field_one="id";
				$field_two="enq_no";
				$enqorder_condition="id ASC";
	            $enq_dd=$this->app->cmx->create_dd($enq_tbl,$enq_condition,$field_one,$field_two,$enq_text,$enqorder_condition);	
				$this->app->assign("enq_dd",$enq_dd);
				
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
				
				$last_id=$this->app->cmx->get_last_id("cm_register");	
				if($last_id==''){
					$last_id = 1;
				}
				
				$this->app->assign("last_id",$last_id);
				if($this->app->getGetVar("record_id")=="")				
				{
					
					 $inscript.="
				$(document).ready(function() {
					
					cf_datapager(1,'registration');
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
					cf_datapager(1,'registration');
					});
					$( '#serach_string' ).change(function() {
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
						cf_datapager(1,'registration');
					  
					});
					$('.indatepicker2').daterangepicker({
						  autoUpdateInput: false,
						  singleDatePicker: true,
						 
						showDropdowns: true,
						  locale: {
							  cancelLabel: 'Clear'
						  }
					  });
				});";
				}
				elseif($this->app->getGetVar("item_id"))
				{
					
						
					$item_id=$this->app->cmx->decrypt($this->app->getGetVar("item_id"),ency_key);	
					$obj_students = $this->app->load_model("cm_register",$item_id);
					//$obj_students-
					$rsstudents = $obj_students->execute("SELECT");
					if(count($rsstudents)>0)
					{
						$this->app->assign_form_data("frm_reg", $rsstudents[0]);
						$this->app->assign("rsstudents", $rsstudents[0]);
					}
					else
					{
						$this->app->redirect(CMX_ROOT."/admissionentry/registration/");
					}
				}
				elseif($this->app->getGetVar("record_id")!="")				
				{
					
					$record_id=$this->app->cmx->decrypt($this->app->getGetVar("record_id"),ency_key);	
					//echo $record_id;
					//exit;
					$inscript.="
				$(document).ready(function() {
					if($('#record_id').val()!='')
					{
						$('#enq_no').val('".$record_id."').trigger('change');
					}
				
				});";
				}
			 /**/
		  }elseif($action=="meritlist")
		  {
			  $this->app->setAddJS("js/dizzijs/meritlist.js");
			  	$class_tbl="cm_classes";
				$class_condition="status!=2";
				$class_text="Select Class";
				$field_one="id";
				$field_two="abbreviation";
				$classorder_condition="abbreviation ASC";
	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);	
				$this->app->assign("class_dd",$class_dd);
				
				$course_tbls="cm_classes";
				$course_conditions="status!=2";
				$course_texts="Select Class";
				$field_ones="id";
				$field_twos="abbreviation";
				$courseorder_conditions="abbreviation ASC";
	            $course_dds=$this->app->cmx->create_dd($course_tbls,$course_conditions,$field_ones,$field_twos,$course_texts,$courseorder_conditions);	
				$this->app->assign("branch_dds",$course_dds);
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="id DESC";
	            $academicyears_dd=$this->app->cmx->create_dd_new($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				$keys_y_d   =   array_keys($academicyears_dd);
				$this->app->assign("academic_year_default_int",$keys_y_d[0]);
				
				$academicyears_tbls="cm_academicyears";
				$academicyears_conditions="status!=2";
				$academicyears_texts="Select Academic Years";
				$field_ones="id";
				$field_twos="name";
				$academicyearsorder_conditions="id DESC";
	            $academicyears_dds=$this->app->cmx->create_dd_new($academicyears_tbls,$academicyears_conditions,$field_ones,$field_twos,$academicyears_texts,$academicyearsorder_conditions);	
				$this->app->assign("academic_year_dds",$academicyears_dds);
				
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'meritlist');
					var ays=$('#acd_year_sel').val();
					var cs=$('#class_sel').val();
					var tm=$('#total_merit').val();
					//$('#conditional_val').val('{\"acd_year_sel\":ays,\"class_sel\":cs,\"total_merit\":tm}');
					
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
					cf_datapager(1,'meritlist');
					});
				});";
			  }		 	elseif($action=="confirm")	
			  {							
			  $this->app->setAddJS("js/dizzijs/confirmation.js");	
			 
			  if($this->app->getGetVar("record_id")=="")				
				{
					
			  $inscript.="				$(document).ready(function() {			
			  cf_datapager(1,'confirmation');				
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
			  cf_datapager(1,'confirmation'); 		
			  });
			  $('.indatepicker2').daterangepicker({
						  autoUpdateInput: false,
						  singleDatePicker: true,
						 
						showDropdowns: true,
						  locale: {
							  cancelLabel: 'Clear'
						  }
					  }); 	 		
			  });";
			  	
			  $class_tbl="cm_classes";
				$class_condition="status!=2";
				$class_text="Select Class";
				$field_one="id";
				$field_two="abbreviation";
				$classorder_condition="abbreviation ASC";
	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);	
				$this->app->assign("class_dd",$class_dd);
				
				$academicyears_tbl="cm_academicyears";
				$academicyears_condition="status!=2";
				$academicyears_text="Select Academic Years";
				$field_one="id";
				$field_two="name";
				$academicyearsorder_condition="id DESC";
	            $academicyears_dd=$this->app->cmx->create_dd_new($academicyears_tbl,$academicyears_condition,$field_one,$field_two,$academicyears_text,$academicyearsorder_condition);	
				$this->app->assign("academic_year_dd",$academicyears_dd);
				$keys_y_d   =   array_keys($academicyears_dd);
				$this->app->assign("academic_year_default_int",$keys_y_d[0]);	
			 
				}
				elseif($this->app->getGetVar("item_id"))
				{
					if($_SESSION['Role']=='1')
					{
						
					$item_id=$this->app->cmx->decrypt($this->app->getGetVar("item_id"),ency_key);	
					$obj_students = $this->app->load_model("cm_confirmation",$item_id);
					$rsstudents = $obj_students->execute("SELECT");
					if(count($rsstudents)>0)
					{
						$this->app->assign_form_data("frm_conf", $rsstudents[0]);
						$this->app->assign("rsstudents", $rsstudents[0]);
						$get_m_year =  $this->app->cmx->get_acd_year_name($rsstudents[0]['acd_year']);
						$get_class= $this->app->cmx->class_name($rsstudents[0]['class_no']);
						$class_tbl="cm_sections";			
					  $class_condition="status!=2 and class_id='".$rsstudents[0]['class_no']."'";		
					  $class_text="Select Class Section";		
					  $field_one="id";			
					  $field_two="section_name";		
					  $classorder_condition="section_name ASC";	  
					  $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);		
					  $this->app->assign("class_section_dd",$class_dd);
					   $this->app->assign("student_name_ml",$rsstudents[0]['stud_name']);
					    $this->app->assign("student_ml_status",$rsstudents[0]['status']);
					  $this->app->assign("student_year_ml",$get_m_year);
					  $this->app->assign("student_class_ml",$get_class);
					}
					else
					{
						$this->app->redirect(CMX_ROOT."/admissionentry/confirm/");
					}
					}
					else
					{
						$app->utility->set_message("You are not allowed to edit record","ERROR");	
						$this->app->redirect(CMX_ROOT."/admissionentry/confirm/");
					}
				}
				elseif($this->app->getGetVar("record_id")!="")				
				{
					
					$record_id=$this->app->cmx->decrypt($this->app->getGetVar("record_id"),ency_key);
				$obj_ml = $this->app->load_model("cm_register");
				$rs_ml=$obj_ml->execute("SELECT", false, "","id=".$record_id,"");
				$get_m_year =  $this->app->cmx->get_acd_year_name($rs_ml[0]['cm_academic_year']);
				$get_class= $this->app->cmx->class_name($rs_ml[0]['enq_class']);
				$class_tbl="cm_sections";			
			  $class_condition="status!=2 and class_id='".$rs_ml[0]['enq_class']."'";		
			  $class_text="Select Class Section";		
			  $field_one="id";			
			  $field_two="section_name";		
			  $classorder_condition="section_name ASC";	  
			  $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$classorder_condition);					
			  $this->app->assign("class_section_dd",$class_dd);
			  
			  $this->app->assign("student_name_ml",$rs_ml[0]['last_name']." ".$rs_ml[0]['first_name']." ".$rs_ml[0]['middle_name']);
			   $this->app->assign("student_ml_status",$rs_ml[0]['status']);
			  $this->app->assign("student_year_ml",$get_m_year);
			  $this->app->assign("student_class_ml",$get_class);
			  $obj_mlnew  = $this->app->load_model("cm_meritlist");
			  $rs_obj_mlnew = $obj_mlnew->execute("SELECT",false,"","reg_no='".$record_id."'","");
			 if($rs_obj_mlnew[0]['board']!='1')	
			  {
				  $sel_cat_std='ob';
			  }
			  else
			  {
				  $sel_cat_std=$rs_ml[0]['category'];
			  }
					 $inscript.="
						$(document).ready(function() {
							if($('#record_id').val()!='')
							{
								$('#quota').val('".$sel_cat_std."').trigger('change');
								//$('#status').val('".$rs_ml[0]['status']."').trigger('change');
							}
						});";
				}
			  }
			  elseif($action=="inquiryreport")
			  {
				  							
			  $this->app->setAddJS("js/dizzijs/inquiryreport.js");	
			 
			  if($this->app->getGetVar("record_id")=="")				
				{
					
			  $inscript.="				$(document).ready(function() {			
			  cf_datapager(1,'inquiryreport');				
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
			  cf_datapager(1,'inquiryreport'); 	  	
			  });	
			  $('input[name=\"filter_date\"]').daterangepicker({
      autoUpdateInput: false,
	  singleDatePicker: true,
	 
    showDropdowns: true,
      locale: {
          cancelLabel: 'Clear'
      }
  });

 
  $('input[name=\"filter_date2\"]').daterangepicker({
      autoUpdateInput: false,
	  singleDatePicker: true,
	 
    showDropdowns: true,
      locale: {
          cancelLabel: 'Clear'
      }
  });
			  });";	
			  $course_tbls="cm_classes";	
			  $course_conditions="status!=2";	
			  $course_texts="Select Class";		
			  $field_ones="id";			
			  $field_twos="abbreviation";	
			  $courseorder_conditions="abbreviation ASC";	 
			  $course_dds=$this->app->cmx->create_dd($course_tbls,$course_conditions,$field_ones,$field_twos,$course_texts,$courseorder_conditions);
			  $this->app->assign("branch_dds",$course_dds);		
			  //
		   $academicyears_tbls="cm_academicyears";			
			  $academicyears_conditions="status!=2";			
			  $academicyears_texts="Select Academic Years";		
			  $field_ones="id";			
			  $field_twos="name";		
			  $academicyearsorder_conditions="id DESC";	   
			  $academicyears_dds=$this->app->cmx->create_dd_new($academicyears_tbls,$academicyears_conditions,$field_ones,$field_twos,$academicyears_texts,$academicyearsorder_conditions);			
			  $this->app->assign("academic_year_dds",$academicyears_dds);	
			  //	
				}
				elseif($this->app->getGetVar("item_id"))
				{}
				elseif($this->app->getGetVar("record_id")!="")				
				{}
			  
			  }
			  elseif($action=="admissionreport")
			  {
				  //$this->app->setAddJS("js/dizzijs/admissionreport.js");	
			 
				  if($this->app->getGetVar("record_id")=="")				
					{
						
				  $inscript.="				$(document).ready(function() {			
				  cf_datapager(1,'admissionreport');				
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
				  cf_datapager(1,'admissionreport'); 	  	
				  });	
				  });";	
				  //
			   $academicyears_tbls="cm_academicyears";			
				  $academicyears_conditions="status!=2";			
				  $academicyears_texts="Select Academic Years";		
				  $field_ones="id";			
				  $field_twos="name";		
				  $academicyearsorder_conditions="id DESC";	   
				  $academicyears_dds=$this->app->cmx->create_dd_new($academicyears_tbls,$academicyears_conditions,$field_ones,$field_twos,$academicyears_texts,$academicyearsorder_conditions);			
				  $this->app->assign("academic_year_dds",$academicyears_dds);
				  
				  $keys_y_d   =   array_keys($academicyears_dds);
				$this->app->assign("academic_year_default_int",$keys_y_d[0]);
				
				  //	
					}
			  }
		  else { 
		  }
			$this->app->setInlineScripts($inscript);			
			$this->app->assign("module_title","admissionentry");
			$this->app->assign("menu_base",CMX_ROOT.'/admissionentry');
		}

	}	
?>