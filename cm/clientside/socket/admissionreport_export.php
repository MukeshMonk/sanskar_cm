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
	$total_merit=$app->getPostVar('total_merit');
	$class_sel=$app->getPostVar('class_sel');
	$filter_date=$app->getPostVar('filter_date');
	$filter_date2=$app->getPostVar('filter_date2');
	$fiter_condition="";
	if($acd_year_sel!="")
	{
		$fiter_condition.=" and merit_master.acd_year='".$acd_year_sel."'";
	}
	if($total_merit!="")
	{
		$fiter_condition.=" and merit_master.total_merit='".$total_merit."'";
	}
		$ord_cond='';
		$cond='';
	//$sql="SELECT  count(cm_confirmation.id) as filled_seat,cm_confirmation.init_no as init_id_cnf,cm_confirmation.quota,cm_confirmation.acd_year as class_year,cm_confirmation.class_no as class_id ,cm_confirmation.status  FROM  cm_confirmation LEFT JOIN merit_master ON cm_confirmation.init_no=merit_master.init_no   WHERE cm_confirmation.id!=0 and cm_confirmation.status!='Admission Rejected' ".$cond.$fiter_condition.$ord_cond." GROUP BY  cm_confirmation.class_no,cm_confirmation.quota";
	$sql="SELECT  count(cm_meritlist.id),merit_master.*  FROM  cm_meritlist LEFT JOIN merit_master ON cm_meritlist.merit_master=merit_master.id    WHERE cm_meritlist.id!=0 and cm_meritlist.status='Admission Granted' ".$cond.$fiter_condition.$ord_cond." GROUP BY  merit_master.class_no";
	//echo $sql;
	//exit;
	 $obj_model_hm = $app->load_model("cm_meritlist");
	 $result = $obj_model_hm->execute("SELECT",false,$sql);
	 if(count($result)>0)
	 {
		 	$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads=array("Sr.","Academic Year","Class","Quota","Total Seats","Occupied Seats","Vacant Seats");
			$i=0+1;
			$full_price_total=0;
			$nights_total=0;
			$nr_pax=0;
			foreach($result as $row)
			{
				$q_arr=array('open'=>'Open','sc'=>'SC','st'=>'ST','sebc'=>'SEBC','ob'=>'Other Board','mgmt'=>'Management');
				foreach($q_arr as $k=>$v)
				{
					$acd_year=$app->cmx->get_acd_year_name($row['acd_year']);
					$class_id=$app->cmx->class_name($row['class_no']);
					$sql_2="SELECT  count(cm_confirmation.id) as filled_seat,cm_confirmation.init_no as init_id_cnf  FROM  cm_confirmation  WHERE cm_confirmation.id!=0 and cm_confirmation.status='Admission Granted' and cm_confirmation.class_no='".$row['class_no']."' and cm_confirmation.init_no='".$row['init_no']."'  and cm_confirmation.merit_master_no='".$total_merit."' and cm_confirmation.quota='".$k."'";
					$obj_2 = $app->load_model("cm_meritlist");
					$rs_2 = $obj_2->execute("SELECT",false,$sql_2);
					$cat_tot_seat =  $app->cmx->getCatSeatById($k,$row['init_no']);
					$filled_seat=$rs_2[0]['filled_seat'];
					
					$remain_seat=$cat_tot_seat-$filled_seat;
					if($remain_seat=='')
					{
						$remain_seat='0';
					}
					$report_array[]=array(
							"sr"=>$i,
							"acd_year"=>$acd_year,
							"class"=>$class_id,
							"quota"=>$v,
							"cat_tot_seat" =>$cat_tot_seat,
							"filled_seat"=>$filled_seat,
							"remain_seat"=>$remain_seat,
							);
					$i++;
				}  
				
			}
			$array_field=array();
	$data_array=$report_array;
	$fields=array("sr","acd_year","class","quota","cat_tot_seat","filled_seat","remain_seat");
		$excel_postfix="admissionreport_".time();
		$filename="report_".$excel_postfix;
		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url,"sql"=>$sql,"sql_2"=>$sql_2));	 		 	
	 }
	 else
	 {
		 echo $jsonclass->encode(array("RESULT"=>"ERROR","MSG"=>"No Record Found","sql"=>$sql,"sql_2"=>$sql_2));	
	 }
	?>