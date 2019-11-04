<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$user_email=$app->getPostVar("user_email");
	$user_password=$app->getPostVar("user_password");
	$user_mobile=$app->getPostVar("user_mobile");
	$firstname=$app->getPostVar("first_name");
	$surname=$app->getPostVar("surname");
	
	  if($user_email!= NULL && $user_mobile!= NULL && $user_password!= NULL)
	  {
		
		    
			
			$obj_model_user = $app->load_model("user");
			$email_user_id = $obj_model_user->record_exists(array("email"=>$user_email),"id"); 
			
			$obj_model_umb = $app->load_model("user");
			$phone_user_id = $obj_model_umb->record_exists(array("phone"=>$user_mobile),"id");
			if($email_user_id!=NULL)
			{
			echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"It seems that Email ID is already registered with some account!"));			 	

			}
			elseif($phone_user_id!=NULL)
			{
			echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"It seems that Mobile Number is already registered with some account!"));	
			}
			else
			{
			   
			   
			    $pass_enc=$app->utility->alpha_encrypt($user_password,ency_key);
				$update_field = array();
				$update_field['first_name']=$firstname;
				$update_field['last_name']=$firstname;
				$update_field['email']=$user_email;
				$update_field['email']=$user_email;
				$update_field['phone']=$user_mobile;
				$update_field['password']=$pass_enc;
				$update_field['reg_from']='Website';
				$update_field['added_on']=time();
				$obj_model_user = $app->load_model("user");
				$obj_model_user->map_fields($update_field);	
				$userID=$obj_model_user->execute("INSERT");
				
					 $userID_enc=$app->utility->encrypt($userID,ency_key);
					 $vlink=SERVER_ROOT.'/evarification/'.$userID_enc.'/';
					 $subject = "Just one more step to get started with Xclusive Match";
					 $to=$user_email;
					 $email=$user_email;
					 $pass=$password;
					 $logo=$app->utility->get_logo();
					 $obj_mailer = $app->load_module("mailer\sender");
					 $mail_body = $app->utility->ParseMailTemplate("register.html", array("site_title"=>FROM_NAME,"domain_name"=>DOMAIN_NAME,"logo"=>$logo,"vlink"=>$vlink,"server_root"=>SERVER_ROOT,"footer_phone"=>FOOTER_PHONE,"footer_email"=>FOOTER_EMAIL));
					 if($mail_body==NULL){
					 $this->app->display_error(NULL, "Could not parse the mail template");
					 }
					 $obj_mailer->create();
					 $obj_mailer->subject($subject);
					 $obj_mailer->add_to($email);
					 $obj_mailer->htmlbody($mail_body);						
					 $flag = $obj_mailer->send();
					 if($flag)
					 {
					$msg_success="Your account has been created successfully, please check your mail to verify your account.";
					 }
					 else
					 {
					$msg_success="Your account has been created successfully, but we are unable to send you mail. please contact admin for your account verification.";
						
					 }
				
				
				echo $obj_JSON->encode(array("RESULT"=>"success","MSG"=>$msg_success));			 	

			}
		 			
					
					
		
	 }
	
?>