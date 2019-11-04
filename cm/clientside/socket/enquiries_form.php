<?php
$jsonclass    = $app->load_module("Services_JSON");
$obj_JSON     = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
$enq_date     = $app->getPostVar("enq_date");
$enq_no       = $app->getPostVar("enq_no");
$acd_year     = $app->getPostVar("acd_year");
$enq_class    = $app->getPostVar("enq_class");
$first_name   = $app->getPostVar("first_name1");
$middle_name  = $app->getPostVar("middle_name1");
$last_name    = $app->getPostVar("last_name1");
$dob          = $app->getPostVar("dob");
$age_today    = $app->getPostVar("age_today");
$email_id     = $app->getPostVar("email_id");
$student_type = $app->getPostVar("student_type");
$mobile_no    = $app->getPostVar("mobile_no");
$phone_no     = $app->getPostVar("phone_no");
$gender       = $app->getPostVar("gender");
$category     = $app->getPostVar("category");
$ph_status    = $app->getPostVar("ph_status");
$father_name  = $app->getPostVar("father_name");
$profession   = $app->getPostVar("profession1");
$mother_name  = $app->getPostVar("mother_name1");
$address      = $app->getPostVar("address1");
$city         = $app->getPostVar("city1");
$district     = $app->getPostVar("district1");
$state        = $app->getPostVar("state1");
$country      = $app->getPostVar("country1");
$pin          = $app->getPostVar("pin");
$name_last    = $app->getPostVar("name_last");
$last_address = $app->getPostVar("last_address");
$pr_grade     = $app->getPostVar("pr_grade");
$poi          = $app->getPostVar("poi");
$sem_adm      = $app->getPostVar("sem_adm");
$pre_comm     = $app->getPostVar("pre_comm");
$src_info     = $app->getPostVar("src_info");
$remarks      = $app->getPostVar("remarks1");
$record_id    = $app->getPostVar("record_id");
if ($first_name != "" && $last_name != "" && $dob != "" && $mobile_no != "" && $enq_class != "") {
    $course_id = $app->cmx->getAnyfield($enq_class, 'cm_classes', 'course_id');
    if ($record_id == "") {
        $obj_model_log_check = $app->load_model("cm_enquiries");
        $obj_model_log_check->join_table("cm_classes", "left", array(), array(
            "enq_class" => "id"
        ));
        $rs_res = $obj_model_log_check->execute("SELECT", false, "", "cm_enquiries.first_name='" . $first_name . "' and cm_enquiries.last_name='" . $last_name . "' and cm_enquiries.dob='" . $dob . "' and cm_enquiries.mobile_no='" . $mobile_no . "' and cm_classes.course_id='" . $course_id . "' ");
        if (count($rs_res) > 0) {

            $msg    = "Student Enquiry already exist";
            $res_st = "ERROR";
        } else {
            $update_field                 = array();
            $update_field['enq_date']     = $enq_date;
            $update_field['enq_no']       = $enq_no;
            $update_field['acd_year']     = $acd_year;
            $update_field['enq_class']    = $enq_class;
            $update_field['first_name']   = strtoupper($first_name);
            $update_field['middle_name']  = strtoupper($middle_name);
            $update_field['last_name']    = strtoupper($last_name);
            $update_field['dob']          = $dob;
            $update_field['age_today']    = $age_today;
            $update_field['email_id']     = $email_id;
            $update_field['student_type'] = $student_type;
            $update_field['mobile_no']    = $mobile_no;
            $update_field['phone_no']     = $phone_no;
            $update_field['gender']       = $gender;
            $update_field['category']     = $category;
            $update_field['ph_status']    = $ph_status;
            $update_field['father_name']  = strtoupper($father_name);
            $update_field['profession']   = strtoupper($profession);
            $update_field['mother_name']  = strtoupper($mother_name);
            $update_field['address']      = strtoupper($address);
            $update_field['city']         = strtoupper($city);
            $update_field['district']     = strtoupper($district);
            $update_field['state']        = strtoupper($state);
            $update_field['country']      = strtoupper($country);
            $update_field['pin']          = $pin;
            $update_field['name_last']    = $name_last;
            $update_field['last_address'] = $last_address;
            $update_field['pr_grade']     = $pr_grade;
            $update_field['poi']          = $poi;
            $update_field['sem_adm']      = $sem_adm;
            $update_field['pre_comm']     = $pre_comm;
            $update_field['src_info']     = $src_info;
            $update_field['remarks']      = $remarks;
            $update_field['status']       = 'Appl. Form Not Issue';
            $update_field['added_on']     = time();
            $update_field['added_by']     = $_SESSION['StaffID'];
            $obj_model_log                = $app->load_model("cm_enquiries");
            $obj_model_log->map_fields($update_field);
            $ins                        = $obj_model_log->execute("INSERT");
            $update_field_new['enq_no'] = "ENQ-" . date('y') . "-" . date('y', strtotime('+1 year')) . "-" . $ins;
            $obj_model_log              = $app->load_model("cm_enquiries", $ins);
            $obj_model_log->map_fields($update_field_new);
            $obj_model_log->execute("UPDATE");
            $msg    = "Admission Enquiries Added Successfully.";
			$data_log=array("id"=> $ins ,"post_data"=>$app->getPostVars());
			$log_id_new=$app->cmx->log_entry("cm_enquiries","Add_Record",$data_log); 
            $res_st = "SUCCESS";
        }
    } else {
        $record_id           = $app->cmx->decrypt($record_id, ency_key);
        $update_field        = array();
        $obj_model_log_check = $app->load_model("cm_enquiries");
        $obj_model_log_check->join_table("cm_classes", "left", array(), array(
            "enq_class" => "id"
        ));
        $rs_res = $obj_model_log_check->execute("SELECT", false, "", "cm_enquiries.first_name='" . $first_name . "' and cm_enquiries.last_name='" . $last_name . "' and cm_enquiries.dob='" . $dob . "' and cm_enquiries.mobile_no='" . $mobile_no . "' and cm_classes.course_id='" . $course_id . "' and cm_enquiries.id!='" . $record_id . "'");
        if (count($rs_res) > 0) {
            $msg    = "Student Enquiry already exist";
            $res_st = "ERROR";
        } else {
            $update_field['enq_date']     = $enq_date;
            $update_field['acd_year']     = $acd_year;
            $update_field['enq_class']    = $enq_class;
           $update_field['first_name']   = strtoupper($first_name);
            $update_field['middle_name']  = strtoupper($middle_name);
            $update_field['last_name']    = strtoupper($last_name);
            $update_field['dob']          = $dob;
            $update_field['age_today']    = $age_today;
            $update_field['email_id']     = $email_id;
            $update_field['student_type'] = $student_type;
            $update_field['mobile_no']    = $mobile_no;
            $update_field['phone_no']     = $phone_no;
            $update_field['gender']       = $gender;
            $update_field['category']     = $category;
            $update_field['ph_status']    = $ph_status;
            $update_field['father_name']  = strtoupper($father_name);
            $update_field['profession']   = strtoupper($profession);
            $update_field['mother_name']  = strtoupper($mother_name);
            $update_field['address']      = strtoupper($address);
            $update_field['city']         = strtoupper($city);
            $update_field['district']     = strtoupper($district);
            $update_field['state']        = strtoupper($state);
            $update_field['country']      = strtoupper($country);
            $update_field['pin']          = $pin;
            $update_field['name_last']    = $name_last;
            $update_field['last_address'] = $last_address;
            $update_field['pr_grade']     = $pr_grade;
            $update_field['poi']          = $poi;
            $update_field['sem_adm']      = $sem_adm;
            $update_field['pre_comm']     = $pre_comm;
            $update_field['src_info']     = $src_info;
            $update_field['remarks']      = $remarks;
            $update_field['last_updated'] = time();
			$update_field['updated_by']     = $_SESSION['StaffID'];
          
            $obj_model_log                = $app->load_model("cm_enquiries", $record_id);
            $obj_model_log->map_fields($update_field);
            $ins    = $obj_model_log->execute("UPDATE");
			$data_log=array("id"=>$record_id,"post_data"=>$app->getPostVars());
			$log_id_new=$app->cmx->log_entry("cm_enquiries","Edit_Record",$data_log);
            $msg    = "Admission Enquiries Updated Successfully.";
            $res_st = "SUCCESS";
        }
    }
    if ($res_st == 'SUCCESS') {
        echo $obj_JSON->encode(array(
            "RESULT" => $res_st,
            "MSG" => $msg,
            "retriver" => "enquiries"
        ));
    } else {
        echo $obj_JSON->encode(array(
            "RESULT" => $res_st,
            "MSG" => $msg
        ));
    }
} else {
    echo $obj_JSON->encode(array(
        "RESULT" => "ERROR",
        "MSG" => "Please Fill All Required Fields"
    ));
}
?>