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
	{
		$cond=' and '.$sb.' like "%'.$sbv.'%"';
	}
	else
	{
		$cond='';
	}

	$ipp=10;
	
	$sql="SELECT `cm_smstemplates`.* FROM `cm_smstemplates` WHERE id!=0 and status!=2".$cond.$ord_cond;
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
		$message=$row['message'];
		$name=$row['name'];
				
		$status=$row['status'];
		
		if($status==0)
		{
			$status_btn='<button type="button" class="btn btn-xs btn-success">Active</button>';
		}
		else
		{
			$status_btn='<button type="button" class="btn btn-xs btn-default">Inactive</button>';
		}
		
		$last_updated=$row['last_updated'];
		$lastupdated=$last_updated==0?date('d-m-Y',$row['added_on']):date('d-m-Y',$row['last_updated']);

				
		
		
		$action='<div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-primary">Action</button>
                                        <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">
                                          <span class="caret"></span>
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="javascript:void(0);"  
										onclick="javascript:edit_smstemplates(\''.$id_enc.'\')"><i class="glyphicon glyphicon-edit"></i> Edit</a></li>
                                          <li><a href="javascript:void(0);"  onclick="javascript:confrim_del_ajax({\'ac_id\':\''.$id_enc.'\', \'connector\':\'delete_smstemplates\'})"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>
                                        </ul>
                                      </div>';
			
			
		
	

		$html.="<tr>";
$html.=" <td><label class=\"custom-checkbox-item\">";
        $html.=" <input class=\"custom-checkbox bulk-checkbox delAll\" name=\"del[]\" type=\"checkbox\" data-stat=\"".$stat."\" name=\"inv_select\" value=\"".$id_enc."\">";
        $html.="<span class=\"custom-checkbox-mark\"></span></label></td>";
		$html.="<td>{$sr}</td>";        
        $html.="<td>{$name}</td>";
        $html.="<td>{$message}</td>";        
        $html.="<td>{$lastupdated}</td>";
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
//page-nav class to control
//the appearance of our page 
//number navigation
$pagination.= "<div class='page-nav'>";
//display our page number navigation
$pagination.= $obj_page->renderFullNav();
$pagination.= "</div>";


	
echo $obj_JSON->encode(array("RESULT"=>"OK", "HTML"=>$html,"pagi_btn"=>$pagination,'page_counter'=>$page_counter,"qry"=>$sql));					
	
?>