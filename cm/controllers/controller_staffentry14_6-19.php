<?

	class _staffentry extends controller{

		

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


			

			

			

		



			$this->app->setAddJS("js/lib/jquery/jquery.min.js");

			$this->app->setAddJS("js/lib/tether/tether.min.js");

			$this->app->setAddJS("js/lib/bootstrap/bootstrap.min.js");

			$this->app->setAddJS("js/plugins.js");

			$this->app->setAddJS("js/lib/match-height/jquery.matchHeight.min.js");

			$this->app->setAddJS("js/lib/select2/select2.full.min.js");

			$this->app->setAddJS("js/lib/moment/moment-with-locales.min.js");

			$this->app->setAddJS("js/lib/eonasdan-bootstrap-datetimepick/bootstrap-datetimepicker.min.js");
			$this->app->setAddJS("js/bootstrap-fileupload.js");
			

			$this->app->setAddJS("js/lib/daterangepicker/daterangepicker.js");

			$this->app->setAddJS("js/validation/jquery.validate.min.js");

			$this->app->setAddJS("js/validation/additional-methods.min.js");

			$this->app->setAddJS("js/app.js");

			$this->app->setAddJS("js/jquery.alerts.js");

			$this->app->setAddJS("js/dizzijs/ajax.form.js");			

			$this->app->setAddJS("js/dizzijs/pagination.js");

			$this->app->setAddJS("js/dizzijs/staffentry.js");

			

			

			

			

			$action=$this->app->getGetVar("action");

			

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

			
			$('.indatepicker2').daterangepicker({
				singleDatePicker: true,

				showDropdowns: true,
				autoUpdateInput: false,
				locale: {
					format: 'DD-MM-YYYY',
					separator:' - ',
					cancelLabel: 'Clear'
				}
			});
		  
			$('.indatepicker2').on('apply.daterangepicker', function(ev, picker) {
				$(this).val(picker.startDate.format('DD-MM-YYYY'));
			});
        });";

		

		

		  if($action=="" || $action=="staff")

		  {

			 $bank_array = array("Select Bank","ABHYUDAYA CO-OP BANK LTD","ABU DHABI COMMERCIAL BANK","AKOLA DISTRICT CENTRAL CO-OPERATIVE BANK",	"AKOLA JANATA COMMERCIAL COOPERATIVE BANK",	"ALLAHABAD BANK","ALMORA URBAN CO-OPERATIVE BANK LTD.","ANDHRA BANK","ANDHRA PRAGATHI GRAMEENA BANK","APNA SAHAKARI BANK LTD","AUSTRALIA AND NEW ZEALAND BANKING GROUP LIMITED.","AXIS BANK","BANK INTERNASIONAL INDONESIA","BANK OF AMERICA","BANK OF BAHRAIN AND KUWAIT","BANK OF BARODA",
	"BANK OF CEYLON","BANK OF INDIA","BANK OF MAHARASHTRA","BANK OF TOKYO-MITSUBISHI UFJ LTD.",
	"BARCLAYS BANK PLC",
	"BASSEIN CATHOLIC CO-OP BANK LTD",
	"BHARATIYA MAHILA BANK LIMITED",
	"BNP PARIBAS",
	"CALYON BANK",
	"CANARA BANK",
	"CAPITAL LOCAL AREA BANK LTD.",
	"CATHOLIC SYRIAN BANK LTD.",
	"CENTRAL BANK OF INDIA",
	"CHINATRUST COMMERCIAL BANK",
	"CITIBANK NA",
	"CITIZENCREDIT CO-OPERATIVE BANK LTD",
	"CITY UNION BANK LTD",
	"COMMONWEALTH BANK OF AUSTRALIA",
	"CORPORATION BANK",
	"CREDIT SUISSE AG",
	"DBS BANK LTD",
	"DENA BANK",
	"DEUTSCHE BANK",
	"DEUTSCHE SECURITIES INDIA PRIVATE LIMITED",
	"DEVELOPMENT CREDIT BANK LIMITED",
	"DHANLAXMI BANK LTD",
	"DICGC",
	"DOMBIVLI NAGARI SAHAKARI BANK LIMITED",
	"FIRSTRAND BANK LIMITED",
	"GOPINATH PATIL PARSIK JANATA SAHAKARI BANK LTD",
	"GURGAON GRAMIN BANK",
	"HDFC BANK LTD",
	"HSBC",
	"ICICI BANK LTD",
	"IDBI BANK LTD",
	"IDRBT",
	"INDIAN BANK",
	"INDIAN OVERSEAS BANK",
	"INDUSIND BANK LTD",
	"INDUSTRIAL AND COMMERCIAL BANK OF CHINA LIMITED",
	"ING VYSYA BANK LTD",
	"JALGAON JANATA SAHKARI BANK LTD",
	"JANAKALYAN SAHAKARI BANK LTD",
	"JANASEVA SAHAKARI BANK (BORIVLI) LTD",
	"JANASEVA SAHAKARI BANK LTD. PUNE",
	"JANATA SAHAKARI BANK LTD (PUNE)",
	"JPMORGAN CHASE BANK N.A",
	"KALLAPPANNA AWADE ICH JANATA S BANK",
	"KAPOL CO OP BANK",
	"KARNATAKA BANK LTD",
	"KARNATAKA VIKAS GRAMEENA BANK",
	"KARUR VYSYA BANK",
	"KOTAK MAHINDRA BANK",
	"KURMANCHAL NAGAR SAHKARI BANK LTD",
	"MAHANAGAR CO-OP BANK LTD",
	"MAHARASHTRA STATE CO OPERATIVE BANK",
	"MASHREQBANK PSC",
	"MIZUHO CORPORATE BANK LTD",
	"MUMBAI DISTRICT CENTRAL CO-OP. BANK LTD.",
	"NAGPUR NAGRIK SAHAKARI BANK LTD",
	"NATIONAL AUSTRALIA BANK",
	"NEW INDIA CO-OPERATIVE BANK LTD.",
	"NKGSB CO-OP BANK LTD",
	"NORTH MALABAR GRAMIN BANK",
	"NUTAN NAGARIK SAHAKARI BANK LTD",
	"OMAN INTERNATIONAL BANK SAOG",
	"ORIENTAL BANK OF COMMERCE",
	"PARSIK JANATA SAHAKARI BANK LTD",
	"PRATHAMA BANK",
	"PRIME CO OPERATIVE BANK LTD",
	"PUNJAB AND MAHARASHTRA CO-OP BANK LTD.",
	"PUNJAB AND SIND BANK",
	"PUNJAB NATIONAL BANK",
	"RABOBANK INTERNATIONAL (CCRB)",
	"RAJGURUNAGAR SAHAKARI BANK LTD.",
	"RAJKOT NAGARIK SAHAKARI BANK LTD",
	"RESERVE BANK OF INDIA",
	"SBERBANK",
	"SHINHAN BANK",
	"SHRI CHHATRAPATI RAJARSHI SHAHU URBAN CO-OP BANK LTD",
	"SOCIETE GENERALE",
	"SOLAPUR JANATA SAHKARI BANK LTD.SOLAPUR",
	"SOUTH INDIAN BANK",
	"STANDARD CHARTERED BANK",
	"STATE BANK OF BIKANER AND JAIPUR",
	"STATE BANK OF HYDERABAD",
	"STATE BANK OF INDIA",
	"STATE BANK OF MAURITIUS LTD",
	"STATE BANK OF MYSORE",
	"STATE BANK OF PATIALA",
	"STATE BANK OF TRAVANCORE",
	"SUMITOMO MITSUI BANKING CORPORATION",
	"SYNDICATE BANK",
	"TAMILNAD MERCANTILE BANK LTD",
	"THANE BHARAT SAHAKARI BANK LTD",
	"THE A.P. MAHESH CO-OP URBAN BANK LTD.",
	"THE AHMEDABAD MERCANTILE CO-OPERATIVE BANK LTD.",
	"THE ANDHRA PRADESH STATE COOP BANK LTD",
	"THE BANK OF NOVA SCOTIA",
	"THE BANK OF RAJASTHAN LTD",
	"THE BHARAT CO-OPERATIVE BANK (MUMBAI) LTD",
	"THE COSMOS CO-OPERATIVE BANK LTD.",
	"THE DELHI STATE COOPERATIVE BANK LTD.",
	"THE FEDERAL BANK LTD",
	"THE GADCHIROLI DISTRICT CENTRAL COOPERATIVE BANK LTD",
	"THE GREATER BOMBAY CO-OP. BANK LTD",
	"THE GUJARAT STATE CO-OPERATIVE BANK LTD",
	"THE JALGAON PEOPLES CO-OP BANK",
	"THE JAMMU AND KASHMIR BANK LTD",
	"THE KALUPUR COMMERCIAL CO. OP. BANK LTD.",
	"THE KALYAN JANATA SAHAKARI BANK LTD.",
	"THE KANGRA CENTRAL CO-OPERATIVE BANK LTD",
	"THE KANGRA COOPERATIVE BANK LTD",
	"THE KARAD URBAN CO-OP BANK LTD",
	"THE KARNATAKA STATE APEX COOP. BANK LTD.",
	"THE LAKSHMI VILAS BANK LTD",
	"THE MEHSANA URBAN COOPERATIVE BANK LTD",
	"THE MUNICIPAL CO OPERATIVE BANK LTD MUMBAI",
	"THE NAINITAL BANK LIMITED",
	"THE NASIK MERCHANTS CO-OP BANK LTD. NASHIK",
	"THE RAJASTHAN STATE COOPERATIVE BANK LTD.",
	"THE RATNAKAR BANK LTD",
	"THE ROYAL BANK OF SCOTLAND N.V",
	"THE SAHEBRAO DESHMUKH CO-OP. BANK LTD.",
	"THE SARASWAT CO-OPERATIVE BANK LTD",
	"THE SEVA VIKAS CO-OPERATIVE BANK LTD (SVB)",
	"THE SHAMRAO VITHAL CO-OPERATIVE BANK LTD",
	"THE SURAT DISTRICT CO OPERATIVE BANK LTD.",
	"THE SURAT PEOPLES CO-OP BANK LTD",
	"THE SUTEX CO.OP. BANK LTD.",
	"THE TAMILNADU STATE APEX COOPERATIVE BANK LIMITED",
	"THE THANE DISTRICT CENTRAL CO-OP BANK LTD",
	"THE THANE JANATA SAHAKARI BANK LTD",
	"THE VARACHHA CO-OP. BANK LTD.",
	"THE VISHWESHWAR SAHAKARI BANK LTD. PUNE",
	"THE WEST BENGAL STATE COOPERATIVE BANK LTD",
	"TJSB SAHAKARI BANK LTD.",
	"TUMKUR GRAIN MERCHANTS COOPERATIVE BANK LTD.",
	"UBS AG",
	"UCO BANK",
	"UNION BANK OF INDIA",
	"UNITED BANK OF INDIA",
	"UNITED OVERSEAS BANK",
	"VASAI VIKAS SAHAKARI BANK LTD.",
	"VIJAYA BANK",
	"WEST BENGAL STATE COOPERATIVE BANK",
	"WESTPAC BANKING CORPORATION",
	"WOORI BANK",
	"YES BANK LTD",
	"ZILA SAHKARI BANK LTD GHAZIABAD");

		$this->app->assign("bank_dd",$bank_array);		

				

				$category_tbl="cm_categories";

				$category_condition="status!=2";

				$category_text="Select Category";

				$field_one="id";

				$field_two="name";

				$categoryorder_condition="name ASC";

	            $category_dd=$this->app->cmx->create_dd($category_tbl,$category_condition,$field_one,$field_two,$category_text,$categoryorder_condition);	

				$this->app->assign("category_dd",$category_dd);

				

				$class_tbl="cm_classes";

				$class_condition="status!=2";

				$class_text="Select Category";

				$field_one="id";

				$field_two="name";

				$classorder_condition="name ASC";

	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$class_condition);	

				$this->app->assign("class_dd",$class_dd);

				

				//Designation

				$religion_tbl="cm_designations";

				$religion_condition="status!=2";

				$religion_text="Select Designation";

				$field_one="id";

				$field_two="name";

				$religionorder_condition="name ASC";

	            $designations_dd=$this->app->cmx->create_dd($religion_tbl,$religion_condition,$field_one,$field_two,$religion_text,$religionorder_condition);	

				$this->app->assign("designations_dd",$designations_dd);

				

				$course_tbl="cm_course";

				$course_condition="status!=2";

				$course_text="Select Department";

				$field_one="id";

				$field_two="course_name";

				$courseorder_condition="course_name ASC";

	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	

				$this->app->assign("branch_dd",$course_dd);

				

				$sub_tbl="cm_subjects";

				$sub_condition="status!=2";

				$sub_text="Select Subject";

				$field_one="id";

				$field_two="subject_name";

				$suborder_condition="subject_name ASC";

	            $sub_dd=$this->app->cmx->create_dd($sub_tbl,$sub_condition,$field_one,$field_two,$sub_text,$suborder_condition);	

				$this->app->assign("sub_dd",$sub_dd);

				

				$semester_tbl="cm_semesters";

				$semester_condition="status!=2";

				$semester_text="Select Course";

				$field_one="id";

				$field_two="name";

				$semesterorder_condition="name ASC";

	            $semester_dd=$this->app->cmx->create_dd($semester_tbl,$semester_condition,$field_one,$field_two,$semester_text,$semesterorder_condition);	

				$this->app->assign("sem_dd",$semester_dd);
				if($this->app->getGetVar("record_id")=="")				
				{
					 $inscript.="
				$(document).ready(function() {
					
					cf_datapager(1,'staff');
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
					cf_datapager(1,'staff');
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
					$obj_students = $this->app->load_model("staff",$item_id);
					
					//$obj_students-
					$rsstudents = $obj_students->execute("SELECT");
					if(count($rsstudents)>0)
					{
						$this->app->assign_form_data("frm_staff", $rsstudents[0]);
						$this->app->assign("rsstudents", $rsstudents[0]);
					}
					else
					{
						$this->app->redirect(CMX_ROOT."/staffentry/staff/");
					}
				}
				elseif($this->app->getGetVar("record_id")!="")				
				{
					
					$record_id=$this->app->cmx->decrypt($this->app->getGetVar("record_id"),ency_key);	
					
					
					$inscript.="
				$(document).ready(function() {
					if($('#record_id').val()!='')
					{
						$('#enq_no').val('".$record_id."').trigger('change');
					}
				
				});";
				}
				

				

		  }
		 elseif($action=="faculty")
		 {
			 	$inscript.="

				$(document).ready(function() {

					cf_datapager(1,'faculty');

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

					cf_datapager(1,'faculty');

					});

				});";

				
				$class_tbl="cm_classes";

				$class_condition="status!=2";

				$class_text="Select Category";

				$field_one="id";

				$field_two="name";

				$classorder_condition="name ASC";

	            $class_dd=$this->app->cmx->create_dd($class_tbl,$class_condition,$field_one,$field_two,$class_text,$class_condition);	

				$this->app->assign("class_dd",$class_dd);

				

				//Designation

				$religion_tbl="cm_designations";

				$religion_condition="status!=2 and staff_type='Faculty'";

				$religion_text="Select Designation";

				$field_one="id";

				$field_two="name";

				$religionorder_condition="name ASC";

	            $designations_dd=$this->app->cmx->create_dd($religion_tbl,$religion_condition,$field_one,$field_two,$religion_text,$religionorder_condition);	

				$this->app->assign("designations_dd",$designations_dd);

				$sub_tbl="cm_subjects";

				$sub_condition="status!=2";

				$sub_text="Select Subject";

				$field_one="id";

				$field_two="subject_name";

				$suborder_condition="subject_name ASC";

	            $sub_dd=$this->app->cmx->create_dd($sub_tbl,$sub_condition,$field_one,$field_two,$sub_text,$suborder_condition);	

				$this->app->assign("sub_dd",$sub_dd);

				$course_tbl="cm_course";

				$course_condition="status!=2";

				$course_text="Select Department";

				$field_one="id";

				$field_two="course_name";

				$courseorder_condition="course_name ASC";

	            $course_dd=$this->app->cmx->create_dd($course_tbl,$course_condition,$field_one,$field_two,$course_text,$courseorder_condition);	

				$this->app->assign("branch_dd",$course_dd);

				
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
			$this->app->assign("module_title","staffentry");
			$this->app->assign("menu_base",CMX_ROOT.'/staffentry');
		}
	}	
?>