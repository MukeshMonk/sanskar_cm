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
	
	
	if($sort_field!="" && $sort_field_value!="")
	{
		$ord_cond=" order by ". $sort_field." ".$sort_field_value;
	}
	else
	{
		$ord_cond='';
	}
	
	if($sb!="" && $sbv!="")
	{					$cond=' and '.$sb.' like "%'.$sbv.'%"';	
	}
	else
	{
		$cond='';
	}
	if($_SESSION['Role']=='3')
					{
						$user_cond=" and cm_subjects.id in  (select subject from staff where login_user_id='".$_SESSION['StaffID']."')";	
					}
					else {
						$user_cond='';
					}

	$ipp=10;
	$sql="SELECT  `cm_exam_subjects`.*,exam_schedule.acd_year_id,exam_schedule.cource_id,exam_schedule.term_id,cm_subjects.subject_name FROM `cm_exam_subjects` LEFT JOIN exam_schedule ON exam_schedule.id=cm_exam_subjects.exam_id LEFT JOIN cm_subjects ON cm_exam_subjects.sub_id=cm_subjects.id  WHERE exam_schedule.is_attendance='No' ".$user_cond." and cm_exam_subjects.id!=0 and exam_schedule.status!='2' and cm_exam_subjects.status!='2' ".$cond.$ord_cond; 
	/*$sql="SELECT `exam_schedule`.*,cm_terms.name as term_name,cm_subjects.subject_name,cm_classes.abbreviation as clss_name FROM `exam_schedule` LEFT JOIN cm_classes ON exam_schedule.cource_id=cm_classes.id LEFT JOIN cm_subjects ON exam_schedule.sub_id=cm_subjects.id LEFT JOIN cm_terms ON exam_schedule.term_id=cm_terms.id WHERE exam_schedule.id!=0 and exam_schedule.status!='2' ".$cond.$ord_cond;*/
	
	$obj_page = $app->load_module("PS_Pagination");
	$pager=$obj_page->PS_Pagination($conn,$sql, 10, 4, null,$page ,$method);
	
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
		$year_name=$app->cmx->getAnyfield($row['acd_year_id'],'cm_academicyears','short_name');
		$class_name=$app->cmx->getAnyfield($row['cource_id'],'cm_classes','abbreviation');
		$term_name=$app->cmx->getAnyfield($row['term_id'],'cm_terms','name');
		
		
		$course_name=$row['clss_name'];
		$sub_name=$row['subject_name'];
		$max_mark=$row['term_name'];
		$act_date=$row['act_date'];
		$m_sub_date=$row['term_name'];
		$enter_mark_btn='<a href="'.CMX_ROOT.'/examination/enter_marks/add/'.$id_enc.'/"><i class="glyphicon glyphicon-edit"></i> Enter Marks</a>';
		$dwnld_btn='<a href="javascript:void(0);" class="call_export" data-id="'.$id_enc.'"  ><i class="fa fa-download"></i> View/Download</a>';
		
		$html.="<tr>";
		$html.=" <td><label class=\"custom-checkbox-item\">";
        $html.=" <input class=\"custom-checkbox bulk-checkbox delAll\" name=\"del[]\" type=\"checkbox\" data-stat=\"".$stat."\" name=\"inv_select\" value=\"".$id_enc."\">";
        $html.="<span class=\"custom-checkbox-mark\"></span></label></td>";
		$html.="<td>{$sr}</td>";
		$html.="<td>{$enter_mark_btn}</td>";
		$html.="<td>{$dwnld_btn}</td>";
		$html.="<td>{$year_name}</td>";
		$html.="<td>{$class_name}</td>";
		$html.="<td>{$term_name}</td>";
		
		
		$html.="<td>{$sub_name}</td>";
		
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

$pagination.= "<div class='page-nav'>";
$pagination.= $obj_page->renderFullNav();
$pagination.= "</div>";	
echo $obj_JSON->encode(array("RESULT"=>"OK", "HTML"=>$html,"pagi_btn"=>$pagination,'page_counter'=>$page_counter,"qry"=>$sql));					
	
?>