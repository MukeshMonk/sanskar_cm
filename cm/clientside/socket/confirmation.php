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
	$quota_sel=$app->getPostVar('quota_sel');
	$fiter_condition="";
	//echo $cl_id;
	//exit;
	if($acd_year_sel!="")
	{
		$fiter_condition.=" and cm_register.cm_academic_year='".$acd_year_sel."'";
	}
	if($class_sel!="")
	{
		$fiter_condition.=" and cm_register.enq_class='".$class_sel."'";
	}
	if($status!="")
	{
		$fiter_condition.=" and cm_register.status='".$status."'";
	}
	if($quota_sel!="")
	{
		$fiter_condition.=" and cm_confirmation.quota='".$quota_sel."'";
	}
	$filter_date=$app->getPostVar('filter_date');
	$filter_date2=$app->getPostVar('filter_date2');
	if($filter_date!="" && $filter_date2!="")
	{
		$fiter_condition.=" and (cm_confirmation.adm_date BETWEEN '".$filter_date."' AND '".$filter_date2."')";
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
	{
		if($sb=="cm_register.first_name")		{			$cond=' and (cm_register.first_name like "%'.$sbv.'%" or cm_register.middle_name like "%'.$sbv.'%" or cm_register.last_name like "%'.$sbv.'%")';		}
		else{			$cond=' and '.$sb.' like "%'.$sbv.'%"';		}
	}
	else
	{
		$cond='';
	}
	$ipp=10;
	$sql="SELECT distinct  cm_register.*,cm_confirmation.id as  cnf_id,cm_confirmation.cnf_no,cm_confirmation.adm_date FROM  cm_register LEFT JOIN cm_meritlist ON cm_meritlist.reg_no=cm_register.id LEFT JOIN cm_confirmation ON cm_register.id=cm_confirmation.reg_id WHERE cm_meritlist.id!=0 ".$cond.$fiter_condition.$ord_cond;
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
		$adm_code=$row['reg_no'];
		//$acd_year=$row['acd_year'];
		$class_id= $app->cmx->class_name($row['enq_class']);
		$acd_year_name =  $app->cmx->get_acd_year_name($row['cm_academic_year']);
		$cnf_no=$row['cnf_no'];
		$adminno=$row['cnf_id'];
		$mobile_no=$row['mobile_no'];
		$reg_date=$row['reg_date'];
		$adm_date=$row['adm_date'];
		$name=$row['last_name']." ".$row['first_name']." ".$row['middle_name'];
		$merit_no=$app->cmx->getMeritListNum($row['id']);//$row['meritno'];
		if($cnf_no=='')
		{
			$cnf_no_text='Not Generated';
		}
		else
		{
			$cnf_no_text=$cnf_no;
		}
		if($adminno=='')
		{
			$edit_text='<li><a href="'.CMX_ROOT.'/admissionentry/confirm/new/'.$id_enc.'/" ><i class="glyphicon glyphicon-edit"></i> Confirm</a></li>';
		}
		else
		{
			$adminno_enc=$app->cmx->encrypt($adminno,ency_key);
			$edit_text='<li><a href="'.CMX_ROOT.'/admissionentry/confirm/new/edit/'.$adminno_enc.'/" ><i class="glyphicon glyphicon-edit"></i> Edit</a></li>';
		}
		$action='<div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-primary"><i class="fa fa-cog"></i> </button>
                                        <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">
                                          <span class="caret"></span>
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                        '.$edit_text.'
                                          
                                        </ul>
                                      </div>';
		$html.="<tr>";
$html.=" <td><label class=\"custom-checkbox-item\">";
        $html.=" <input class=\"custom-checkbox bulk-checkbox delAll\" name=\"del[]\" type=\"checkbox\" data-stat=\"".$stat."\" name=\"inv_select\" value=\"".$id_enc."\">";
        $html.="<span class=\"custom-checkbox-mark\"></span></label></td>";
		$html.="<td>{$sr}</td>";
		$html.="<td>{$status}</td>";
		$html.="<td>{$acd_year_name}</td>";
		$html.="<td>{$class_id}</td>";
		$html.="<td>{$adm_code}</td>";
		$html.="<td>{$merit_no}</td>";
		$html.="<td>{$cnf_no_text}</td>";
		$html.="<td>{$name}</td>";
		$html.="<td>{$mobile_no}</td>";
		$html.="<td>{$reg_date}</td>";
		$html.="<td>{$adm_date}</td>";
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
	$html="<td colspan=\"14\" style=\"padding:15px 30px\">No records found!</td>";
	$page_counter='';
}

$pagination.= "<div class='page-nav'>";
$pagination.= $obj_page->renderFullNav();
$pagination.= "</div>";	
echo $obj_JSON->encode(array("RESULT"=>"OK", "HTML"=>$html,"pagi_btn"=>$pagination,'page_counter'=>$page_counter,"qry"=>$sql));					
	
?>