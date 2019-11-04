<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$exp_id=$app->getPostVar('exp_id');
	$id_decr=$app->cmx->decrypt($exp_id,ency_key);
	$fiter_condition="";
	
	 $obj_model_hm = $app->load_model("cm_enter_marks");
	 $result = $obj_model_hm->execute("SELECT",false,"SELECT cm_enter_marks.*,cm_classes.abbreviation FROM cm_enter_marks LEFT JOIN cm_classes ON cm_classes.id=cm_enter_marks.class_id WHERE exam_sub_id=".$id_decr);
	 //echo"<pre>"; print_r($result); exit;
	 if(count($result)>0)
	 {
		 	$app->no_html=true;
			$obj_excel = $app->load_module("PHPExcel");
			//SETUP EXCEL HEADS
			$ExeclHeads=array("Sr.","Class Name","ID No.","Student Name","Obtained-Marks");	
			$i=0+1;
			$full_price_total=0;
			$nights_total=0;
			$nr_pax=0;
			foreach($result as $row)
			{
				if($row["default_status"]!=''){
					$marks_txt=$row["default_status"];
				}else{
					$marks_txt=$row["marks"];
				}
				$report_array[]=array("sr"=>$i,
				"stud_id_no"=>$row["stud_id_no"],
				"stud_name"=>$row["stud_name"],
				"abbreviation"=>$row["abbreviation"],
				"marks"=> $marks_txt,);
				$i++;
			}
			$array_field=array();
			$data_array=$report_array;
			$fields=array("sr","abbreviation","stud_id_no","stud_name","marks");		
			$excel_postfix="Marks_".time();
			$filename="report_".$excel_postfix;
			$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);
			$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';
			$url=SERVER_ROOT.'/cm/download.php?f='.$path;
			echo $jsonclass->encode(array("RESULT"=>"SUCCESS","url"=>$url));			 	
	 }
	 else
	 {
		 echo $jsonclass->encode(array("RESULT"=>"Error","MSG"=>"No Data found"));			 	
	 }
	?>