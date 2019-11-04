<?php
			$sbv=$app->getPostVar('sbv');
	$sort_field=$app->getPostVar('sort_field');
	$sort_field_value=$app->getPostVar('sort_field_value');
			$report = "SELECT * from cm_classes where status != 2";

			$obj_pro=$app->load_model('cm_classes');

	  		$rs_pro=$obj_pro->execute("SELECT",false,$report);
		$arr_order=array();
		$arr_order[]='x';
		for($i=0;$i<count($rs_pro);$i++)
		{
			$arr_order[] = $rs_pro[$i]['abbreviation'];
			
		}

echo json_encode(array("class_n"=>$arr_order));
?>