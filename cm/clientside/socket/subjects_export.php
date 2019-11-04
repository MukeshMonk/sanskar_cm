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

	 
	 $sql="SELECT `cm_subjects`.*,cm_course.course_name as coursename,cm_semesters.name as semname ,cm_asses_structure.asses_name FROM `cm_subjects` 
	 	  LEFT JOIN cm_course ON cm_course.id = cm_subjects.course
	 	  LEFT JOIN cm_semesters ON cm_semesters.id = cm_subjects.sem
	 	  LEFT JOIN cm_asses_structure ON cm_asses_structure.id = cm_subjects.assessment_type
	 	  WHERE cm_subjects.id!=0 and cm_subjects.status!=2".$cond.$ord_cond;

	 $obj_model_hm = $app->load_model("cm_subjects");
	 $result = $obj_model_hm->execute("SELECT",false,$sql);
	 
	 if(count($result)>0)
	 {
		 	$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads=array("Sr.","Sequence","course","sem","subject_name","subject_code","assessment_type","university_internal_marks","minimum_passing_marks","Status","Added On","Last Updated");
			
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
						"seq"=>$row["seq"],
						"course"=>$row["coursename"],
						"sem"=>$row["semname"],
						"subject_name"=>$row["subject_name"],
						"subject_code"=>$row["subject_code"],
						"assessment_type"=>$row["asses_name"],
						"university_internal_marks"=>$row["university_internal_marks"],
						"minimum_passing_marks"=>$row["minimum_passing_marks"],
						"status"=>$statustext,
						"added_on"=>date('d-m-Y',$row["added_on"]),
						"last_updated"=>$last_updated,
						);
			$i++;
			}
			
			$array_field=array();
			
	$data_array=$report_array;
	$fields=array("sr","seq","course","sem","subject_name","subject_code","assessment_type","university_internal_marks","minimum_passing_marks","status","added_on","last_updated");
		
		$excel_postfix="subjects_".time();
		$filename="report_".$excel_postfix;
		
		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
		
		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
		
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
		
				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	
			
			
			
	 }
	
	
	
	?>