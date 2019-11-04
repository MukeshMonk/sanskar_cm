<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$page=$app->getPostVar('page');
	$method=$app->getPostVar('method');
	$sb=$app->getPostVar('sb');
	$sbv=$app->getPostVar('sbv');
	$sort_field=$app->getPostVar('sort_field');
	$sort_field_value=$app->getPostVar('sort_field_value');
	$status=$app->getPostVar('status_sel');
	$acd_year_sel=$app->getPostVar('acd_year_sel');
	$class_sel=$app->getPostVar('class_sel');
	$filter_date=$app->getPostVar('filter_date');
	$filter_date2=$app->getPostVar('filter_date2');
	$fiter_condition="";
	if($acd_year_sel!="")
	{
		$fiter_condition.=" and cm_confirmation.acd_year='".$acd_year_sel."'";
	}
	if($class_sel!="")
	{
		$fiter_condition.=" and cm_confirmation.class_no='".$class_sel."'";
	}
	if($status!="")
	{
		$fiter_condition.=" and cm_confirmation.status='".$status."'";
	}
	if($filter_date!="" && $filter_date2!="")
	{
		$fiter_condition.=" and (cm_confirmation.adm_date BETWEEN '".$filter_date."' AND '".$filter_date2."')";
	}
	if($sort_field!="" && $sort_field_value!="")
	{
		//$ord_cond=" order by ". $sort_field." ".$sort_field_value;
		$ord_cond='';
	}
	else
	{
		$ord_cond='';
	}
	
	if($sb!="" && $sbv!="")
	{
		if($sb=="cm_register.first_name")		{			$cond=' and cm_confirmation.stud_name like "%'.$sbv.'%"';		}
		else{			$cond=' and '.$sb.' like "%'.$sbv.'%"';		}
	}
	else
	{
		$cond='';
	}
	$sql="SELECT `cm_confirmation`.*,cm_classes.abbreviation as class_name_new,cm_register.gender as stud_gender,cm_register.category as stud_cat FROM `cm_confirmation` LEFT JOIN cm_classes ON cm_confirmation.class_no=cm_classes.id LEFT JOIN cm_register ON cm_confirmation.reg_id=cm_register.id WHERE cm_confirmation.id!=0 ".$cond.$fiter_condition.$ord_cond;
	// $sql="SELECT `cm_register`.* FROM `cm_register` WHERE cm_register.id!=0 ".$cond.$ord_cond;
	 $obj_model_hm = $app->load_model("cm_confirmation");
	 $result = $obj_model_hm->execute("SELECT",false,$sql);
	 if(count($result)>0)
	 {
		 	$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads=array("Sr1.","Name","Gender","Category","Quota","Class","Academic Year","confirmation No","Status","Added On");
			$i=0+1;
			$full_price_total=0;
			$nights_total=0;
			$nr_pax=0;
			foreach($result as $row)
			{
				$statustext=$row["status"];
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
						"name"=>$row["stud_name"],
						"gender"=>$row["stud_gender"],
						"category"=>$row["stud_cat"],
						"quota"=>$row["quota"],
						"class"=>$row['class_name_new'],
						"acd_year"=>$app->cmx->get_acd_year_name($row['acd_year']),
						"cnf_no"=>$row["cnf_no"],
						"status"=>$row['status'],
						"added_on"=>date('d-m-Y',$row["added_on"]),
						);
			$i++;
			}
			$array_field=array();
	$data_array=$report_array;
	$fields=array("sr","name","gender","category","quota","class","acd_year","cnf_no","status","added_on");
		$excel_postfix="admission_".time();
		$filename="report_".$excel_postfix;
		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	
	 }
	 else
		{
			$msg="No record Found";
			echo $jsonclass->encode(array("RESULT"=>"Failed","MSG"=>$msg));
		}
	?>