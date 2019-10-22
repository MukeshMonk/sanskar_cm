<?php 



	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	$name=$app->getPostVar("name");

	$status=$app->getPostVar("status");

	$record_id=$app->getPostVar("record_id");



	  if($name!= NULL)

	  {

		

		if($record_id=="")

		{
			$obj_model_log_check = $app->load_model("cm_last_school");

			$rs_rd=$obj_model_log_check->execute("SELECT",false,"","name='".$name."'");

			if(count($rs_rd)>0){
				$msg="School Already Added.";
				$rslt="ERROR";
			}
			else
			{
				$update_field=array();

				$update_field['name'] = $name;
	
				
	
				if($status!="")
	
				{
	
					$update_field['status'] = $status;
	
				}
	
				else
	
				{
	
					$update_field['status'] = 1;
	
				}
	
				$update_field['added_on'] = time();
	
				$update_field['added_by'] = $_SESSION['StaffID'];
	
				
	
				$obj_model_log = $app->load_model("cm_last_school");
	
				$obj_model_log->map_fields($update_field);
	
				$ins=$obj_model_log->execute("INSERT");
	
				$msg="Last School Added Successfully.";
				$ins_id=$ins;
				$rslt="SUCCESS";
			}
			
		}

		else

		{

		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$obj_model_log_check = $app->load_model("cm_last_school");

			$rs_rd=$obj_model_log_check->execute("SELECT",false,"","name='".$name."' and id!='".$record_id."'");

			if(count($rs_rd)>0){
				$msg="School Already Added.";
				$rslt="ERROR";
			}
			else
			{

				$update_field=array();

				$update_field['name'] = $name;

				if($status!="")
	
				{
	
					$update_field['status'] = $status;
	
				}

				else
	
				{
	
					$update_field['status'] = 1;
	
				}

				$update_field['last_updated'] = time();

				$obj_model_log = $app->load_model("cm_last_school",$record_id);

				$obj_model_log->map_fields($update_field);

				$ins=$obj_model_log->execute("UPDATE");

			

				$msg="last School Updated Successfully.";

				$ins_id=$record_id;
				$rslt="SUCCESS";
			}

		}

		
		if($rslt=='SUCCESS')
		{
			echo $obj_JSON->encode(array("RESULT"=>$rslt,"MSG"=>$msg,"retriver"=>"lastschool","id"=>$ins_id,"name"=>$name));
		}
		else
		{
			echo $obj_JSON->encode(array("RESULT"=>$rslt,"MSG"=>$msg));	
		}
		 			 	





	 }

	 else

	 {

		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	

	 }



	



?>