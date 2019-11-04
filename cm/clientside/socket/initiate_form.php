<?php 
/*`id`, `adm_code`, `acd_year`, `class_id`, `status`, `no_seat`, `g_seat`, `sc_seat`, `st_seat`, `sebc_seat`, `ph_seat`, `obq_seat`, `dop`, `un_date`, `inq_fees`, `adm_form_fees`, `adm_fees`, `int_acd_year`, `int_class`, `sms`, `inq_sms`, `adm_app_sms`, `adm_cnf_sms`, `added_on`, `last_updated`, `added_by`*/

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$adm_code=$app->getPostVar("adm_code");
	$acd_year=$app->getPostVar("acd_year");
	$class_id=$app->getPostVar("class_id");
	$status=$app->getPostVar("status");
	$no_seat=$app->getPostVar("no_seat");
	$g_seat=$app->getPostVar("g_seat");
	$sc_seat=$app->getPostVar("sc_seat");
	
	$st_seat=$app->getPostVar("st_seat");
	$sebc_seat=$app->getPostVar("sebc_seat");
	$ph_seat=$app->getPostVar("ph_seat");
	$obq_seat=$app->getPostVar("obq_seat");	$mgmt_seat1=$app->getPostVar("mgmt_seat");
	$dop=$app->getPostVar("dop");
	$un_date=$app->getPostVar("un_date");
	$inq_fees=$app->getPostVar("inq_fees");
	$adm_form_fees=$app->getPostVar("adm_form_fees");
	$adm_fees=$app->getPostVar("adm_fees");
	$int_acd_year=$app->getPostVar("int_acd_year");
	$int_class=$app->getPostVar("int_class");
	$sms=$app->getPostVar("sms");
	$inq_sms=$app->getPostVar("inq_sms");
	$adm_app_sms=$app->getPostVar("adm_app_sms");
	$adm_cnf_sms=$app->getPostVar("adm_cnf_sms");
	$record_id=$app->getPostVar("record_id");

	  if($adm_code!= NULL)
	  {
		
		if($record_id=="")
		{
			$update_field=array();
			
		/*	$course_name =  $app->cmx->get_course_name($branch);
			$category_name = $app->cmx->get_religion_category_name($category);
			$religion_name = $app->cmx->get_religion_name($religion);*/
			
		/*`id`, `adm_code`, `acd_year`, `class_id`, `status`, `no_seat`, `g_seat`, `sc_seat`, `st_seat`, `sebc_seat`, `ph_seat`, `obq_seat`, `dop`, `un_date`, `inq_fees`, `adm_form_fees`, `adm_fees`, `int_acd_year`, `int_class`, `sms`, `inq_sms`, `adm_app_sms`, `adm_cnf_sms`, `added_on`, `last_updated`, `added_by`*/
			
			$update_field['adm_code'] = $adm_code;
			$update_field['acd_year'] =$acd_year;
			$update_field['class_id'] =$class_id;
			$update_field['status'] = $status;
			$update_field['no_seat'] = $no_seat;
			$update_field['g_seat'] = $g_seat;
			$update_field['sc_seat'] = $sc_seat;
			$update_field['st_seat'] = $st_seat;
			$update_field['sebc_seat'] = $sebc_seat;
			$update_field['ph_seat'] = $ph_seat;
			$update_field['obq_seat'] = $obq_seat;			$update_field['mgmt_seat'] = $mgmt_seat1;
			$update_field['dop'] = $dop;
			$update_field['un_date'] = $un_date;
			$update_field['inq_fees'] = $inq_fees;
			$update_field['adm_form_fees'] = $adm_form_fees;
			
			$update_field['adm_fees'] = $adm_fees;
			$update_field['int_acd_year'] = $int_acd_year;
			$update_field['int_class'] = $int_class;
			$update_field['sms'] = $sms;
			$update_field['inq_sms'] = $inq_sms;
			$update_field['adm_app_sms'] = $adm_app_sms;
			
			$update_field['adm_cnf_sms'] = $adm_cnf_sms;
			$update_field['added_on'] = time();
			$update_field['added_by'] = $_SESSION['StaffID'];
			
			$obj_model_log = $app->load_model("cm_initiate");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="Admission Information Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			
			
			/*$course_name =  $app->cmx->get_course_name($branch);
			$category_name = $app->cmx->get_religion_category_name($category);
			$religion_name = $app->cmx->get_religion_name($religion);*/
			/* Image Upload*/
			
			
			$update_field['adm_code'] = $adm_code;
			$update_field['acd_year'] =$acd_year;
			$update_field['class_id'] =$class_id;
			$update_field['status'] = $status;
			$update_field['no_seat'] = $no_seat;
			$update_field['g_seat'] = $g_seat;
			$update_field['sc_seat'] = $sc_seat;
			$update_field['st_seat'] = $st_seat;
			$update_field['sebc_seat'] = $sebc_seat;
			$update_field['ph_seat'] = $ph_seat;
			$update_field['obq_seat'] = $obq_seat;
			$update_field['dop'] = $dop;
			$update_field['un_date'] = $un_date;
			$update_field['inq_fees'] = $inq_fees;
			$update_field['adm_form_fees'] = $adm_form_fees;
			
			$update_field['adm_fees'] = $adm_fees;
			$update_field['int_acd_year'] = $int_acd_year;
			$update_field['int_class'] = $int_class;
			$update_field['sms'] = $sms;
			$update_field['inq_sms'] = $inq_sms;
			$update_field['adm_app_sms'] = $adm_app_sms;
			
			$update_field['adm_cnf_sms'] = $adm_cnf_sms;
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("cm_initiate",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			
			$msg="Admission Info Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"initiate"));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>