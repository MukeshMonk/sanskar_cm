<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$id=$app->getPostVar("act_id");
	//$acd_id=$app->cmx->decrypt($id,ency_key);
	$acd_id=$id;
	
	
	if($acd_id>0)
	{
		$obj_client_chk = $app->load_model("student");
		$rs_eve_chk = $obj_client_chk->execute("SELECT",false,"","cm_cnf_id=".$acd_id."");
		if(count($rs_eve_chk)>0){
			echo $obj_JSON->encode(array("success"=>"1","MSG"=>'Student Already Registered'));
		}
		else
		{
			//$student_data = $app->cmx->getStudentDataByConfirmNo($acd_id);	
			$obj_cnf = $app->load_model("cm_confirmation");
			$rs_cnf = $obj_cnf->execute("SELECT", false, "","id='".$acd_id."' and status='Admission Granted'","");
			if(count($rs_cnf)>0)
			{
				
					$obj_register = $app->load_model("cm_register");
					$rs_register = $obj_register->execute("SELECT", false, "","id='".$rs_cnf[0]["reg_id"]."' and status='Admission Granted'","");
					$obj_register_le = $app->load_model("cm_last_exam");
					$rs_register_le = $obj_register_le->execute("SELECT", false, "","reg_id='".$rs_cnf[0]["reg_id"]."'","");
					if(count($rs_register)>0)
					{
						if(file_exists(ABS_PATH.$app->get_user_config("student_image").$rs_register[0]["profile_img"]) && $rs_register[0]["profile_img"]!="")
					  { 
					  $student_image=SERVER_ROOT.$app->get_user_config("student_image").$rs_register[0]["profile_img"];
					  }
					  else
					  {
						  $student_image ='';
					  }
					$data_array=array(
					"first_name"=>$rs_register[0]["first_name"],
					"middle_name"=>$rs_register[0]["middle_name"],
					"last_name"=>$rs_register[0]["last_name"],
					"blood_group"=>$rs_register[0]["blood_group"],
					"cm_course"=>$app->cmx->getAnyfield($rs_register[0]["enq_class"],"cm_classes","course_id"),
					"sem"=>$app->cmx->getAnyfield($rs_register[0]["enq_class"],"cm_classes","sem_id"),
					"dob"=>$rs_register[0]["dob"],
					"cm_academic_year1"=>$rs_register[0]["cm_academic_year"],
					"email_id"=>$rs_register[0]["email_id"],
					"birth_place"=>$rs_register[0]["birth_place"],
					"classid"=>$rs_register[0]["enq_class"],
					"mobile_no"=>$rs_register[0]["mobile_no"],
					"phone_no"=>$rs_register[0]["phone_no"],
					"parent_mobile_no"=>$rs_register[0]["parent_mobile_no"],
					"g_annual_income"=>$rs_register[0]["g_annual_income"],
					"gender"=>$rs_register[0]["gender"],
					"category"=>$rs_register[0]["category"],
					"mother_name"=>$rs_register[0]["mother_name"],
					"address"=>$rs_register[0]["address"],
					"city"=>$rs_register[0]["city"],
					"District"=>$rs_register[0]["District"],
					"state"=>$rs_register[0]["state"],
					"adm_date"=>$rs_cnf[0]["adm_date"],
					"en_form_no"=>$rs_merit[0]["reg_no"],
					"profile_img"=>$student_image,
					"pin"=>$rs_register[0]["pin"],
					"last_exam"=>$rs_register_le
					);
					echo $obj_JSON->encode(array("success"=>"0","result"=>$data_array));
					}
					else
					{
						echo $obj_JSON->encode(array("success"=>"1","MSG"=>"Register Record Not Found","sql"=>$obj_register->sql));
					}
				
				
				
			}
			else
			{
				echo $obj_JSON->encode(array("success"=>"1","MSG"=>"Confirmation Record Not Found"));
			}
			
		}
	}
	
	
?>