<?php 
	$jsonclass = $app->load_module("Services_JSON");

	$page=$app->getPostVar('page');
	$method=$app->getPostVar('method');
	$sb=$app->getPostVar('sb');
	$sbv=$app->getPostVar('sbv');
	$cat1=$app->getPostVar('cat');
	$sort_field=$app->getPostVar('sort_field');
	$sort_field_value=$app->getPostVar('sort_field_value');
	
	
	$lim_val = $app->cmx->get_cat_seat($cat1,$sbv,$sb); 
	$g_seat = $app->cmx->get_cat_seat("open",$sbv,$sb);
	$sc_seat = $app->cmx->get_cat_seat("sc",$sbv,$sb);
	$st_seat = $app->cmx->get_cat_seat("st",$sbv,$sb);
	$ph_seat = $app->cmx->get_cat_seat("ph",$sbv,$sb);	
	$obq_seat = $app->cmx->get_cat_seat("ob",$sbv,$sb);
	$sebc_seat = $app->cmx->get_cat_seat("sebc",$sbv,$sb);
	$mgmt_seat = $app->cmx->get_cat_seat("mgmt",$sbv,$sb);
	//echo $lim_val;
	//exit;
	if($cat1=='ph')
	{
		$where_cond = "AND cm_register.ph_status='ph_yes'";
	}
	else{
		$where_cond = "AND cm_register.category = '".$cat."'";
	}
	if($cat1=='all')
	{
		$where_cond = '';
		
	}
	
	$lim_val_all = $app->cmx->get_cat_seat('all',$sbv,$sb); 
	
$sql_db="SELECT  `cm_register` . * , cm_last_exam . * 
FROM  `cm_register` 
LEFT JOIN  `cm_last_exam` ON cm_register.id = cm_last_exam.reg_id 
WHERE  `cm_register`.`enq_class` =  '".$sbv."' 
AND  `cm_register`.`cm_academic_year` =  '".$sb."' 
AND  `cm_last_exam`.`exam_name1` =  '3' AND `cm_register`.`status` = 'Processing' ORDER BY    `cm_last_exam`.`percen_new` DESC";// LIMIT ".$lim_val_all;


	 $obj_model_hm = $app->load_model("cm_register");
	 $result = $obj_model_hm->execute("SELECT",false,$sql_db);
	 $cond_id = "int_class=".$sbv." and int_acd_year=".$sb;
	 $get_init_id = $app->cmx->get_field("cm_initiate","id",$cond_id);
	 $sql_mm="select * from merit_master where init_no=".$get_init_id;
	 $obj_model_mm = $app->load_model("merit_master");
	  $result_mm = $obj_model_mm->execute("SELECT",false,"","init_no=".$get_init_id);
	 
	if(count($result_mm)>0)
		{
			//echo "first";
			//print_r($result_mm);
			//exit;
				if($result_mm[0]['status']=='Close')
				{
					$msg="Admission close";
				}
				else
				{
					$update_field=array();
					$update_field['total_merit'] = $result_mm[0]['total_merit'] + 1;
					$update_field['seat'] = $result_mm[0]['	seat'] - count($result);
					if($update_field['seat']==0)
					{
						$update_field['status'] = 'Close';
					}
					else
					{
						$update_field['status'] = 'Open';
					}
				
					$update_field['updated_on'] = time();
					
					$obj_model_log = $app->load_model("cm_initiate",$result_mm[0]['id']);
					$obj_model_log->map_fields($update_field);
					$ins=$obj_model_log->execute("UPDATE");
				}
		}
		else
		{
			//echo $sql_db;
			//print_r($result);
			//exit;
			$update_field=array();
			$update_field['class_no'] = $sbv;
			$update_field['total_merit'] = 1;
			$update_field['acd_year'] = $sb;
			$update_field['seat'] = 0;
			if($update_field['seat']==0)
			{
				$update_field['status'] = 'Close';
			}
			else
			{
				$update_field['status'] = 'Open';
			}
			
			$update_field['init_no'] = $get_init_id;
			$update_field['added_on'] = time();
			$update_field['added_by'] = $_SESSION['StaffID'];
			
			$obj_model_log = $app->load_model("merit_master");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			
			$i=0+1;
			$g_seat_1 = 0;
			$sc_seat_1 = 0;
			$st_seat_1 = 0;
			$ph_seat_1 = 0;
			$obq_seat_1 = 0;
			$sebc_seat_1 =0;
			$mgmt_seat_1 =0;
			foreach($result as $row)
			{
				
				if(($g_seat_1<$g_seat && $row['category']=='open' && $row['ph_status']!='ph_yes') || ($sebc_seat_1<$sebc_seat && $row['category']=='sebc' && $row['ph_status']!='ph_yes') || ($obq_seat_1<$obq_seat && $row['category']=='ob' && $row['ph_status']!='ph_yes') || ($sc_seat_1<$sc_seat && $row['category']=='sc' && $row['ph_status']!='ph_yes') || ($st_seat_1<$st_seat && $row['category']=='st' && $row['ph_status']!='ph_yes') || ($mgmt_seat_1<$mgmt_seat && $row['category']=='mtmt' && $row['ph_status']!='ph_yes') || ($ph_seat_1<$ph_seat && $row['ph_status']=='ph_yes')){
					//echo "CAtegory:".$row['category'];
					$months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
					$pas_year_arr = explode("-",$row['pass_year1']);
					$year_new='';
					foreach($months as $k_m=>$v_m)
					{
						if($k_m==$pas_year_arr[0]){
							$year_new.=$v_m;
						}
					}
					$year_no=1989;
					for($mj=0;$mj<=29;$mj++)
					{
						if($mj==$pas_year_arr[1])
						{
							$year_new.="-".$year_no;
						}
						$year_no++;
						
					}
				$merit_data = array();
				$merit_data['merit_master'] = $ins;
				$merit_data['merit_no'] = $i;
				$merit_data['reg_no'] = $row['reg_id'];
				$merit_data['Name'] = $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
				$merit_data['cat_name'] = $row['category'];
				$merit_data['board'] = $row['board_name1'];
				$merit_data['obt_marks'] = $row['obtained_marks_new'];
				$merit_data['total_marks'] = $row['total_marks1'];
				$merit_data['per'] = $row['cgpa_grade'];
				$merit_data['year'] = $year_new;//$row['pass_year1'];
				$merit_data['status'] = 'New';
				$merit_data['added_on'] =  time();
				$merit_data['addeb_by'] = $_SESSION['StaffID'];
			
				
			
				$obj_model_merit = $app->load_model("cm_meritlist");
				$obj_model_merit->map_fields($merit_data);
				$ins_1=$obj_model_merit->execute("INSERT");	
				
				$exam_reg = array();
				$exam_reg['status'] = 'New';
				$obj_model_reg = $app->load_model("cm_register",$row['reg_id']);
				$obj_model_reg->map_fields($exam_reg);
				$obj_model_reg->execute("UPDATE");
				if($row['category']=='open' && $row['ph_status']!='ph_yes')				{	
					$g_seat_1++;	
				}
				if($row['category']=='sebc' && $row['ph_status']!='ph_yes')				{	
					$sebc_seat_1++;
				}	
				if($row['category']=='ob' && $row['ph_status']!='ph_yes')				{		
							$obq_seat_1++;
				}		
				if($row['category']=='sc' && $row['ph_status']!='ph_yes')				{	
					$sc_seat_1++;
				}
				if($row['category']=='st' && $row['ph_status']!='ph_yes')				{		
					$st_seat_1++;
				}
				if($row['category']=='mgmt' && $row['ph_status']!='ph_yes')				{		
					$mgmt_seat_1++;
				}	
				if($row['ph_status']=='ph_yes')				{	
					$ph_seat_1++;	
				}	
				$i++;
				}
				
				
			}
			
			
			$msg="First Merit Created Successfully.";
		}
	$sql_excel="SELECT  `cm_meritlist` . *,cm_register.reg_no as form_no FROM  `cm_meritlist` 
