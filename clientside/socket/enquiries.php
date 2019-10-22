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
	$acd_year_sel=$app->getPostVar('acd_year_sel');
	$class_sel=$app->getPostVar('class_sel');
	$status=$app->getPostVar('status_sel');

	$fiter_condition="";
	if($acd_year_sel!="")
	{
		$fiter_condition.=" and cm_enquiries.acd_year='".$acd_year_sel."'";
	}
	else
	{
		$fiter_condition.=" and cm_enquiries.acd_year='4'";
	}
	if($class_sel!="")
	{
		$fiter_condition.=" and cm_enquiries.enq_class='".$class_sel."'";
	}
	if($status!="")
	{
		$fiter_condition.=" and cm_enquiries.status='".$status."'";
	}
	/*$stud_type=$app->getPostVar('stud_type');
	if($stud_type!="")
	{
		$fiter_condition.=" and cm_enquiries.student_type='".$stud_type."'";
	}*/
	$filter_date=$app->getPostVar('filter_date');
	$filter_date2=$app->getPostVar('filter_date2');
	if($filter_date!="" && $filter_date2!="")
	{
		$fiter_condition.=" and (cm_enquiries.enq_date BETWEEN '".$filter_date."' AND '".$filter_date2."')";
	}

	

	if($sort_field!="" && $sort_field_value!="")
	{
		$ord_cond=" order by ". $sort_field." ".$sort_field_value;
	}
	else
	{
		$ord_cond='';
	}
	if($sb!="" && $sbv!="")
	{		if($sb=="cm_enquiries.first_name")		{			$cond=' and (cm_enquiries.first_name like "%'.$sbv.'%" or cm_enquiries.middle_name like "%'.$sbv.'%" or cm_enquiries.last_name like "%'.$sbv.'%")';		}
		else{			$cond=' and '.$sb.' like "%'.$sbv.'%"';		}
		
	}
	else
	{
		$cond='';
	}

	$ipp=10;
	$sql2="SELECT COUNT(cm_enquiries.id) AS tot_enq,cm_classes.abbreviation as class_name_new FROM `cm_enquiries` LEFT JOIN cm_classes ON cm_enquiries.enq_class=cm_classes.id LEFT JOIN cm_register ON cm_enquiries.id=cm_register.enq_no WHERE cm_enquiries.id!=0 AND (cm_enquiries.status='Deleted' OR cm_enquiries.status='Enquire Done' OR cm_enquiries.status='Online Pending')".$cond.$fiter_condition.$ord_cond;
	$student_count = $app->load_model("cm_register");
	$total_stu = $student_count->execute("SELECT",false,$sql2);
	$sql="SELECT `cm_enquiries`.*,cm_register.id as reg_id_new,cm_classes.abbreviation as class_name_new FROM `cm_enquiries` LEFT JOIN cm_classes ON cm_enquiries.enq_class=cm_classes.id LEFT JOIN cm_register ON cm_enquiries.id=cm_register.enq_no WHERE cm_enquiries.id!=0 AND (cm_enquiries.status='Deleted' OR cm_enquiries.status='Enquire Done' OR cm_enquiries.status='Online Pending')".$cond.$fiter_condition.$ord_cond;
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
		$status=$row['status'];
		$adm_code=$row['enq_no'];
		$acd_year=$row['acd_year'];
		$class_name=$row['class_name_new'];
		$acd_year_name =  $app->cmx->get_acd_year_name($acd_year);
		//$class_name =  $app->cmx->class_name($class_id);
		//$course_name =  $app->cmx->get_course_name($branch);
		//$added_on=date('Y-m-d',$row['added_on']);
		$inq_fees=$row['inq_fees'];
		$adm_form_fees=$row['adm_form_fees'];
		$adm_fees=$row['last_name']." ".$row['first_name']." ".$row['middle_name'];
		
		$dop=$row['mobile_no'];
		$un_date=$row['enq_date'];
		$reg_id_new=$row['reg_id_new'];
		
		/*if($status=='Open')
		{
			$status_btn='<button type="button" class="btn btn-xs btn-success">Open</button>';
		}
		else
		{
			$status_btn='<button type="button" class="btn btn-xs btn-default">Close</button>';
		}*/
		
		$action='<div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-primary"><i class="fa fa-cog"></i> </button>
                                        <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">
                                          <span class="caret"></span>
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">';
										if($reg_id_new=='')
										{
											
											$action.='<li><a href="javascript:void(0);"  
										onclick="javascript:edit_enquiries(\''.$id_enc.'\')"><i class="glyphicon glyphicon-edit"></i>Enquiry Edit</a></li>';
										if($status!='Deleted')
										{
											$action.='<li><a href="'.CMX_ROOT.'/admissionentry/registration/add/'.$id_enc.'/"  
										><i class="glyphicon glyphicon-edit"></i> Registration</a></li>';
										$action.='<li><a href="javascript:void(0);"  onclick="javascript:confrim_del_ajax({\'ac_id\':\''.$id_enc.'\', \'connector\':\'delete_enquiries\'})"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>';
										}
										}
										else
										{
											
												$reg_id_new_enc=$app->cmx->encrypt($reg_id_new,ency_key);
												$action.='<li><a href="'.CMX_ROOT.'/admissionentry/registration/add/edit/'.$reg_id_new_enc.'/"  ><i class="glyphicon glyphicon-edit"></i>Registration Edit</a></li>';
											
										}
                                        $action.='</ul>
                                      </div>';
		$html.="<tr>";
$html.=" <td><label class=\"custom-checkbox-item\">";
        $html.=" <input class=\"custom-checkbox bulk-checkbox delAll\" name=\"del[]\" type=\"checkbox\" data-stat=\"".$stat."\" name=\"inv_select\" value=\"".$id_enc."\">";
        $html.="<span class=\"custom-checkbox-mark\"></span></label></td>";
		$html.="<td>{$sr}</td>";
		$html.="<td>{$status}</td>";
		$html.="<td>{$acd_year_name}</td>";
		$html.="<td>{$class_name}</td>";
		$html.="<td>{$adm_code}</td>";
		$html.="<td>{$adm_fees}</td>";
		$html.="<td>{$dop}</td>";
		$html.="<td>{$un_date}</td>";
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
echo $obj_JSON->encode(array("RESULT"=>"OK", "HTML"=>$html,"pagi_btn"=>$pagination,'page_counter'=>$page_counter,"qry"=>$sql,"qry2"=>$total_stu[0]['tot_enq']));					
	
?>