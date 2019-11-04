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
		$fiter_condition.=" and cm_register.cm_academic_year='".$acd_year_sel."'";
	}
	if($class_sel!="")
	{
		$fiter_condition.=" and cm_register.enq_class='".$class_sel."'";
	}
	if($status!="")
	{
		$fiter_condition.=" and cm_register.status='".$status."'";
	}
	if($filter_date!="" && $filter_date2!="")
	{
		$fiter_condition.=" and (cm_register.reg_date BETWEEN '".$filter_date."' AND '".$filter_date2."')";
	}
	if($sort_field!="" && $sort_field_value!="")
	{
		$ord_cond=" order by ". $sort_field." ".$sort_field_value;
	}
	else
	{
		$ord_cond='';
	}
	if($sb!="" && $sbv!="")
	{		if($sb=="cm_register.first_name")		{			$cond=' and (cm_register.first_name like "%'.$sbv.'%" or cm_register.middle_name like "%'.$sbv.'%" or cm_register.last_name like "%'.$sbv.'%")';		}
		else{			$cond=' and '.$sb.' like "%'.$sbv.'%"';		}
		
	}
	else
	{
		$cond='';
	}
	$sql="SELECT `cm_register`.*,cm_classes.abbreviation as class_name_new FROM `cm_register` LEFT JOIN cm_classes ON cm_register.enq_class=cm_classes.id	WHERE cm_register.id!=0 ".$cond.$fiter_condition.$ord_cond;
	// $sql="SELECT `cm_register`.* FROM `cm_register` WHERE cm_register.id!=0 ".$cond.$ord_cond;
	 $obj_model_hm = $app->load_model("cm_register");
	 $result = $obj_model_hm->execute("SELECT",false,$sql);
	 if(count($result)>0)
	 {
		 	$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads=array("Sr1.","Name","Mother Name","Gender","Category","Blood Group","Class","Academic Year","Registration No","Date of birth","Birth Place","Email","Address","City","Taluka","District","Pin Code","Parents Mobile No","Student Mobile No","Status","Added On","Last Updated");
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
						"name"=>$row["first_name"]." ".$row["last_name"],
						"mothername"=>$row["mother_name"],
						"gender"=>$row["gender"],
						"cat_name"=>$row["category"],
						"blood_group"=>$row["blood_group"],
						"class"=>$row['class_name_new'],
						"acd_year"=>$app->cmx->get_acd_year_name($row['cm_academic_year']),
						"reg_no"=>$row["reg_no"],
						"dob"=>$row["dob"],
						"birth_place"=>$row["birth_place"],
						"email"=>$row["email_id"],
						"address"=>$row["address"],
						"city"=>$row["city"],
						"taluka"=>$row["tehsil"],
						"district"=>$row["District"],
						"pin_code"=>$row["pin"],
						"parents_mobile_no"=>$row["parent_mobile_no"],
						"student_mobile_no"=>$row["mobile_no"],
						"status"=>$statustext,
						"added_on"=>date('d-m-Y',$row["added_on"]),
						"last_updated"=>$last_updated,
						);
			$i++;
			}
			$array_field=array();
	$data_array=$report_array;
	$fields=array("sr","name","mothername","gender","cat_name","blood_group","class","acd_year","reg_no","dob","birth_place","email","address","city","taluka","district","pin_code","parents_mobile_no","student_mobile_no","status","added_on","last_updated");
		$excel_postfix="register_".time();
		$filename="report_".$excel_postfix;
		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	
	 }
	?>