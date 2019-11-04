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

	 
	 $sql="SELECT `cm_markattandence`.*,
	 cm_academicyears.name as academy_year,
	 cm_sections.section_name,
	 cm_course.course_name,
	 cm_semesters.name as sem_name,
	 cm_divisions.name as division_name
	 from cm_markattandence
	 
	 LEFT JOIN cm_academicyears ON cm_academicyears.id = cm_markattandence.academic_year
	 LEFT JOIN cm_sections ON cm_sections.id = cm_markattandence.section
	 LEFT JOIN cm_course ON cm_course.id = cm_markattandence.course
	 LEFT JOIN cm_semesters ON cm_semesters.id = cm_markattandence.sem
	 LEFT JOIN cm_divisions ON cm_divisions.id = cm_markattandence.division
	 WHERE cm_markattandence.id!=0 and cm_markattandence.status!=2".$cond.$ord_cond;

	 $obj_model_hm = $app->load_model("cm_markattandence");
	 $result = $obj_model_hm->execute("SELECT",false,$sql);
	 
	 if(count($result)>0)
	 {
		 	$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads=array("Sr.","Academic Year","Section","Course","Semester",
			"Division","Default Status","Date","Status","Added On","Last Updated");
			
			$i=0+1;
			$full_price_total=0;
			$nights_total=0;
			$nr_pax=0;
			foreach($result as $row)
			{
				$status=$row["status"];
				
				if($status==0)
				{
					$statustext='Active';
				}
				else
				{
					$statustext='Inactive';
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
						"academic_year"=>$row["academy_year"],
						"section"=>$row["section_name"],
						"course"=>$row["course_name"],
						"sem"=>$row["sem_name"],						
						"division"=>$row["division_name"],
						"default_status"=>$row["default_status"],
						"date"=>date('d-m-Y',$row["add_date"]),					
						"status"=>$statustext,
						"added_on"=>date('d-m-Y',$row["added_on"]),
						"last_updated"=>$last_updated,
						);
			$i++;
			}
			
		$array_field=array();			
		$data_array=$report_array;
		$fields=array("sr","academic_year","section","course","sem","division","default_status","date","status","added_on","last_updated");
		
		$excel_postfix="markattan_".time();
		$filename="report_".$excel_postfix;
		
		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;		
		echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	
	}
	
	
	
	?>