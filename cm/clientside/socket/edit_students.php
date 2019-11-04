<?php

	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	$id=$app->getPostVar("act_id");

	$acd_id=$app->cmx->decrypt($id,ency_key);

	if($acd_id>0)

	{

	

		$obj_client = $app->load_model("student",$acd_id);

		$rs_eve = $obj_client->execute("SELECT");

		

		if($rs_eve[0]["dob"]>0)

		{

			$date_of_birth=date('d-m-Y',$rs_eve[0]["dob"]);

		}

		else {
			$date_of_birth="";
		}

		

		if($rs_eve[0]["transaction_date"]>0)

		{

			$transaction_date=date('d-m-Y',$rs_eve[0]["transaction_date"]);

		}

		else {

			$transaction_date="";

		}

		

		if($rs_eve[0]["fee_last_date"]>0)

		{

			$fee_last_date=date('d-m-Y',$rs_eve[0]["fee_last_date"]);

		}

		else {

			$fee_last_date="";

		}
		if(file_exists(ABS_PATH.$app->get_user_config("student_image").$rs_eve[0]['profile_img']) && $rs_eve[0]['profile_img']!="")
				  { 
				  $student_image=SERVER_ROOT.$app->get_user_config("student_image").$rs_eve[0]['profile_img'];
				  }
				  else
				  {
				  $student_image=CMX_ROOT.'/img/avatar-1-256.png';
				  }
		
		
		

		$data_array=array(
		"name"=>$rs_eve[0]["name"],
		"student_image"=>$student_image,
		"gender"=>$rs_eve[0]["gender"],
		"category"=>$rs_eve[0]["category"],
		"category_id"=>$rs_eve[0]["category_id"],
		"religion"=>$rs_eve[0]["religion"],//,
		"course_id"=>$rs_eve[0]["course_id"],
		"sem"=>$app->cmx->getAnyfield($rs_eve[0]["sem"],"cm_semesters","name"),//$rs_eve[0]["sem"],
		"id_no"=>$rs_eve[0]["id_no"],
		"email"=>$rs_eve[0]["email"],
		"address"=>$rs_eve[0]["cm_permenent_address_line1"].", ".$rs_eve[0]["cm_permenent_address_line2"].", ".$rs_eve[0]["cm_permenent_city"].", ".$rs_eve[0]["cm_permenent_taluka"].", ".$rs_eve[0]["cm_permenent_district"].", ".$rs_eve[0]["cm_permenent_zipcode"],
		"classid"=>$app->cmx->getAnyfield($rs_eve[0]["cm_class_id"],"cm_classes","abbreviation"),//,
		"parents_mobile_no"=>$rs_eve[0]["parents_mobile_no"],
		"student_mobile_no"=>$rs_eve[0]["student_mobile_no"],
		);

	

	

	echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));	

	}

	

	

?>