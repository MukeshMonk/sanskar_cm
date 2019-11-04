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
		$ord_cond='  order by exam_schedule.id DESC ';
	}
	
	if($sb!="" && $sbv!="")
	{					$cond=' and '.$sb.' like "%'.$sbv.'%"';	
	}
	else
	{
		$cond='';
	}

	$ipp=10;
	
	$sql="SELECT `exam_schedule`.*,cm_classes.abbreviation as clss_name FROM `exam_schedule` LEFT JOIN cm_classes ON exam_schedule.cource_id=cm_classes.id WHERE exam_schedule.id!=0 and exam_schedule.status!='2' ".$cond.$ord_cond;
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
	
	while($row = mysql_fetch_array( $rs ))
	{
		
		$sr=$i;
		$id=$row['id'];
		$id_enc=$app->cmx->encrypt($row['id'],ency_key);
		$classid_enc=$app->cmx->encrypt($row['cource_id'],ency_key);
		$year_name=$app->cmx->getAnyfield($row['acd_year_id'],'cm_academicyears','short_name');
		$course_name=$row['clss_name'];
		$sub_name=$row['subject_name'];
		$act_name=$row['act_name'];
		$max_mark=$row['max_mark'];
		$act_date=$row['act_date'];
		$m_sub_date=$row['m_sub_date'];
		$terms_btn='<a class="btn btn-info btn-xs btn-default-custom md-trigger pull-left" href="javascript:void(0)"   data-toggle="tooltip" data-title="Subjectt title" data-placement="top" data-original-title="" title="" onclick="loadexam_subject(\''.$classid_enc.'\',\''.$id_enc.'\');"><i class="fa fa-plus"></i> Subject</a>';
		$action='<div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-primary">Action</button>
                                        <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">
                                          <span class="caret"></span>
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="javascript:void(0);"  
										onclick="javascript:edit_exam_sch(\''.$id_enc.'\')"><i class="glyphicon glyphicon-edit"></i> Edit</a></li>
										  <li><a href="javascript:void(0);"  onclick="javascript:confrim_del_ajax({\'ac_id\':\''.$id_enc.'\', \'connector\':\'delete_exam_sch\'})"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>
                                        </ul>
                                      </div>';
		$html.="<tr>";
$html.=" <td><label class=\"custom-checkbox-item\">";
        $html.=" <input class=\"custom-checkbox bulk-checkbox delAll\" name=\"del[]\" type=\"checkbox\" data-stat=\"".$stat."\" name=\"inv_select\" value=\"".$id_enc."\">";
        $html.="<span class=\"custom-checkbox-mark\"></span></label></td>";
		$html.="<td>{$sr}</td>";
		$html.="<td>{$terms_btn}</td>";
		$html.="<td>{$act_name}</td>";
		$html.="<td>{$course_name}</td>";
		$html.="<td>{$year_name}</td>";
		$html.="<td>{$max_mark}</td>";
		$html.="<td>{$action}</td>";
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