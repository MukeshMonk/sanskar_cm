<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
				$field_name="file_import";
	
	if(!empty($_FILES[$field_name]["name"]))
	{
						  $max_size=2;
							$size=filesize($_FILES[$field_name]['name']);
							$file_name1 = basename($_FILES[$field_name]['name']);
							$file_info1 = $app->utility->get_file_info($file_name1);
							$uploaded_filename=$file_info1->filename;
							
						if(strtoupper($file_info1->extension)=="XLS"
						|| strtoupper($file_info1->extension)=="CSV"
						|| strtoupper($file_info1->extension)=="XLSX"
						|| strtoupper($file_info1->extension)=="XLSB"
						)
						{
							$new_name1 = $file_name1;
							$file_new_name=$app->utility->seo_url($uploaded_filename);
							$file_new_name=$file_new_name.time().'.'.$file_info1->extension;
							if($app->utility->upload_file($_FILES[$field_name]))
							{
								if($app->utility->store_uploaded_file($app->get_user_config("importfiles"), $file_new_name))			
										{		
													$update_field["attachment"]=$file_new_name;	
										}
										$app->utility->remove_uploaded_file();
										
								
								 $inputFileName = ABS_PATH.$app->get_user_config("importfiles").$file_new_name;
								 $table_class='table table-striped table-bordered table-hover ';
				 				 $obj_excel = $app->load_module("PHPExcel");
								 $excel_preview=$app->cmx->preview_excel2($inputFileName,$table_class);
								 if($excel_preview["totalrows"]<=10001)
								 {
							$html=$excel_preview["html"];	 
							
							$html="<p>"."Total ".($excel_preview["totalrows"]-1)." Rows and  ".$excel_preview["totalcolumns"]." Columns"."</p>";
							$html.=$excel_preview["html"];	 
							
						echo $obj_JSON->encode(array("RESULT"=>"OK","excel_preview"=>$html,"filename"=>$file_new_name,"records"=>"Total ".($excel_preview["totalrows"]-1)." Rows and  ".$excel_preview["totalcolumns"]." Columns"));	
								 }
								 else
								 {
									echo $obj_JSON->encode(array("RESULT"=>"Failed","MSG"=>"Your Excelsheet have more than 1000 enteries, You can upload 1000 recods at a time."));					
								 }
						 }
						 else
						 {
									echo $obj_JSON->encode(array("RESULT"=>"Failed","MSG"=>"File Not Uploaded"));					
						 }

				 }
				 else
				 {
									echo $obj_JSON->encode(array("RESULT"=>"Failed","MSG"=>"File You are trying to upload has  invalid extension."));					
				 }
	}
	else
	{
									echo $obj_JSON->encode(array("RESULT"=>"Failed","MSG"=>"File You are trying to upload has  invalid extension."));					
	}
?>