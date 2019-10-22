<?php

	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	$id=$app->getPostVar("act_id");

	$acd_id=$app->cmx->decrypt($id,ency_key);

	if($acd_id>0)

	{

	

		/*`enq_date`, `enq_no`, `acd_year`, `enq_class`, `first_name`, `middle_name`, `last_name`, `dob`, `age_today`, `email_id`, `student_type`, `mobile_no`, `phone_no`, `gender`, `category`, `ph_status`, `father_name`, `profession`, `mother_name`, `address`, `city`, `district`, `state`, `country`, `pin`, `name_last`, `last_address`, `pr_grade`, `poi`, `sem_adm`, `pre_comm`, `src_info`, `remarks`*/



		$obj_client = $app->load_model("cm_enquiries",$acd_id);

		$rs_eve = $obj_client->execute("SELECT");

		

		

		$data_array=array(

		"enq_date"=>$rs_eve[0]["enq_date"],

		"enq_no"=>$rs_eve[0]["enq_no"],

		"acd_year"=>$rs_eve[0]["acd_year"],

		"enq_class"=>$rs_eve[0]["enq_class"],

		"first_name"=>$rs_eve[0]["first_name"],

		"middle_name"=>$rs_eve[0]["middle_name"],

		"last_name"=>$rs_eve[0]["last_name"],

		"dob"=>$rs_eve[0]["dob"],

		"age_today"=>$rs_eve[0]["age_today"],

		"email_id"=>$rs_eve[0]["email_id"],

		"student_type"=>$rs_eve[0]["student_type"],

		"mobile_no"=>$rs_eve[0]["mobile_no"],

		"phone_no"=>$rs_eve[0]["phone_no"],

		"gender"=>$rs_eve[0]["gender"],

		"category"=>$rs_eve[0]["category"],

		"ph_status"=>$rs_eve[0]["ph_status"],

		"father_name"=>$rs_eve[0]["father_name"],

		"profession"=>$rs_eve[0]["profession"],

		"mother_name"=>$rs_eve[0]["mother_name"],

		"address"=>$rs_eve[0]["address"],

		"city"=>$rs_eve[0]["city"],

		"district"=>$rs_eve[0]["district"],

		"state"=>$rs_eve[0]["state"],

		"country"=>$rs_eve[0]["country"],

		"pin"=>$rs_eve[0]["pin"],

		"name_last"=>$rs_eve[0]["name_last"],

		"last_address"=>$rs_eve[0]["last_address"],

		"pr_grade"=>$rs_eve[0]["pr_grade"],

		"poi"=>$rs_eve[0]["poi"],

		"sem_adm"=>$rs_eve[0]["sem_adm"],

		"pre_comm"=>$rs_eve[0]["pre_comm"],
		"status"=>$rs_eve[0]["status"],

		"src_info"=>$rs_eve[0]["src_info"],

		"remarks"=>$rs_eve[0]["remarks"]

		);

	

	

	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	

	}

	

	

?>