<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$user_email=$app->getPostVar("user_email");
	
	  if($user_email!= NULL)
	  {
			$obj_model_user = $app->load_model("user");
		    $rs = $obj_model_user->execute("SELECT",false,"","email='".$user_email."'");
			
			
			if(count($rs)==0)
			{
			echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"This email seems to not registered."));			 	
			}
			else
			{
					 $obj_model_gs=$app->load_model('generel_settings');
					 $rs_gs=$obj_model_gs->execute("SELECT",false,"","");
					 
					  $admin_email=$rs_gs[0]['contact_email1'];
					 $contact_number=$rs_gs[0]['contact_number'];
					 $footer_email=$rs_gs[0]['contact_email'];
				
				 	 $subject = "Reset Password Request - Xclusive Match";
					 $name=$rs[0]["first_name"].' '.$rs[0]["last_name"];
					 $to=$user_email;
					 $uid=$app->utility->encrypt($rs[0]["id"],ency_key);
					 $time=time();
					 $time_ency=$app->utility->encrypt($time,ency_key);
					 $vlink=SERVER_ROOT.'/resetpassword/'.$uid.'/'.$time_ency.'/';
					 
					 $logo=$app->utility->get_logo();
					 $obj_mailer = $app->load_module("mailer\sender");
					 
					
					 
					  $mail_body = $app->utility->ParseMailTemplate("reset_pass.html", array("site_title"=>FROM_NAME,"domain_name"=>DOMAIN_NAME,"logo"=>$logo,"username"=>$name,"vlink"=>$vlink,"server_root"=>SERVER_ROOT,"footer_phone"=>$contact_number,"footer_email"=>$footer_email));
					 
					 if($mail_body==NULL){
					 $app->display_error(NULL, "Could not parse the mail template");
					 }
					 $obj_mailer->create();
					 $obj_mailer->subject($subject);
					 $obj_mailer->add_to($user_email);
					 $obj_mailer->htmlbody($mail_body);						
					 $flag = $obj_mailer->send();
					 if($flag)
					 {
						$msg_success='Password reset link sent to your email address.';
					    echo $obj_JSON->encode(array("RESULT"=>"success","MSG"=>$msg_success));			 	
					 }
					 else
					 {
						$msg_success='Password reset link sending failed.';
					    echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>$msg_success));		 
					 }
				
				

			}
	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Invalid login credentials"));	
	 }
	
?>