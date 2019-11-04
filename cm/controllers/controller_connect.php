<? 
    class _connect extends controller{
        function init(){
           
        }
        function onload(){
         $en_f_id = $this->app->getGetVar("uid"); 
         $id_dec=$this->app->cmx->decrypt($en_f_id,ency_key);
         
         $obj_model_faculty= $this->app->load_model("faculty");
         $rs_faculty = $obj_model_faculty->execute("SELECT",false,"SELECT email FROM faculty WHERE id= $id_dec");
           // echo"<pre>"; print_r($rs_faculty); exit;
         $obj_model_user = $this->app->load_model("cm_users");
         $rs_user = $obj_model_user->execute("SELECT",false,"","email='".$rs_faculty[0]['email']."'");
         // echo"<pre>"; print_r($rs_user); exit;
            if(count($rs_user)>0)
            {
                $_SESSION['StaffID'] = $rs_user[0]['id'];
				$_SESSION['Role'] = $rs_user[0]['role_id'];
				$_SESSION['username'] = $rs_user[0]['username'];
				//$_SESSION['show_eff']='Yes';
				$update_field=array();
				$update_field['user_id'] = $rs_user[0]['id'];
				$update_field['date'] = date('d-m-Y H:i:s');
				$update_field['browser']=$this->app->cmx->detect_browser();
				$update_field['ip']=$this->app->cmx->get_client_ip();
				$obj_model_log = $this->app->load_model("cm_logins");
				$obj_model_log->map_fields($update_field);
                $ins=$obj_model_log->execute("INSERT");	
                $this->app->redirect(SERVER_ROOT.'/cm/index.php');	
            }
            else {
                $this->app->redirect(SERVER_ROOT.'/faculty/index.php');	
            }
        }
    }
?>