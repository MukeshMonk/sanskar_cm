<?

	class _default extends controller{

		

		function init(){

			//$this->app->enable_cache("home.html");

		}

		

		function onload(){

		

			//$a=$this->app->cmx->alpha_encrypt("admin123",ency_key);

			$this->assign("MESSAGE", $this->app->utility->get_message());

			

			$this->app->setBodyClass("");

			/*====CSS====*/

			

			$this->app->setAddCSS("css/separate/pages/login.min.css");

			$this->app->setAddCSS("css/lib/font-awesome/font-awesome.min.css");

			$this->app->setAddCSS("css/lib/bootstrap/bootstrap.min.css");

			$this->app->setAddCSS("css/main.css");



			$this->app->setAddJS("js/lib/jquery/jquery.min.js");

			$this->app->setAddJS("js/lib/tether/tether.min.js");

			$this->app->setAddJS("js/lib/bootstrap/bootstrap.min.js");

			$this->app->setAddJS("js/plugins.js");

			$this->app->setAddJS("js/lib/match-height/jquery.matchHeight.min.js");

			$this->app->setAddJS("js/validation/jquery.validate.min.js");

			$this->app->setAddJS("js/validation/additional-methods.min.js");

			$this->app->setAddJS("js/dizzijs/login.js");

			$this->app->setAddJS("js/app.js");

	

			

			

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

        });";

		

		$this->app->setInlineScripts($inscript);

	

		

		}

		

		function do_login(){

			

			

			//$pass= $this->app->utility->my_encrypt(mysql_real_escape_string($this->app->getPostVar("login_password")),ency_key);

			$pass=mysql_real_escape_string($this->app->getPostVar("login_password"));

			

			$obj_model_admin = $this->app->load_model("master_admin");

			$admin_id = $obj_model_admin->record_exists(array("username"=> mysql_real_escape_string($this->app->getPostVar("login_username")),"pass"=>$pass),"id,role_id");

			if($admin_id['id']!=NULL){

				$_SESSION['AdminID'] = $admin_id['id'];

				$_SESSION['role_id'] = $admin_id['role_id'];

				$this->app->utility->set_message("Welcome to adminpanel ! ", "SUCCESS");

				$this->app->redirect("index.php?view=home");

				

			}else{

				

			

				$this->app->utility->set_message("Login Failed...!!", "ERROR");

				$this->app->redirect("index.php");

			

			}

		}	

		

		

		//function for forgrt password

		function forgot_password(){

		

			$obj_mailer = $this->app->load_module("mailer\sender");

	

			$admin_id = "";

			$obj_model_admin = $this->app->load_model("admin");

			$admin_id = $obj_model_admin->record_exists(array("emailid"=>$this->app->getPostVar("email")),"id");

			

			if($admin_id!=NULL){

				$rs_admin = $obj_model_admin->execute("SELECT", false, "", "id=".$admin_id);

				/*================= Send admin mail =================*/

				if(count($rs_admin)>0){

					if($rs_admin[0]["emailid"]!=""){

						$mail_body = $this->app->utility->ParseMailTemplate("admin_forgot_password.html", array("emailid"=>$rs_admin[0]["emailid"], "username"=>$rs_admin[0]["username"],"password"=>$rs_admin[0]["password"]));

						if($mail_body==NULL){

							$this->app->display_error(NULL, "Could not parse the mail template");

						}

						$obj_mailer->create();

						$obj_mailer->subject("User Name and Password for Administrator");

						$obj_mailer->add_to($rs_admin[0]["emailid"]);

						$obj_mailer->htmlbody($mail_body);						

						$flag = $obj_mailer->send();

						if($flag){

							$this->app->utility->set_message("Your Username and Password sent to your Email address", "SUCCESS");

							$this->app->redirect("index.php?view=default");

						}

					}

				}

				/*==========================================================*/							

			}else{

				$this->app->utility->set_message("Your Email address in not authenticated. Enter valid Email address", "ERROR");

				$this->app->redirect("index.php?view=default");

			}

		}	

		

		//function end here

		

		

		

		

		

		

		function do_logout(){

			session_unset();

			session_destroy();

			session_start();

			$this->app->utility->set_message("You have successfully logged out of the system", "SUCCESS");

			$this->app->redirect("index.php");

		}

		

	}	

?>