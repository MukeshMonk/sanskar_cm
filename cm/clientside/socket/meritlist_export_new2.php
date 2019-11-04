<?php 
	$jsonclass = $app->load_module("Services_JSON");

	$page=$app->getPostVar('page');
	$method=$app->getPostVar('method');
	$sb=$app->getPostVar('sb');
	$sbv=$app->getPostVar('sbv');
	$cat1=$app->getPostVar('cat');
	$sort_field=$app->getPostVar('sort_field');
	$sort_field_value=$app->getPostVar('sort_field_value');
	$cat1='all';
	$cond_id = "int_class=".$sbv." and int_acd_year=".$sb;
	
	 $get_init_id = $app->cmx->get_field("cm_initiate","id",$cond_id);
	 if($get_init_id!='')
	 {
		 
			$sql_db="SELECT  `cm_register` . * , cm_last_exam . * 
			FROM  `cm_register` 
			LEFT JOIN  `cm_last_exam` ON cm_register.id = cm_last_exam.reg_id 
			WHERE  `cm_register`.`enq_class` =  '".$sbv."' 
			AND  `cm_register`.`cm_academic_year` =  '".$sb."' 
			AND  `cm_last_exam`.`exam_name1` =  '3' AND (`cm_register`.`status` = 'Registration Done - Fees Pending' or `cm_register`.`status` = 'Registration Done - Fees Paid' or `cm_register`.`status`='Registration Done-Outside') and `cm_last_exam`.`percen_new`!='' ORDER BY    `cm_last_exam`.`percen_new` DESC";// LIMIT ".$lim_val_for_merit;
			
			 $obj_model_hm = $app->load_model("cm_register");
			 $result = $obj_model_hm->execute("SELECT",false,$sql_db);
	
	// $sql_mm="SELECT * from merit_master where init_no=".$get_init_id;
	 $obj_model_mm = $app->load_model("merit_master");
	  $result_mm = $obj_model_mm->execute("SELECT",false,"","init_no=".$get_init_id);
	 if(count($result_mm)>0)
	 {
		 $total_merit=count($result_mm)+1;
	 }
	 else
	 {
		 $total_merit =1 ;
	 }
	// echo $total_merit;
	// exit;
	/*if(count($result_mm)>0)
		{
			
		}
		else
		{*/
			//echo $sql_db;
			//print_r($result);
			//exit;
			if(count($result)>0){
			$update_field=array();
			$update_field['class_no'] = $sbv;
			$update_field['total_merit'] = $total_merit;
			$update_field['acd_year'] = $sb;
			$update_field['seat'] = 0;
			$update_field['status'] = 'Open';
			$update_field['init_no'] = $get_init_id;
			$update_field['added_on'] = time();
			$update_field['added_by'] = $_SESSION['StaffID'];
			
			$obj_model_log = $app->load_model("merit_master");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT",false,"INSERT INTO merit_master (class_no, total_merit, acd_year, seat,status,init_no,added_on,added_by)
VALUES (".$sbv.", ".$total_merit.", ".$sb.", 0,'Open',".$get_init_id.",".time().",".$_SESSION['StaffID'].")");
			
			$i=0+1;
			
			foreach($result as $row)
			{
				//if(  ()){
					$months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
					$pas_year_arr = explode("-",$row['pass_year1']);
					$year_new='';
					foreach($months as $k_m=>$v_m)
					{
						if($k_m==$pas_year_arr[0]){
							$year_new.=$v_m;
						}
					}
					$mj=0;
					for($year_no=1989;$year_no<=date("Y");$year_no++)
					{
						if($mj==$pas_year_arr[1])
						{
							$year_new.="-".$year_no;
						}
						$mj++;
					}
				$merit_data = array();
				$merit_data['merit_master'] = $ins;
				$merit_data['merit_no'] = $i;
				$merit_data['reg_no'] = $row['reg_id'];
				$merit_data['Name'] = $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
				$merit_data['gender'] = $row['gender'];
				$merit_data['cat_name'] = $row['category'];
				$merit_data['board'] = $row['board_name1'];
				$merit_data['obt_marks'] = $row['obtained_marks_new'];
				$merit_data['total_marks'] = $row['total_marks1'];
				$merit_data['per'] = $row['percen_new'];
				$merit_data['year'] = $year_new;//$row['pass_year1'];
				$merit_data['stream_pass'] = $row['stream_name'];
				$merit_data['status'] = $row['status'];
				$merit_data['added_on'] =  time();
				$merit_data['addeb_by'] = $_SESSION['StaffID'];
			
				$obj_model_merit = $app->load_model("cm_meritlist");
				$obj_model_merit->map_fields($merit_data);
				$ins_1=$obj_model_merit->execute("INSERT");	
				
				/*$exam_reg = array();
				$exam_reg['status'] = $row['status'];
				$obj_model_reg = $app->load_model("cm_register",$row['reg_id']);
				$obj_model_reg->map_fields($exam_reg);
				$obj_model_reg->execute("UPDATE");*/
				
				$i++;
				//}
				
			}
			
			$msg="Merit Created Successfully.";
			
			
	
	$sql_excel="SELECT  `cm_meritlist` . *,cm_register.id as std_reg_id,cm_register.reg_no as form_no FROM  `cm_meritlist` 
LEFT JOIN  `cm_register` ON cm_meritlist.reg_no = cm_register.id LEFT JOIN  `merit_master` ON cm_meritlist.merit_master = merit_master.id
WHERE  `cm_register`.`enq_class` =  '".$sbv."' AND `cm_meritlist`.`merit_master` =  '".$ins."'
AND  `cm_register`.`cm_academic_year` =  '".$sb."'  ORDER BY  `cm_meritlist`.`per` DESC";	
		
	$obj_model_hm = $app->load_model("cm_meritlist");
	 $result = $obj_model_hm->execute("SELECT",false,$sql_excel);
	 if(count($result)>0)
	 {
		 
		 	 $sql_excel_c_id="SELECT  `cm_classes` . *,cm_course.id as crs_id FROM  `cm_classes` 
LEFT JOIN  `cm_course` ON cm_classes.course_id = cm_course.id
WHERE  `cm_classes`.`id` =  '".$sbv."'";	
		
				$obj_model_cource = $app->load_model("cm_classes");
	 			$crc_rs = $obj_model_cource->execute("SELECT",false,$sql_excel_c_id);
			$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads1=array("Sr. No.","Form No.","Student Name","Gender","Category","BOARD","Obt. Marks","Total Marks","Per. Of 12'th","Year of Passing","Stream");
			
			$i=0+1;
			$all_i=1;
			$other_i=1;
			$open_i=1;
			$sc_i=1;
			$st_i=1;
			$sebc_i=1;
			$sci_all_i=1;
			$sci_other_i=1;
			$sci_open_i=1;
			$sci_sc_i=1;
			$sci_st_i=1;
			$sci_sebc_i=1;
			foreach($result as $row)
			{
				$stream_new = $row['stream_pass'];
				if($crc_rs[0]['crs_id']=='3' || $crc_rs[0]['crs_id']=='2'){
								if($stream_new=='1')
								{
									        if($row["board"]=='1')
											{
												$sci_all_array[]= $app->cmx->setMeritData($sci_all_i,$row); 
												$sci_all_i++;
													switch ($row['cat_name']) {
														case 'open':
														$sci_open_array[]= $app->cmx->setMeritData($sci_open_i,$row); 
															$sci_open_i++;
															break;
														case 'sebc':
														$sci_sebc_array[]= $app->cmx->setMeritData($sci_sebc_i,$row); 
															$sci_sebc_i++;
															break;
														case 'sc':
														$sci_sc_array[]= $app->cmx->setMeritData($sci_sc_i,$row); 
															$sci_sc_i++;
															break;
														case 'st':
														$sci_st_array[]= $app->cmx->setMeritData($sci_st_i,$row); 
															$sci_st_i++;
														break;
														case 'ob':
														$sci_other_array[]= $app->cmx->setMeritData($sci_other_i,$row); 
															$sci_other_i++;
														break;
														
													}
											}
											else
											{
												$sci_other_array[]= $app->cmx->setMeritData($sci_other_i,$row); 
												$sci_other_i++;
											}
								}
								else
								{
											if($row["board"]=='1')
											{
												$all_array[]= $app->cmx->setMeritData($all_i,$row); 
												$all_i++;
													switch ($row['cat_name']) {
														case 'open':
														$open_array[]= $app->cmx->setMeritData($open_i,$row); 
															$open_i++;
															break;
														case 'sebc':
														$sebc_array[]= $app->cmx->setMeritData($sebc_i,$row); 
															$sebc_i++;
															break;
														case 'sc':
														$sc_array[]= $app->cmx->setMeritData($sc_i,$row); 
															$sc_i++;
															break;
														case 'st':
														$st_array[]= $app->cmx->setMeritData($st_i,$row); 
															$st_i++;
														break;
														case 'ob':
														$other_array[]= $app->cmx->setMeritData($other_i,$row); 
															$other_i++;
														break;
														
													}
											}
											else
											{
												$other_array[]= $app->cmx->setMeritData($other_i,$row); 
												$other_i++;
											}
								}
			}
			else
				{
					if($row["board"]=='1')
					{
						$all_array[]= $app->cmx->setMeritData($all_i,$row); 
						$all_i++;
							switch ($row['cat_name']) {
								case 'open':
								$open_array[]= $app->cmx->setMeritData($open_i,$row); 
									$open_i++;
									break;
								case 'sebc':
								$sebc_array[]= $app->cmx->setMeritData($sebc_i,$row); 
									$sebc_i++;
									break;
								case 'sc':
								$sc_array[]= $app->cmx->setMeritData($sc_i,$row); 
									$sc_i++;
									break;
								case 'st':
								$st_array[]= $app->cmx->setMeritData($st_i,$row); 
									$st_i++;
								break;
								case 'ob':
								$other_array[]= $app->cmx->setMeritData($other_i,$row); 
													$other_i++;
								break;
								
							}
					}
					else
					{
						$other_array[]= $app->cmx->setMeritData($other_i,$row); 
							$other_i++;
					}
				}
			}
			$array_field1=array();
	$data_array1=$all_array;
	$fields1=array("sr","form_no","name","gender","cat_name","board","obt_markss","tot_marks","per_12","pass_year","stu_stream");
		//$excel_postfix="merit_".time();
		$excel_postfix="merit_year".$sb."_class".$sbv."_merit".$total_merit;
		
		$filename="report_".$excel_postfix;
		if($crc_rs[0]['crs_id']=='3' || $crc_rs[0]['crs_id']=='2'){
			$sheets=array(
		0=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$all_array,
					"fields"=>$fields1,
					"array_field"=>$all_array,
						),
						1=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$open_array,
					"fields"=>$fields1,
					"array_field"=>$open_array,
						),
						2=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$sebc_array,
					"fields"=>$fields1,
					"array_field"=>$sebc_array,
						),
						3=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$sc_array,
					"fields"=>$fields1,
					"array_field"=>$sc_array,
						),
						4=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$st_array,
					"fields"=>$fields1,
					"array_field"=>$st_array,
						),
					5=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$other_array,
					"fields"=>$fields1,
					"array_field"=>$other_array,
					),
					6=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$sci_all_array,
					"fields"=>$fields1,
					"array_field"=>$sci_all_array,
						),
						7=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$sci_open_array,
					"fields"=>$fields1,
					"array_field"=>$sci_open_array,
						),
						8=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$sci_sebc_array,
					"fields"=>$fields1,
					"array_field"=>$sci_sebc_array,
						),
						9=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$sci_sc_array,
					"fields"=>$fields1,
					"array_field"=>$sci_sc_array,
						),
						10=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$sci_st_array,
					"fields"=>$fields1,
					"array_field"=>$sci_st_array,
						),
					11=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$sci_other_array,
					"fields"=>$fields1,
					"array_field"=>$sci_other_array,
		)
		);
		$sheet_names=array("All Merit","Open Merit","SEBC Merit","SC Merit","ST Merit","Other Merit","All Merit Science","Open Merit Science","SEBC Merit Science","SC Merit Science","ST Merit Science","Other Merit Science");
		}
		else
		{
			$sheets=array(
		0=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$all_array,
					"fields"=>$fields1,
					"array_field"=>$all_array,
						),
						1=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$open_array,
					"fields"=>$fields1,
					"array_field"=>$open_array,
						),
						2=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$sebc_array,
					"fields"=>$fields1,
					"array_field"=>$sebc_array,
						),
						3=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$sc_array,
					"fields"=>$fields1,
					"array_field"=>$sc_array,
						),
						4=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$st_array,
					"fields"=>$fields1,
					"array_field"=>$st_array,
						),
			5=>array(
					"ExeclHeads"=>$ExeclHeads1,
					"data_array"=>$other_array,
					"fields"=>$fields1,
					"array_field"=>$other_array,
			)
		);
		$sheet_names=array("All Merit","Open Merit","SEBC Merit","SC Merit","ST Merit","Other Merit");
		}
		//$filename="sales_export_".count($result)."_".time();
		$ext="xls";
		$app->cmx->create_multiple_excel_new($sheets,$sheet_names,$filename,$ext);
		$path=ABS_PATH.''.$app->get_user_config("meritlistfiles").$filename.'.xls';//meritlistfiles
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	
	 }
		}
		else
		{
			$msg="No Data Found";
			echo $jsonclass->encode(array("RESULT"=>"Failed","MSG"=>$msg));
		}
		}else
		{
			$msg="Initialization id not fuond";
			echo $jsonclass->encode(array("RESULT"=>"Failed","MSG"=>$msg));
		}
	?>