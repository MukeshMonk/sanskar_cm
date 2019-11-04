<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$conn = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
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

	$ipp=10;
	
	
	$course = $app->getPostvar('course_id');
	$sem = $app->getPostvar('sem_id');
	$division = $app->getPostvar('division_id');
	$from_date = $app->getPostvar('from_date');
	$to_date = $app->getPostvar('to_date');
	$operator = $app->getPostvar('operator');
	$operatorvalue = $app->getPostvar('operatorvalue');
	$dateranges = $app->cmx->createDateRange($from_date, $to_date, $format = "Y-m-d");
	
	
	$filterquery = '';
	if($course != '')
	{
		$filterquery .= " AND cm_attendance.course = ".$course;
	}
	if($sem != '')
	{
		$filterquery .= " AND cm_attendance.sem = ".$sem;
	}
	if($division != '')
	{
		$filterquery .= " AND student.division = ".$division;
	}
	if($from_date != '' &&  $to_date != '')
	{
		$from_date = date('Y-m-d',strtotime($from_date));
		$to_date = date('Y-m-d',strtotime($to_date));
		
		$filterquery .= " AND STR_TO_DATE(DATE_FORMAT(FROM_UNIXTIME(add_date), '%Y-%m-%d'),'%Y-%m-%d') BETWEEN '".$from_date."'  AND '".$to_date."'";
	}
			
	
	
	$sql="SELECT `cm_attendance`.*,student.*,cm_classes.name as class_name,cm_divisions.name as division_name FROM `cm_attendance`
		  LEFT JOIN student ON student.id = cm_attendance.student_id 
		  LEFT JOIN cm_classes ON student.class_id = cm_classes.id
		  LEFT JOIN cm_divisions ON student.division = cm_divisions.id
		  WHERE cm_attendance.id!=0 and cm_attendance.status!=2  ".$filterquery;
	$obj_model_detail_report = $this->app->load_model("cm_academicyears");
	$detail_report_result = $obj_model_detail_report->execute("SELECT",false,$sql);
	$obj_page = $app->load_module("PS_Pagination");
	$pager=$obj_page->PS_Pagination( $conn, $sql, 10, 4, null,$page ,$method);
	$rs = $obj_page->paginate(); 
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
	
	
	while($row = mysql_fetch_array( $rs ))
	{
		$sr=$i;
		$idno=$row['id_no'];		
		$name=$row['name'];
		
			
		$html.="<tr>";
$html.=" <td><label class=\"custom-checkbox-item\">";
        $html.=" <input class=\"custom-checkbox bulk-checkbox delAll\" name=\"del[]\" type=\"checkbox\" data-stat=\"".$stat."\" name=\"inv_select\" value=\"".$id_enc."\">";
        $html.="<span class=\"custom-checkbox-mark\"></span></label></td>";
		$html.="<td>{$sr}</td>";
		$html.="<td>{$idno}</td>";            
        $html.="<td>{$name}</td>";       
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