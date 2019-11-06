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
    $markattandence_id=$app->getPostVar('markattandence_id');
    $class_id=$app->getPostVar('class_id');
	$add_date=$app->getPostVar('add_date');
	
	
	if($sort_field!="" && $sort_field_value!="")
	{
		$ord_cond=" order by ". $sort_field." ".$sort_field_value;
	}
	else
	{
		$ord_cond=' order by id_no asc';
	}
	
	if($sb!="" && $sbv!="")
	{
		$cond=' and '.$sb.' like "%'.$sbv.'%"';
		
	}
	else
	{
		$cond='';
		
	}

	$ipp=70;
	$sql="SELECT `student`.* FROM `student` WHERE id!=0 and cm_class_id=".$class_id."  ".$cond.$ord_cond;
	//echo $sql; exit;
	$obj_page = $app->load_module("PS_Pagination");
	$pager=$obj_page->PS_Pagination( $conn, $sql, 70, 4, null,$page ,$method);
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
		// $name=$row['name'];
		$id_enc=$app->cmx->encrypt($row['id'],ency_key);
		$student_atten_check=$app->cmx->check_student_attendence($id,date('Y-m-d',$add_date));
		
		$df=$app->cmx->get_status_for_attandenace($markattandence_id);


		
        $check_leave=count($student_atten_check);

		//echo "<pre>"; print_r($student_atten_check);  exit;
		$html.='<input type="hidden" name="student_id1[]" value="'.$row['id'].'"/>';
		$html.='<input type="hidden" name="course1[]" value="'.$row['cm_course'].'"/>';
		$html.='<input type="hidden" name="sem1[]" value="'. $row['sem'].'"/>';
        $html.='<input type="hidden" name="add_date1[]" value="'.date('Y-m-d',$add_date).'"/>';
        
		$html.='<tr>';					
		$html.='<td>'.$sr.'</td>';
		$html.='<td>'.$row['id_no'].'</td>';
		$html.='<td>'.$row['name'].'</td>';
		$html.='<td>'.date('Y-m-d',$add_date).'</td>';
        $html.='<td>';

        $status_array1=array(""=>"Select Status","Present"=>"Present","Absent"=>"Absent","Official Leave"=>"Official Leave","Medical Leave"=>"Medical Leave");
        $status_array=array(""=>"Select Status","Present"=>"Present","Absent"=>"Absent");
 
		//echo "<pre>"; print_r($selected_vallue); exit;
					if($check_leave>0)
					{						
						$selected_vallue=$student_atten_check[0]['default_status']; 
						
						$maxatten_id=$student_atten_check[0]['id']; 
						
						if($selected_vallue=='Official Leave' || $selected_vallue=='Medical Leave')
						{				
							$disabled="disabled";
						}
						else
						{
							$disabled="";
						}
							$remark=$student_atten_check[0]['remarks'];
					}
					else
					{
						$selected_vallue=$df;$disabled="";	
									
						$remark="";
						$maxatten_id="";
					}
					
					
					if($disabled!="")
					{	
						$html.=$app->cmx->buildInsideTag("select", array("class"=>"select2 w150","id"=>"default_status",  "name"=>"default_status11[]","values"=>$status_array1,"selected"=>$selected_vallue,"disabled"=>"disabled"),"");
						$app->cmx->buildInsideTag("input",array("type"=>"hidden","name"=>"default_status1[]","id"=>"default_status_".$maxatten_id,"value"=>"NA"),"");
					}
					else
					{
						
						$html.=$app->cmx->buildInsideTag("select", array("class"=>"select2  w150","id"=>"default_status",  "name"=>"default_status1[]","values"=>$status_array,"selected"=>$selected_vallue),"");
					}
					
					
                    $html.='</td>';
                    $html.='<td><input type="text" class="form-control" name="remarks1[]" value="'.$remark.'"/></td>';		
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