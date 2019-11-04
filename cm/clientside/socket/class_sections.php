<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$clsid=$app->getPostVar("clsid");
	$class_id=$app->cmx->decrypt($clsid,ency_key);
	
	$class_name=$app->cmx->class_name($class_id);

	$obj_cm = $app->load_model("cm_sections");
	$rs = $obj_cm->execute("SELECT",false,"","class_id='".$class_id."' and status!=2");
	
	$tr_html=' <table class="table table-bordered">
	                            <tr>
	                                <th>Sr.</th>
	                                <th>Section Name</th>
	                                <th>Capacity</th>
	                                <th>Last Updated</th>
	                                <th>Action</th>
	                            </tr>';
	
	
	if(count($rs)>0)
	{
		$i=0;
		foreach($rs as $s)
		{
		$id=$s["id"];
		$name=$s["section_name"];
		$capacity=$s["capacity"];
		$last_updated=$s['last_updated'];
		
		$lastupdated=$last_updated==0?date('d-m-Y',$s['added_on']):date('d-m-Y',$s['last_updated']);
		$secid_enc=$app->cmx->encrypt($id,ency_key);	
		
		$edit_btn='<a href="javascript:void(0);" onclick="javascript:edit_sections(\''.$secid_enc.'\')" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>';
		$del_btn='<a href="javascript:void(0);" onclick="javascript:del_sections(\''.$secid_enc.'\',\''.$clsid.'\')" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>';
		
		
		$tr_html.='<tr>
	              <td>'.($i+1).'</td>
	              <td>'.$name.'</td>
	              <td>'.$capacity.'</td>
	              <td>'.$lastupdated.'</td>
	              <td>'.$edit_btn.' '.$del_btn.'</td>
	           </tr>';
		$i++;
		}
	}
	else
	{
		$tr_html.='<tr>
	              <td colspan="5">No Section Added.</td>
	           </tr>';
	}
	
	$tr_html.='</table>';
	
	
	$tr_html.='<form name="frm_sections" id="frm_sections" method="post" enctype="multipart/form-data" action="" class="">
      <input name="connector" id="connector" type="hidden" value="section_form">
	  <input name="clsid" id="clsid" type="hidden" value="'.$clsid.'">
	  <input name="record_id" id="record_id" type="hidden" value="">
        <div id="sections_response"></div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Section Name<span class="mandatory">*</span></label>
			  '.$app->cmx->buildInsideTag("input", array("type"=>"text","class"=>"form-control required","placeholder"=>"Section Name", "value"=>""), "section_name").'
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Capacity<span class="mandatory">*</span></label>
			  '.$app->cmx->buildInsideTag("input", array("type"=>"number","class"=>"form-control required","placeholder"=>"Capacity", "value"=>""), "capacity").'
			  
            </div>
          </div>
        </div>
      
        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_sections">Save</button>
      </form>';
	  $title_modal=$class_name.' Sections';
	 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","HTML"=>$tr_html,"title_modal"=>$title_modal));			 	
