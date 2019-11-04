<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$user_email=$app->getPostVar("user_email");
	$user_password=$app->getPostVar("user_password");
	
	
	  if($user_email!= NULL && $user_password!= NULL)
	  {
		
		   
		    $pass_enc=$app->utility->alpha_encrypt($user_password,ency_key);
			$obj_model_user = $app->load_model("user");
		    $rs = $obj_model_user->execute("SELECT",false,"","email='".mysql_real_escape_string($user_email)."' and password='".$pass_enc."'");
			
			
			if(count($rs)==0)
			{
				
			echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Invalid login credentials"));			 	
			}
			elseif(count($rs)>0 && $rs[0]['is_confirm']=='No')
			{
			echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Your account is not active, for more detail Please <a href=\"".SERVER_ROOT.'/contact.html'."\">Contact Admin</a>"));	
			}
			else
			{
			    $_SESSION['user_id'] = $rs[0]['id'];
				$msg_success='Successfully authenticated,redirecting...';
				echo $obj_JSON->encode(array("RESULT"=>"success","MSG"=>$msg_success,"URL"=>SERVER_ROOT.'/user.html'));			 	

			}
	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Invalid login credentials"));	
	 }
	
?>