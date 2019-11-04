<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$conn = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	$page=$app->getPostVar('page');
	$method=$app->getPostVar('connector');
	$sb=$app->getPostVar('sb');
	$sbv=$app->getPostVar('sbv');
	$sort_field=$app->getPostVar('sort_field');
	$sort_field_value=$app->getPostVar('sort_field_value');
	$status=$app->getPostVar('status_sel');
	$acd_year_sel=$app->getPostVar('acd_year_sel');
	$class_sel=$app->getPostVar('class_sel');
	$total_merit=$app->getPostVar('total_merit');
	$fiter_condition="";
	//echo $cl_id;
	//exit;
	if($acd_year_sel!="")
	{
		$fiter_condition.=" and cm_confirmation.acd_year='".$acd_year_sel."'";
	}
	if($total_merit!="")
	{
		$fiter_condition.=" and cm_confirmation.merit_master_no='".$total_merit."'";
		//$fiter_condition2=" where merit_master.total_merit='".$total_merit."'";
	}
		$ord_cond='';
		$cond='';
	$ipp=10;
	$sql="SELECT  count(cm_confirmation.id) as filled_seat,cm_confirmation.init_no as init_id_cnf,cm_confirmation.quota,cm_confirmation.acd_year as class_year,cm_confirmation.class_no as class_id ,cm_confirmation.status  FROM  cm_confirmation WHERE cm_confirmation.id!=0 and cm_confirmation.status!='Admission Rejected' ".$cond.$fiter_condition.$ord_cond." GROUP BY  cm_confirmation.class_no,cm_confirmation.quota";
	//$sql="SELECT  count(cm_confirmation.id) as filled_seat,cm_confirmation.init_no as init_id_cnf,quota_master.quota_name as quota,cm_confirmation.acd_year as class_year,cm_confirmation.class_no as class_id ,cm_confirmation.status  FROM  quota_master LEFT JOIN cm_confirmation ON cm_confirmation.quota=quota_master.quota_name   WHERE   cm_confirmation.status!='Admission Rejected' ".$cond.$fiter_condition.$ord_cond." GROUP BY  cm_confirmation.class_no,quota_master.quota_name";
	$obj_page = $app->load_module("PS_Pagination");
	$pager=$obj_page->PS_Pagination( $conn, $sql, 10, 4, null,$page ,$method);
	$rs = $obj_page->paginate(); 
	//get retrieved rows to check if
	//there are retrieved data
	$num = mysql_num_rows( $rs );
	
	if($num >= 1 ){     
	//creating our table header
	
	$html='';
	if($page==1)
	{
	$i=1;
	}
	else
	{
	$i=($ipp*($page-1))+1;	
	}
	//looping through the records retrieved
	
	while($row = mysql_fetch_array( $rs ))
	{
		
		$sr=$i;
		$id=$row['id'];
		$id_enc=$app->cmx->encrypt($row['id'],ency_key);
		//$acd_year=$row['acd_year'];
		$class_id= $app->cmx->class_name($row['class_id']);
		$acd_year_name =  $app->cmx->get_acd_year_name($row['class_year']);
		$cat_tot_seat =  $app->cmx->getCatSeatById($row['quota'],$row['init_id_cnf']);
		$filled_seat=$row['filled_seat'];
		$cat_name=$row['quota'];
		$remain_seat = $cat_tot_seat-$row['filled_seat'];
		if($cat_name=='ob')
		{
			$cat_name='Other Board';
		}
		elseif($cat_name=='mgmt')
		{
			$cat_name='Management';
		}
		elseif($cat_name=='sc')
		{
			$cat_name='SC';
		}
		elseif($cat_name=='ST')
		{
			$cat_name='ST';
		}
		elseif($cat_name=='sebc')
		{
			$cat_name='SEBC';
		}
		elseif($cat_name=='open')
		{
			$cat_name='Open';
		}
		
		
		$html.="<tr>";
		$html.="<td>{$sr}</td>";
		$html.="<td>{$acd_year_name}</td>";
		$html.="<td>{$class_id}</td>";
		$html.="<td>{$cat_name}</td>";
		$html.="<td>{$cat_tot_seat}</td>";
		$html.="<td>{$filled_seat}</td>";
		$html.="<td>{$remain_seat}</td>";
		$html.="</tr>";	 	
	$i++;	
	}       
			$counter=$obj_page->pagination_counters();
			$total_pages=$counter['total_pages'];
			$current_page=$counter['current_page'];
			$page_counter='Showing '.$current_page.' of '.$total_pages;	
}else{
	//if no records found
	$html="<td colspan=\"14\" style=\"padding:15px 30px\">No records found!</td>";
	$page_counter='';
}

$pagination.= "<div class='page-nav'>";
$pagination.= $obj_page->renderFullNav();
$pagination.= "</div>";	
echo $obj_JSON->encode(array("RESULT"=>"OK", "HTML"=>$html,"pagi_btn"=>$pagination,'page_counter'=>$page_counter,"qry"=>$sql));					
	
?>