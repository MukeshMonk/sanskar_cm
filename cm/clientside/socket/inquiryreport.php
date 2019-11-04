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
	$cl_id=$app->getPostVar('cl_id');
	$year_id=$app->getPostVar('year_id');
	$cl_id=$app->getPostVar('cl_id');
	$status=$app->getPostVar('status_sel');
	$stud_type=$app->getPostVar('stud_type');
	$filter_date=$app->getPostVar('filter_date');
	$filter_date2=$app->getPostVar('filter_date2');
	$fiter_condition="";
	if($year_id!="")
	{
		$fiter_condition.=" and acd_year='".$year_id."'";
	}
	if($cl_id!="")
	{
		$fiter_condition.=" and enq_class='".$cl_id."'";
	}
	if($status!="")
	{
		$fiter_condition.=" and status='".$status."'";
	}
	if($stud_type!="")
	{
		$fiter_condition.=" and student_type='".$stud_type."'";
	}
	if($filter_date!="" && $filter_date2!="")
	{
		$fiter_condition.=" and (enq_date BETWEEN '".$filter_date."' AND '".$filter_date2."')";
		//echo $fiter_condition;
		//exit;
	}
	
	if($sb!="" && $sbv!="")
	{
		$cond=' and '.$sb.' like "%'.$sbv.'%"';
	}
	else
	{
		$cond='';
	}

	$ipp=10;
	
	$sql="SELECT `cm_enquiries`.* FROM `cm_enquiries`  	WHERE id!=0 ".$cond.$fiter_condition.$ord_cond;
	//echo $sql;
	//exit;
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
	//print_r($rs);
	//exit;
	while($row = mysql_fetch_array( $rs ))
	{
		//echo $row['id'];
		//exit;
		$sr=$i;
		$id=$row['id'];
		$id_enc=$app->cmx->encrypt($row['id'],ency_key);
		$status=$row['status'];
		$adm_code=$row['enq_no'];
		$acd_year=$row['acd_year'];
		$class_id=$row['enq_class'];
		$acd_year_name =  $app->cmx->get_acd_year_name($acd_year);
		$class_name =  $app->cmx->class_name($class_id);
		//$course_name =  $app->cmx->get_course_name($branch);
		//$added_on=date('Y-m-d',$row['added_on']);
		$inq_fees=$row['inq_fees'];
		$adm_form_fees=$row['adm_form_fees'];
		$adm_fees=$row['last_name']." ".$row['first_name']." ".$row['middle_name'];
		
		$dop=$row['mobile_no'];
		$un_date=$row['enq_date'];
		
		
		$html.="<tr>";
		$html.="<td>{$sr}</td>";
		$html.="<td>{$status}</td>";
		$html.="<td>{$acd_year_name}</td>";
		$html.="<td>{$class_name}</td>";
		$html.="<td>{$adm_code}</td>";
		
		$html.="<td>{$adm_fees}</td>";
		$html.="<td>{$dop}</td>";
		$html.="<td>{$un_date}</td>";
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