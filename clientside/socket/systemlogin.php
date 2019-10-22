<?php 



	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	$user_email=$app->getPostVar("uname");

	$user_password=$app->getPostVar("pwd");



	  if($user_email!= NULL && $user_password!= NULL)

	  {

		    $pass_enc=$app->cmx->alpha_encrypt(trim($user_password),ency_key);
			//echo $pass_enc."   dbd   ";
			
			 // $pass_enc2=$app->cmx->alpha_decrypt(trim($pass_enc),ency_key);
			 // echo $pass_enc2;
			 // exit;
			

			$obj_model_user = $app->load_model("cm_users");

		    $rs = $obj_model_user->execute("SELECT",false,"","(email='".mysql_real_escape_string($user_email)."' or username='".mysql_real_escape_string($user_email)."' ) and pass='".$pass_enc."' and status='Active' ");

			//echo $user_password." /";
			//echo $obj_model_user->sql;
			//exit;
			if(count($rs)==0)

			{

			   echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Invalid login credentials"));			 	

			}

			elseif(count($rs)>0 && $rs['status']=='Inactive')

			{				

		      echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Account Not Active"));			 	

			}

			/*elseif(count($rs)>0)

			{

			echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Your account is not active, for more detail Please <a href=\"".SERVER_ROOT.'/contact.html'."\">Contact Admin</a>"));	

			}*/

			else

			{

		   		$_SESSION['StaffID'] = $rs[0]['id'];

		   		$_SESSION['Role'] = $rs[0]['role_id'];

		   		$_SESSION['username'] = $rs[0]['username'];

				//$_SESSION['show_eff']='Yes';

				$update_field=array();

				$update_field['user_id'] = $rs[0]['id'];

				$update_field['date'] = date('d-m-Y H:i:s');

				$update_field['browser']=$app->cmx->detect_browser();

				$update_field['ip']=$app->cmx->get_client_ip();

				$obj_model_log = $app->load_model("cm_logins");

				$obj_model_log->map_fields($update_field);

				$ins=$obj_model_log->execute("INSERT");	

				$msg_success='Successfully authenticated,redirecting...';

				echo $obj_JSON->encode(array("RESULT"=>"success","MSG"=>$msg_success,"URL"=>SERVER_ROOT.'/cm/index.php'));			 	

			}

	 }

	 else

	 {

		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Invalid login credentials"));	

	 }

?>