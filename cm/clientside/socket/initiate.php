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
	if($acd_year_sel!="")
	{
		$fiter_condition.=" and int_acd_year='".$app->cmx->year_id($acd_year_sel)."'";
	}
	
	$class_sel=$app->getPostVar('class_sel');
	
	if($class_sel!="")
	{
		$fiter_condition.=" and int_class='".$app->cmx->class_id($class_sel)."'";
	}
	$status=$app->getPostVar('status');
	if($status!="")
	{
		$fiter_condition.=" and status='".$status."'";
	}
	
	$filter_date=$app->getPostVar('filter_date');
	
	if($filter_date!="")
	{
		$fiter_condition.=" and dop='".$filter_date."'";
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

		$cond=' and '.$sb.' like "%'.$sbv.'%"';

	}

	else

	{

		$cond='';

	}



	$ipp=10;

	

	$sql="SELECT `cm_initiate`.* FROM `cm_initiate`	WHERE cm_initiate.id!=0 ".$cond.$fiter_condition.$ord_cond;
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

		$adm_code=$row['adm_code'];

		$acd_year=$row['acd_year'];
$acd_year =  $app->cmx->get_acd_year_name($row['int_acd_year']);
		$class_id=$app->cmx->class_name($row['int_class']);

		//$added_on=date('Y-m-d',$row['added_on']);

		$inq_fees=$row['inq_fees'];

		$adm_form_fees=$row['adm_form_fees'];

		$adm_fees=$row['adm_fees'];

		$dop=$row['dop'];

		$un_date=$row['un_date'];

		

		if($status=='Open')

		{

			$status_btn='<button type="button" class="btn btn-xs btn-success">Open</button>';

		}

		else

		{

			$status_btn='<button type="button" class="btn btn-xs btn-default">Close</button>';

		}

		

		$action='<div class="btn-group">

                                        <button type="button" class="btn btn-xs btn-primary"><i class="fa fa-cog"></i> </button>

                                        <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">

                                          <span class="caret"></span>

                                          <span class="sr-only">Toggle Dropdown</span>

                                        </button>

                                        <ul class="dropdown-menu pull-right" role="menu">

                                        <li><a href="javascript:void(0);"  

										onclick="javascript:edit_initiate(\''.$id_enc.'\')"><i class="glyphicon glyphicon-edit"></i> Edit</a></li>

                                          <li><a href="javascript:void(0);"  onclick="javascript:confrim_del_ajax({\'ac_id\':\''.$id_enc.'\', \'connector\':\'delete_initiate\'})"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>

                                        </ul>

                                      </div>';

		$html.="<tr>";

$html.=" <td><label class=\"custom-checkbox-item\">";

        $html.=" <input class=\"custom-checkbox bulk-checkbox delAll\" name=\"del[]\" type=\"checkbox\" data-stat=\"".$stat."\" name=\"inv_select\" value=\"".$id_enc."\">";

        $html.="<span class=\"custom-checkbox-mark\"></span></label></td>";

		$html.="<td>{$sr}</td>";

		$html.="<td>{$status_btn}</td>";

		$html.="<td>{$acd_year}</td>";

		$html.="<td>{$class_id}</td>";

		$html.="<td>{$adm_code}</td>";

		 $html.="<td>{$inq_fees}</td>";

		$html.="<td>{$adm_form_fees}</td>";

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

echo $obj_JSON->encode(array("RESULT"=>"OK", "HTML"=>$html,"pagi_btn"=>$pagination,'page_counter'=>$page_counter,"qry"=>$sql));					

	

?>