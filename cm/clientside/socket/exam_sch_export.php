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



	 

	 $sql="SELECT `exam_schedule`.*,cm_course.course_name,cm_subjects.subject_name FROM `exam_schedule` LEFT JOIN cm_course ON exam_schedule.cource_id=cm_course.id LEFT JOIN cm_subjects ON exam_schedule.sub_id=cm_subjects.id	WHERE exam_schedule.id!=0 and exam_schedule.status!='2' ".$cond.$ord_cond;
	


	 $obj_model_hm = $app->load_model("exam_schedule");

	 $result = $obj_model_hm->execute("SELECT",false,$sql);

	 

	 if(count($result)>0)

	 {

		 	$app->no_html=true;

			$obj_excel = $app->load_module("PHPExcel");

			//SETUP EXCEL HEADS

			$ExeclHeads=array("Sr.","Course","Subject","Acdemy Year","Semester","Division","Activity Name","Activity Date","Max Marks","Marks Submission Date");

			

			$i=0+1;

			foreach($result as $row)

			{

				
				$report_array[]=array(

						"sr"=>$i,

						"course_name"=>$row["course_name"],

						"subject_name"=>$row['subject_name'],

						"acd_year_id"=>$app->cmx->getAnyfield($row['acd_year_id'],'cm_academicyears','short_name'),
						"sem_id"=>$app->cmx->getAnyfield($row['sem_id'],'cm_semesters','name'),
						"div_id"=>$app->cmx->getAnyfield($row['div_id'],'cm_divisions','name'),
						"act_name"=>$row['act_name'],
						"act_date"=>$row['act_date'],
						"max_mark"=>$row['max_mark'],
						"m_sub_date"=>$row['m_sub_date']

						);

			$i++;

			}

			

			$array_field=array();

			

	$data_array=$report_array;

	$fields=array("sr","course_name","subject_name","acd_year_id","sem_id","div_id","act_name","act_date","max_mark","m_sub_date");

		

		$excel_postfix="designations_".time();

		$filename="report_".$excel_postfix;

		

		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);

		

		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';

		

		$url=SERVER_ROOT.'/cm/download.php?f='.$path;

		

				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	

			

			

			

	 }

	

	

	

	?>