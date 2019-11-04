<?php 
	$jsonclass = $app->load_module("Services_JSON");

	$page=$app->getPostVar('page');
	$method=$app->getPostVar('method');
	$sb=$app->getPostVar('sb');
	$sbv=$app->getPostVar('sbv');
	$sort_field=$app->getPostVar('sort_field');
	$sort_field_value=$app->getPostVar('sort_field_value');
	
	 if($sort_field!="" && $sort_field_value!="")
	{
		$ord_cond=" order by ". $sort_field." ".$sort_field_value;
	}
	else
	{
		$ord_cond='';
	}
	
	if($sb!="" && $sbv!="")
	{
		$cond=' and '.$sb.' like "%'.$sbv.'%"';
	}
	else
	{
		$cond='';
	}

	 
	 $sql="SELECT `cm_smssenders`.* FROM `cm_smssenders` WHERE id!=0 and status!=2".$cond.$ord_cond;

	 $obj_model_hm = $app->load_model("cm_smssenders");
	 $result = $obj_model_hm->execute("SELECT",false,$sql);
	 
	 if(count($result)>0)
	 {
		 	$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads=array("Sr.","URL","XML Url","Prefix XML","Dynamic Student XML","Postfix XML","IS XML","Status","Added On","Last Updated");
			
			$i=0+1;
			$full_price_total=0;
			$nights_total=0;
			$nr_pax=0;
			foreach($result as $row)
			{
				$status=$row["status"];
				$isxml = $row["is_xml"];
				
				if($status==0)
				{
					$statustext='Active';
				}
				else
				{
					$statustext='Inactive';
				}
				
				
				if($isxml==0)
				{
					$isxmltext='Yes';
				}
				else
				{
					$isxmltext='No';
				}
				
				
				
				if($row["last_updated"]>0)
				{
					$last_updated=date('d-m-Y',$row["last_updated"]);
				}
				else
				{
					$last_updated="";
				}
				$report_array[]=array(
						"sr"=>$i,
						"url"=>$row["url"],
						"xml_url"=>$row["xml_url"],
						"prefix_xml"=>$row["prefix_xml"],
						"dynamic_student_xml"=>$row["dynamic_student_xml"],
						"postfix_xml"=>$row["postfix_xml"],
						"is_xml"=>$isxmltext,
						"status"=>$statustext,
						"added_on"=>date('d-m-Y',$row["added_on"]),
						"last_updated"=>$last_updated,
						);
			$i++;
			}
			
			$array_field=array();
			
	$data_array=$report_array;
	$fields=array("sr","url","xml_url","prefix_xml","dynamic_student_xml","postfix_xml","is_xml","status","added_on","last_updated");
		
		$excel_postfix="smssender_".time();
		$filename="report_".$excel_postfix;
		
		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
		
		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
		
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
		
				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	
			
			
			
	 }
	
	
	
	?>