<?php 
	$jsonclass = $app->load_module("Services_JSON");

	$page=$app->getPostVar('page');
	$method=$app->getPostVar('method');
	$sb=$app->getPostVar('sb');
	$sbv=$app->getPostVar('sbv');
	$cat1=$app->getPostVar('cat');
	$sort_field=$app->getPostVar('sort_field');
	$sort_field_value=$app->getPostVar('sort_field_value');
	$acd_year_sel=$app->getPostVar('acd_year_sel');
	$class_sel=$app->getPostVar('class_sel');
	$total_merit=$app->getPostVar('total_merit');
	if($acd_year_sel!="" && $class_sel!='' && $total_merit!=''){
			$sql_db="SELECT  * FROM  `merit_master` WHERE  `acd_year` =  '".$acd_year_sel."' AND class_no =  '".$class_sel."' AND  total_merit =  '".$total_merit."'";// LIMIT ".$lim_val_for_merit;
			 $obj_model_hm = $app->load_model("merit_master");
			 $result = $obj_model_hm->execute("SELECT",false,$sql_db);
			if(count($result)>0){
			$msg="Merit View Successfully.";
		$excel_postfix="merit_year".$acd_year_sel."_class".$class_sel."_merit".$total_merit;
		$filename="report_".$excel_postfix;
		$ext="xls";
		$path=ABS_PATH.''.$app->get_user_config("meritlistfiles").$filename.'.xls';
		$url=SERVER_ROOT.'/cm/download.php?f='.$path;
		echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	
		}
		else
		{
			$msg="No Data Found";
			echo $jsonclass->encode(array("RESULT"=>"Failed","MSG"=>$msg));
		}
	}
	else
		{
			$msg="Select Year Class and Merit";
			echo $jsonclass->encode(array("RESULT"=>"Failed","MSG"=>$msg));
		}
	?>