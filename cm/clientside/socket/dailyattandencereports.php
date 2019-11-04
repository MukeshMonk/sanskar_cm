<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$conn = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	$page=$app->getPostVar('page');
	$method=$app->getPostVar('connector');
	$sb = date("Y-m-d",strtotime($app->getPostVar('sb')));
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
	
	
	
	// if($sb!="" && $sbv!="")
	// {
		// $cond=' and '.$sb.' like "%'.$sbv.'%"';
	// }
	// else
	// {
		// $cond='';
	// }

	
	
	


	$ipp=10;
	
	
	
	$sql="SELECT * FROM `cm_classes` WHERE id!=0 and status!=2".$cond.$ord_cond;
	$obj_page = $app->load_module("PS_Pagination");
	$pager=$obj_page->PS_Pagination( $conn, $sql, 10, 4, null,$page ,$method);
	$rs = $obj_page->paginate(); 
	$num = mysql_num_rows( $rs );
	
	
	
	
	if($num >= 1 ){     
	$html='';
	if($page==1)
	{
		$i=1;
	}
	else
	{
		$i=($ipp*($page-1))+1;	
	}
	
	while($row = mysql_fetch_array( $rs ))
	{
		
		$sr=$i;
		$id=$row['id'];
		$id_enc=$app->cmx->encrypt($row['id'],ency_key);
		$short_name=$row['short_name'];
		$name=$row['name'];
		$class_id=$row['id'];
		
		
		//$totalstudent = $app->cmx->total_student_for_attandence_report($class_id,$sb);
		$totalstudent = $app->cmx->totalstudent_fromclass($class_id);
		$presentstudent = $app->cmx->present_student_for_attandence_report($class_id,$sb);
		$absentstudent = $app->cmx->absent_student_for_attandence_report($class_id,$sb);
		$leavestudent = $app->cmx->leave_student_for_attandence_report($class_id,$sb);
		
		
		
		$html.="<tr>";
		//$html.=" <td><label class=\"custom-checkbox-item\">";
        //$html.=" <input class=\"custom-checkbox bulk-checkbox delAll\" name=\"del[]\" type=\"checkbox\" data-stat=\"".$stat."\" name=\"inv_select\" value=\"".$id_enc."\">";
        //$html.="<span class=\"custom-checkbox-mark\"></span></label></td>";
		$html.="<td>{$sr}</td>";
		$html.="<td>{$name}</td>";
		$html.="<td>{$totalstudent}</td>";
		$html.="<td>{$presentstudent}</td>";
		$html.="<td>{$leavestudent}</td>";
		$html.="<td>{$absentstudent}</td>";
        $html.="</tr>";
		
	$i++;	
	}       
			$counter=$obj_page->pagination_counters();
			$total_pages=$counter['total_pages'];
			$current_page=$counter['current_page'];
			$page_counter='Showing '.$current_page.' of '.$total_pages;


	
}else{
	//if no records found
	$html="<td colspan=\"9\" style=\"padding:15px 30px\">No records found!</td>";
	$page_counter='';
}
//page-nav class to control
//the appearance of our page 
//number navigation
$pagination.= "<div class='page-nav'>";
//display our page number navigation
$pagination.= $obj_page->renderFullNav();
$pagination.= "</div>";


	
echo $obj_JSON->encode(array("RESULT"=>"OK", "HTML"=>$html,"pagi_btn"=>$pagination,'page_counter'=>$page_counter,"qry"=>$sql));					
	
?>