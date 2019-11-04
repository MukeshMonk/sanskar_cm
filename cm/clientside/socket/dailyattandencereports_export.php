<?php 
	$jsonclass = $app->load_module("Services_JSON");

	$page=$app->getPostVar('page');
	$method=$app->getPostVar('method');
	$sb = date("Y-m-d",strtotime($app->getPostVar('sb')));
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

	 
	 $sql="SELECT `cm_classes`.* FROM `cm_classes` WHERE id!=0 and status!=2".$cond.$ord_cond;

	 $obj_model_hm = $app->load_model("cm_classes");
	 $result = $obj_model_hm->execute("SELECT",false,$sql);
	 
	 if(count($result)>0)
	 {
		 	$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads=array("Sr.","Class Name","Total Student","Present Student","Leave Student","Absent Student");
			
			$i=0+1;
			$full_price_total=0;
			$nights_total=0;
			$nr_pax=0;
			foreach($result as $row)
			{
				
				
				
				
				$class_id = $row['id'];
				
				$totalstudent = $app->cmx->totalstudent_fromclass($class_id);
				$presentstudent = $app->cmx->present_student_for_attandence_report($class_id,$sb);
				$absentstudent = $app->cmx->absent_student_for_attandence_report($class_id,$sb);
				$leavestudent = $app->cmx->leave_student_for_attandence_report($class_id,$sb);
		
				
				$report_array[]=array(
						"sr"=>$i,
						"name"=>$row["name"],
						"total_student"=>isset($totalstudent)?$totalstudent:'0',
						"present_student"=>isset($presentstudent)?$presentstudent:'0',
						"absent_student"=>isset($absentstudent)?$absentstudent:'0',
						"leave_student"=>isset($leavestudent)?$leavestudent:'0',						
						);
				$i++;
			}
			 
			$array_field=array();
			
	$data_array=$report_array;
	$fields=array("sr","name","total_student","present_student","absent_student","leave_student");
		
		$excel_postfix="dailyattandence_".time();
		$filename="report_".$excel_postfix;
		
		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
		
		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
		
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
		
				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	
			
			
			
	 }
	
	
	
	?>