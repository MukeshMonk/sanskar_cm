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
		$fiter_condition.=" and cm_enquiries.acd_year='".$acd_year_sel."'";
	}
	if($class_sel!="")
	{
		$fiter_condition.=" and cm_enquiries.enq_class='".$class_sel."'";
	}
	if($status!="")
	{
		$fiter_condition.=" and cm_enquiries.status='".$status."'";
	}
	if($filter_date!="" && $filter_date2!="")
	{
		$fiter_condition.=" and (cm_enquiries.enq_date BETWEEN '".$filter_date."' AND '".$filter_date2."')";
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
	{		if($sb=="cm_enquiries.first_name")		{			$cond=' and (cm_enquiries.first_name like "%'.$sbv.'%" or cm_enquiries.middle_name like "%'.$sbv.'%" or cm_enquiries.last_name like "%'.$sbv.'%")';		}
		else{			$cond=' and '.$sb.' like "%'.$sbv.'%"';		}
		
	}
	else
	{
		$cond='';
	}
	 $sql="SELECT `cm_enquiries`.*,cm_register.id as reg_id_new,cm_classes.abbreviation as class_name_new FROM `cm_enquiries` LEFT JOIN cm_classes ON cm_enquiries.enq_class=cm_classes.id LEFT JOIN cm_register ON cm_enquiries.id=cm_register.enq_no WHERE cm_enquiries.id!=0 ".$cond.$fiter_condition.$ord_cond;
	// $sql="SELECT `cm_enquiries`.* FROM `cm_enquiries` WHERE id!=0".$cond.$ord_cond;
	 $obj_model_hm = $app->load_model("cm_enquiries");
	 $result = $obj_model_hm->execute("SELECT",false,$sql);
	 if(count($result)>0)
	 {
		 	$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads=array("Sr.","Inquiry Code","Status","Class","Academic Year","Inquiry Date","Name","Mobile","Date Of Birth","Email Id","Gender","Category","Physically Handicapped","Father Name","Profession","Mother Name","City","District","State","Country","PIN","Name of Last School","Percentage/Grade obtained","Preferred mode of communication","Source of information");	
			$i=0+1;
			$full_price_total=0;
			$nights_total=0;
			$nr_pax=0;
			foreach($result as $row)
			{
				$status=$row["status"];
				$report_array[]=array("sr"=>$i,
				"enq_no"=>$row["enq_no"],
				"status"=>$status,
				"class"=>$row["class_name_new"],
				"acd_year"=>$app->cmx->get_acd_year_name($row['acd_year']),
				"enq_date"=>$row["enq_date"],
				"name"=>$row["last_name"]." ".$row["first_name"]." ".$row["middle_name"],
				"mobile"=>$row["mobile_no"],
				"dob_e"=>$row["dob"],
				"email"=>$row["email_id"],
				"gender_e"=>$row["gender"],
				"category1"=>$row["category"],	
				"ph"=>$row["ph_status"],
				"father_n"=>$row["father_name"],
				"profession1"=>$row["profession"],
				"mother_name1"=>$row["mother_name"],
				"city1"=>$row["city"],
				"district1"=>$row['district'],
				"state1"=>$row["state"],
				"country1"=>$row['country'],
				"pin1"=>$row["pin"],
				"school_last"=>$app->cmx->get_last_school_name($row['name_last']),
				"pr_grade1"=>$row["pr_grade"],
				"pre_comm1"=>$row['pre_comm'],
				"src_info1"=>$row["src_info"]);
				$i++;
			}
			$array_field=array();
			$data_array=$report_array;
			$fields=array("sr","enq_no","status","class","acd_year","enq_date","name","mobile","dob_e","email","gender_e","category1","ph","father_n","profession1","mother_name1","city1","district1","state1","country1","pin1","school_last","pr_grade1","pre_comm1","src_info1");		$excel_postfix="enquiries_".time();
		$filename="report_".$excel_postfix;
		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	
	 }
	?>