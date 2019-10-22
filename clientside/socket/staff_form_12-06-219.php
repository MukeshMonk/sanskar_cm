<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$name=$app->getPostVar("first_name");
	$subject=$app->getPostVar("subject2");
	$staff_h_name=$app->getPostVar("staff_h_name");
	$staff_s_h_name=$app->getPostVar("staff_s_h_name");
	$record_id=$app->getPostVar("record_id");
		$item_id=$app->getPostVar("update_id");
		
	  if($name!= NULL)
	  {
		  $update_field=array();
		  if($staff_h_name!='')
			{
					$update_field["staff_image"]=$staff_h_name;
			}
			if($staff_s_h_name!='')
			{
				$update_field["sing_image"]=$staff_s_h_name;
			}
		  $field_name="staff_image";
			   if(!empty($_FILES[$field_name]['name']))
				{
					if($staff_h_name!='')
							{
								if(file_exists(ABS_PATH.'/'.$app->get_user_config("staff_image").$staff_h_name))
								{
									@unlink(ABS_PATH.'/'.$app->get_user_config("staff_image").$staff_h_name);
								}	
							}
							$max_size=2;
							$size=filesize($_FILES[$field_name]['name']);
							$file_name1 = basename($_FILES[$field_name]['name']);
							$file_info1 = $app->utility->get_file_info($file_name1);
							$uploaded_filename=$file_info1->filename;
						if(strtoupper($file_info1->extension)=="JPG"
						|| strtoupper($file_info1->extension)=="JPEG"
						|| strtoupper($file_info1->extension)=="GIF"
						|| strtoupper($file_info1->extension)=="PNG"
						|| strtoupper($file_info1->extension)=="PDF"
						)
						{
							$new_name1 = $file_name1;
							$file_new_name=$app->utility->seo_url($uploaded_filename);
							$file_new_name=$file_new_name.time().'.'.$file_info1->extension;
							if($app->utility->upload_file($_FILES[$field_name]))
							{
							if($app->utility->store_uploaded_file($app->get_user_config("staff_image"), $file_new_name))			{		
							$update_field["staff_image"]=$file_new_name;	
							}
							 $app->utility->remove_uploaded_file();
							}
				 		}
				 }
				 $field_name= "sing_image";
				 if(!empty($_FILES[$field_name]['name']))
				{
					if($staff_s_h_name!='')
							{
								if(file_exists(ABS_PATH.'/'.$app->get_user_config("staff_image").$staff_s_h_name))
								{
									@unlink(ABS_PATH.'/'.$app->get_user_config("staff_image").$staff_s_h_name);
								}	
							}
							$max_size=2;
							$size=filesize($_FILES[$field_name]['name']);
							$file_name1 = basename($_FILES[$field_name]['name']);
							$file_info1 = $app->utility->get_file_info($file_name1);
							$uploaded_filename=$file_info1->filename;
						if(strtoupper($file_info1->extension)=="JPG"
						 || strtoupper($file_info1->extension)=="JPEG"
						|| strtoupper($file_info1->extension)=="GIF"
						|| strtoupper($file_info1->extension)=="PNG"
						|| strtoupper($file_info1->extension)=="PDF"
						)
						{
							$new_name1 = $file_name1;
							$file_new_name=$app->utility->seo_url($uploaded_filename);
							$file_new_name=$file_new_name.time().'.'.$file_info1->extension;
							if($app->utility->upload_file($_FILES[$field_name]))
							{
							if($app->utility->store_uploaded_file($app->get_user_config("staff_image"), $file_new_name))			{							$update_field["sing_image"]=$file_new_name;	
							}
							 $app->utility->remove_uploaded_file();
							}
				 		}
				 }
		if($item_id=="")
		{
			/* Image Upload*/
			$update_field['added_on'] = time();
			$update_field['added_by'] = $_SESSION['StaffID'];
			$update_field['status'] = 0;
			if(!empty($subject))
			{
				$update_field['subject'] = implode(",",$subject);
			}
			$obj_model_log = $app->load_model("staff");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			$msg="Staff Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($item_id,ency_key);
			if(!empty($subject))
			{
				$update_field['subject'] = implode(",",$subject);
			}
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("staff",$record_id);
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");
			$msg="Staff Updated Successfully.";
		}
		$url=CMX_ROOT.'/staffentry/staff/';		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"staff","URL"=>$url));			 	
	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }
?>