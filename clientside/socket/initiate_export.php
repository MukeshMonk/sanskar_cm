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

	 
	 $sql="SELECT `cm_initiate`.* FROM `cm_initiate` WHERE id!=0".$cond.$ord_cond;

	 $obj_model_hm = $app->load_model("cm_initiate");
	 $result = $obj_model_hm->execute("SELECT",false,$sql);
	 
	 if(count($result)>0)
	 {
		 	$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads=array("Sr.","Admission Code","Status","Published Date","Un-publish");
			
			$i=0+1;
			$full_price_total=0;
			$nights_total=0;
			$nr_pax=0;
			foreach($result as $row)
			{
				$status=$row["status"];
				
				
				
				
				$report_array[]=array(
						"sr"=>$i,
						"adm_code"=>$row["adm_code"],
						"status"=>$status,
						"dop"=>$row["dop"],
						"un_date"=>$row["un_date"],
						);
			$i++;
			}
			
			$array_field=array();
			
	$data_array=$report_array;
	$fields=array("sr","adm_code","status","dop","un_date");
		
		$excel_postfix="initiate_".time();
		$filename="report_".$excel_postfix;
		
		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
		
		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
		
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
		
				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	
			
			
			
	 }
	
	
	
	?>