LEFT JOIN  `cm_register` ON cm_meritlist.reg_no = cm_register.id
WHERE  `cm_register`.`enq_class` =  '".$sbv."'
AND  `cm_register`.`cm_academic_year` =  '".$sb."'

".$where_cond."
ORDER BY  `cm_meritlist`.`merit_no` ASC LIMIT ".$lim_val;	
		
	$obj_model_hm = $app->load_model("cm_meritlist");
	 $result = $obj_model_hm->execute("SELECT",false,$sql_excel);
	 if(count($result)>0)
	 {
		 	
			$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads=array("Sr. No.","Form No.","Merit No","Student Name","Category","BOARD","Obt. Marks","Total Marks","Per. Of 12'th","Year of Passing");
			
			$i=0+1;
			foreach($result as $row)
			{
				$report_array[]=array(
						"sr"=>$i,
						"form_no"=>$row["form_no"],
						"merit_no"=>$row["merit_no"],
						"name"=>$row["Name"],
						"cat_name"=>$row["cat"],
						"board"=>$row["board"],
						"obt_markss"=>$row["obt_marks"],
						"tot_marks"=>$row["total_marks"],
						"per_12"=>$row["per"],
						"pass_year"=>$row["year"]
						
						);
			$i++;
			}
			
			$array_field=array();
			
	$data_array=$report_array;
	$fields=array("sr","form_no","merit_no","name","cat_name","board","obt_markss","tot_marks"	,"per_12","pass_year");
		
		$excel_postfix="merit_".time();
		$filename="report_".$excel_postfix;
		
		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
		
		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
		
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
		
				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	
			
			
			
	 }
	
	
	
	?>