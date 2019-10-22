<?php 



	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	$password=$app->getPostVar("password");
	$record_id=$app->getPostVar("record_id");
	$firstname=$app->getPostVar("firstname");

	if($_SESSION['Role']==1)
	{
	  if($firstname!= NULL)

	  {

		

		if($record_id=="")

		{

			$update_field=array();

			$password_desc=$app->cmx->alpha_encrypt($password,ency_key);

			

			$update_field['pass'] = $password_desc;

			$update_field['added'] = time();

			$update_field['added_by'] = $_SESSION['StaffID'];

			

			$obj_model_log = $app->load_model("cm_users");

			$obj_model_log->map_fields($update_field);

			$ins=$obj_model_log->execute("INSERT");
			$data_log=array("id"=>$ins,"post_data"=>$app->getPostVars());
			$log_id_new=$app->cmx->log_entry("cm_users","Add_Record",$data_log);
			$msg="Users Added Successfully.";

		}

		else

		{
			
		    $record_id=$app->cmx->decrypt($record_id,ency_key);

			$update_field=array();
			if($password!='')
			{
				$password_desc=$app->cmx->alpha_encrypt($password,ency_key);
				$update_field['pass'] = $password_desc;
			}
			

			

			$update_field['added'] = time();

			$obj_model_log = $app->load_model("cm_users",$record_id);

			$obj_model_log->map_fields($update_field);

			$ins=$obj_model_log->execute("UPDATE");

			
			$data_log=array("id"=>$record_id,"post_data"=>$app->getPostVars());
			$log_id_new=$app->cmx->log_entry("cm_users","Edit_Record",$data_log);
			$msg="Users Updated Successfully.";

			

		}

		

		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"users"));			 	





	 }

	 else

	 {

		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	

	 }
	}
	else
	{
		echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"You have not permission to create a new user"));	
	}



	



?>