<?
	class _configuration extends controller{
		
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

			
			
			
		

			$this->app->setAddJS("js/lib/jquery/jquery.min.js");
			$this->app->setAddJS("js/lib/tether/tether.min.js");
			$this->app->setAddJS("js/lib/bootstrap/bootstrap.min.js");
			$this->app->setAddJS("js/plugins.js");
			$this->app->setAddJS("js/lib/match-height/jquery.matchHeight.min.js");
			$this->app->setAddJS("js/lib/select2/select2.full.min.js");
			$this->app->setAddJS("js/lib/moment/moment-with-locales.min.js");
			$this->app->setAddJS("js/lib/eonasdan-bootstrap-datetimepick/bootstrap-datetimepicker.min.js");
			
			$this->app->setAddJS("js/lib/daterangepicker/daterangepicker.js");
			$this->app->setAddJS("js/validation/jquery.validate.min.js");
			$this->app->setAddJS("js/validation/additional-methods.min.js");
			$this->app->setAddJS("js/app.js");
			$this->app->setAddJS("js/dizzijs/pagination.js");
			$this->app->setAddJS("js/dizzijs/configuration.js");
			$this->app->setAddJS("js/jquery.alerts.js");
			
			$action=$this->app->getGetVar("action");
			if(($action=='users' || $action=='roles') && $_SESSION['Role']!=1)
			{
				$this->app->redirect(CMX_ROOT."/");
			}
			
			$inscript=" $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

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
				 locale: {
           			 format: 'DD-MM-YYYY',
					 separator:' - '
       				 }
			});
			
        });";
		
		
		  if($action=="" || $action=="academicyears")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'academicyears');
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
					cf_datapager(1,'academicyears');
					});
				});";
		  }
		  elseif($action=="roles")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'roles');
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
					cf_datapager(1,'roles');
					});
				});";
		  }
		  elseif($action=="users")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'users');
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
					cf_datapager(1,'users');
					});
				});";
				$course_tbl="cm_roles";
			$course_condition="status!=2";
			$course_text="Select Role";
			$field_one="id";
			$field_two="name";
			$courseorder_condition="name ASC";
            $roles_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	
			
			
			$this->app->assign("roles_dd",$roles_dd); 
		  }
		  elseif($action=="blacklists")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'blacklists');
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
					cf_datapager(1,'blacklists');
					});
				});";
		  }
		  
		  elseif($action=="colleges")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'colleges');
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
					cf_datapager(1,'colleges');
					});
				});";
		  }
		  
		  elseif($action=="classes")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'classes');
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
					cf_datapager(1,'classes');
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
			
			
			
			$asses_tbl="cm_asses_structure";
			$asses_condition="status!=2";
			$asses_text="Select Assessment Structure";
			$field_one="id";
			$field_two="asses_name";
			$assesorder_condition="asses_name ASC";
            $asses_dd=$this->app->cmx->create_dd($asses_tbl,$asses_condition,$field_one,$field_two,$asses_text,$assesorder_condition);	
			
			
			$this->app->assign("asses_dd",$asses_dd);
			$sem_tbl="cm_semesters";
			$sem_condition="status!=2";
			$sem_text="Select Semesters";
			$sem_field_one="id";
			$sem_field_two="name";
			$sem_condition="";
            $sem_dd=$this->app->cmx->create_dd($sem_tbl,$sem_condition,$sem_field_one,$sem_field_two,$sem_text,$sem_condition);	
			
			
			$this->app->assign("sem_dd",$sem_dd);
			
			
			
			
				
				
				
		  }
		   elseif($action=="designations")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'designations');
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
					cf_datapager(1,'designations');
					});
				});";
		  }		  elseif($action=="lastschool")		  {		
		  $inscript.="				$(document).ready(function() {					cf_datapager(1,'lastschool');					$('#filter_search').click(function(){					var str=$('#serach_string').val();					var sb=$('#search_by').val();					if(str=='')					{						$('#serach_string').parent().addClass('.has-error');					}					else					{						$('#serach_string').parent().removeClass('.has-error');					}					cf_datapager(1,'lastschool');					});				});";		  }
		   elseif($action=="semesters")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'semesters');
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
					cf_datapager(1,'semesters');
					});
				});";
		  }
		   elseif($action=="categories")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'categories');
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
					cf_datapager(1,'categories');
					});
				});";
		  }
		  
		   elseif($action=="salutations")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'salutations');
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
					cf_datapager(1,'salutations');
					});
				});";
		  }
		  
		   elseif($action=="calendars")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'calendars');
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
					cf_datapager(1,'calendars');
					});
				});";
		  }
		  
		  elseif($action=="occupationoffather")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'occupationoffather');
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
					cf_datapager(1,'occupationoffather');
					});
				});";
		  }
		  
		  elseif($action=="qualifications")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'qualifications');
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
					cf_datapager(1,'qualifications');
					});
				});";
		  }
		  
		   elseif($action=="courses")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'courses');
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
					cf_datapager(1,'courses');
					});
				});";
		  }
		  
		   elseif($action=="religions")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'religions');
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
					cf_datapager(1,'religions');
					});
				});";
		  }
		  
		  elseif($action=="smstemplates")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'smstemplates');
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
					cf_datapager(1,'smstemplates');
					});
				});";
		  }
		   elseif($action=="documents")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'documents');
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
					cf_datapager(1,'documents');
					});
				});";
		  }
		  
		   elseif($action=="smssenders")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'smssenders');
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
					cf_datapager(1,'smssenders');
					});
				});";
		  }
		  
		   elseif($action=="assessments")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'assessments');
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
					cf_datapager(1,'assessments');
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
		  }
		  elseif($action=="periods")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'periods');
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
					cf_datapager(1,'periods');
					});
					
					$('.datetimepicker-2').datetimepicker({
						widgetPositioning: {
							horizontal: 'right'
						},
						format: 'LT',
						debug: false
					});
					
				});";
				
		  }
		  
		  
		   elseif($action=="subjects")
		  {
			  $inscript.="
				$(document).ready(function() {
					cf_datapager(1,'subjects');
					$('#select2-course-container').prop('tabindex', '-1');
					
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
					cf_datapager(1,'subjects');
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
			
			
			
			$asses_tbl="cm_asses_structure";
			$asses_condition="status!=2";
			$asses_text="Select Assessment Structure";
			$field_one="id";
			$field_two="asses_name";
			$assesorder_condition="asses_name ASC";
            $asses_dd=$this->app->cmx->create_dd($asses_tbl,$asses_condition,$field_one,$field_two,$asses_text,$assesorder_condition);	
			
			
			$this->app->assign("asses_dd",$asses_dd);
			
			
			$semesters_tbl="cm_semesters";
			$semesters_condition="status!=2";
			$semesters_text="Select Semesters";
			$field_one="id";
			$field_two="name";
			$semestersorder_condition="name ASC";
            $semesters_dd=$this->app->cmx->create_dd($semesters_tbl,$semesters_condition,$field_one,$field_two,$semesters_text,$semestersorder_condition);	
			
			
			$this->app->assign("semesters_dd",$semesters_dd);
				
				
				
		  }
		  else
		  {
			  
		  }
		
			
				
				
				
		$this->app->setInlineScripts($inscript);
			
		$this->app->assign("module_title","Configuration");
		$this->app->assign("menu_base",CMX_ROOT.'/configuration');
		
		
		
		
		
		
		}
		
		
		
	
		
	}	
?>