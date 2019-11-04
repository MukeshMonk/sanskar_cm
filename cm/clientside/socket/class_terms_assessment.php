<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$clsid=$app->getPostVar("clsid");
	$class_id=$app->cmx->decrypt($clsid,ency_key);
	
	$class_name=$app->cmx->class_name($class_id);

	$obj_cm = $app->load_model("cm_terms");
	$rs = $obj_cm->execute("SELECT",false,"","assessment_id='".$class_id."' and status!=2");
	
	$tr_html=' <table class="table table-bordered">
	                            <tr>
	                                <th>Sr.</th>	                                
	                                <th>Name</th>	                                
	                                <th>Marks</th>
	                                <th>Last Updated</th>
	                                <th>Action</th>
	                            </tr>';
	
	
	if(count($rs)>0)
	{
		$i=0;
		foreach($rs as $s)
		{
		$id=$s["id"];		
		$name=$s["name"];		
		$marks=$s["marks"];
		$last_updated=$s['last_updated'];
		
		$lastupdated=$last_updated==0?date('d-m-Y',$s['added_on']):date('d-m-Y',$s['last_updated']);
		$secid_enc=$app->cmx->encrypt($id,ency_key);	
		
		$edit_btn='<a href="javascript:void(0);" onclick="javascript:edit_terms(\''.$secid_enc.'\')" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>';
		$del_btn='<a href="javascript:void(0);" onclick="javascript:del_terms(\''.$secid_enc.'\',\''.$clsid.'\')" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>';
		
		
		$tr_html.='<tr>
	              <td>'.($i+1).'</td>	              
	              <td>'.$name.'</td>	             
	              <td>'.$marks.'</td>
	              <td>'.$lastupdated.'</td>
	              <td>'.$edit_btn.' '.$del_btn.'</td>
	           </tr>';
		$i++;
		}
	}
	else
	{
		$tr_html.='<tr>
	              <td colspan="5">No Terms Added.</td>
	           </tr>';
	}
	
	$tr_html.='</table>';
	
	
	$tr_html.='<form name="frm_terms" id="frm_terms" method="post" enctype="multipart/form-data" action="" class="">
      <input name="connector" id="connector" type="hidden" value="terms_form">
	  <input name="clsid" id="clsid" type="hidden" value="'.$clsid.'">
	  <input name="record_id" id="record_id" type="hidden" value="">
        <div id="terms_response"></div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label">Terms Name<span class="mandatory">*</span></label>
			  '.$app->cmx->buildInsideTag("input", array("type"=>"text","class"=>"form-control required","placeholder"=>"Name", "value"=>""), "name").'
            </div>
          </div>          
        </div>
        <div class="row">          
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label">Marks<span class="mandatory">*</span></label>
			  '.$app->cmx->buildInsideTag("input", array("type"=>"number","class"=>"form-control required","placeholder"=>"Marks", "value"=>""), "marks").'
			  
            </div>
          </div>
        </div>        
      
        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_terms">Save</button>
      </form>';
	  $title_modal=$class_name.' Terms';
	 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","HTML"=>$tr_html,"title_modal"=>$title_modal));			 	
