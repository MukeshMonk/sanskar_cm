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
		$fiter_condition.=" and merit_master.acd_year='".$acd_year_sel."'";
	}
	if($class_sel!="")
	{
		$fiter_condition.=" and merit_master.class_no='".$class_sel."'";
	}
	if($total_merit!="")
	{
		$fiter_condition.=" and merit_master.total_merit='".$total_merit."'";
	}
	if($status!="")
	{
		$fiter_condition.=" and cm_register.status='".$status."'";
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
	$sql="SELECT  cm_meritlist.*,merit_master.acd_year as class_year,merit_master.class_no as class_id,merit_master.total_merit as tmm,cm_register.reg_no as rgno,cm_register.status as rgstatus FROM  cm_meritlist LEFT JOIN merit_master ON cm_meritlist.merit_master=merit_master.id LEFT JOIN cm_register ON cm_meritlist.reg_no=cm_register.id  WHERE cm_meritlist.id!=0 ".$cond.$fiter_condition.$ord_cond;
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
		$status=$row['rgstatus'];
		$adm_code=$row['rgno'];
		//$acd_year=$row['acd_year'];
		$class_id= $app->cmx->class_name($row['class_id']);
		$acd_year_name =  $app->cmx->get_acd_year_name($row['class_year']);
		$mobile_no=$row['mobile_no'];
		$reg_date=$row['reg_date'];
		$adm_date=$row['adm_date'];
		$cat_name=$row['cat_name'];
		$tmm=$row['tmm'];
		$stream_pass=$row['stream_pass'];
		$name=$row['Name'];
		$merit_no=$row['merit_no'];
		if($cnf_no=='')
		{
			$cnf_no_text='Not Generated';
		}
		else
		{
			$cnf_no_text=$cnf_no;
		}
		if($row['board']!='1')
		{
			$cat_name.=" - Other Board";
		}
		if($row['stream_pass']=='1')
		{
			$strm_text="SCIENCE";
		}
		elseif($row['stream_pass']=='2')
		{
			$strm_text="COMMERCE";
		}
		else
		{
			$strm_text="ARTS";
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
		$html.="<td>{$sr}</td>";
		$html.="<td>{$status}</td>";
		$html.="<td>{$adm_code}</td>";
		$html.="<td>{$merit_no}</td>";
		$html.="<td>{$tmm}</td>";
		$html.="<td>{$name}</td>";
		$html.="<td>{$acd_year_name}</td>";
		$html.="<td>{$class_id}</td>";
		$html.="<td>{$cat_name}</td>";
		$html.="<td>{$strm_text}</td>";
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