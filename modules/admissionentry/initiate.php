<div class="page-content">
 <div class="container-fluid mt50 dizzilist-block">
  <div class="col-xxl-12 col-md-12">
   <div class="panel panel-default">
    <div class="panel-heading">
     <h4 class="panel-title mb0">Initiate Admission </h4>
     <ol class="breadcrumb breadcrumb-simple">
      <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
      <li><a href="javascript:void(0);">Setup</a></li>
      <li class="active">List</li>
     </ol>
    </div>
    <div class="panel-body">
     <div class="filters-top">
      <div class="row">
       <div class="col-md-3">
        <div class="form-group">
         <label for="field-1" class="control-label">Academic Year</label>
          <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control sel_year gen_conditionalval", "values"=>$this->app->academic_year_dds), "acd_year_sel");?>
        </div>
       </div>
       <div class="col-md-3">
        <div class="form-group">
         <label for="field-1" class="control-label">Class.</label>
           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control sel_class gen_conditionalval", "values"=>$this->app->branch_dds), "class_sel");?>

        </div>
       </div>
       <div class="col-md-3">
        <div class="form-group">
         <label class="control-label">Status</label>
         <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control sel_class gen_conditionalval", "values"=>array("Open"=>"Open","Close"=>"Close")), "status");?>

        </div>
       </div>
       
       <div class="col-md-3">
        <div class="form-group">
         <label for="field-1" class="control-label">Date</label>
         <div class="input-group date">
          <input id="filter_date" name="filter_date" type="text" value="" class="form-control indatepicker1 gen_conditionalval">
          <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
        </div>
       </div>
       
       
      </div>
     </div>
     <div class="row mb20">
      <div class="col-md-6 col-sm-12 search-container padding-bottom15">
       <div class="input-group"> <span class="input-group-btn ui-select">
        <select class="form-control" id="search_by">
         <option value="name">Class</option>
        </select>
        </span>
        <input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach word">
        <span class="input-group-btn">
        <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>
        </span> </div>
      </div>
      
      <div class="col-md-6 col-sm-12 actions-container padding-bottom15"> <a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:voide()" data-toggle="modal" data-target="#con-close-modal"><i class="fa fa-plus"></i> Add New</a> <a class="btn btn-danger btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" data-act="muliple_delete" data-connector="delselected_initiate"  title="Delete"><i class="fa fa-trash-o"></i></a> <a class="btn btn-default btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" onclick="dizzi_exporter('1','initiate_export');"><i class="fa fa-download"></i></a> </div>
     </div>
     <table class="table table-striped table-bordered" id="cf_table_list" data-method="initiate">
      <thead>
       <tr>
        <th  style="width:1%;"> <label class="custom-checkbox-item">
          <input name="checkbox" type="checkbox" class="custom-checkbox checkAll" />
          <span class="custom-checkbox-mark"></span> </label>
         <input type="hidden" name="filters" id="filters" value="" />
         <input type="hidden" name="sort_colums" id="sort_colums" value="" />
         <input type="hidden" name="sort_field" id="sort_field" value="" />
         <input type="hidden" name="sort_field_value" id="sort_field_value" value="" />
          <input type="hidden" name="conditional_val" id="conditional_val" value='{"acd_year_sel":"<?php echo $this->app->academic_year_default_int;?>"}' />
        </th>
        <th style="width:5%;" class="sort-column">Sr.</th>
        <th style="width:180px;" class="sort-column">Status<span class="sort-wrap"> <a href="#" class="asc" data-field="name" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:180px;" class="sort-column">Academic-Year<span class="sort-wrap"> <a href="#" class="asc" data-field="name" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:180px;" class="sort-column">Class-Name<span class="sort-wrap"> <a href="#" class="asc" data-field="name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:180px;" class="sort-column">Admission-Code<span class="sort-wrap"> <a href="#" class="asc" data-field="gender" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="gender" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <!-- <th style="width:12%;" class="sort-column">Creation Date<span class="sort-wrap"> <a href="#" class="asc" data-field="religion" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="religion" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>-->
        <th style="width:180px;" class="sort-column">InquiryForm-Fee<span class="sort-wrap"> <a href="#" class="asc" data-field="religion" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="religion" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:180px;" class="sort-column">AdmissionForm-fee<span class="sort-wrap"> <a href="#" class="asc" data-field="religion" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="religion" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:180px;" class="sort-column">Admission-fee<span class="sort-wrap"> <a href="#" class="asc" data-field="religion" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="religion" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:180px;" class="sort-column">Publish-Date<span class="sort-wrap"> <a href="#" class="asc" data-field="religion" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="religion" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:180px;" class="sort-column">Un-Publish-Date<span class="sort-wrap"> <a href="#" class="asc" data-field="religion" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="religion" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:120px;">Action</th>
       </tr>
      </thead>
      <tbody>
      </tbody>
     </table>
     <div class="row">
      <div class="col-xs-6">
       <div class="dataTables_info" id="paginate_counter"></div>
      </div>
      <div class="col-xs-6">
       <div class="dataTables_paginate paging_simple_numbers" id="paginate_me"> </div>
      </div>
     </div>
    </div>
    
    <!-- panel-body --> 
    
   </div>
  </div>
 </div>
 <!--.container-fluid--> 
</div>
<!--.page-content--> 

<!--****##### MODALS ######****-->

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
 <div class="modal-dialog dialog-width-max">
  <div class="modal-content">
   <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_initiate");?>
   <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"initiate_form"), "connector");?>
   <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->record_id), "record_id");?>
   <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden"), "acd_year");?>
   <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden"), "class_id");?>
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><span>Add</span> <strong>Initiate Admission</strong> </h4>
   </div>
   <div class="modal-body">
    <div id="staff_response"></div>
    <div class="row">
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Admission Code<span class="mandatory">*</span></label>
       <input type="text" class="form-control required" id="adm_code" name="adm_code" title="Admission Code Required" placeholder="Admission Code">
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label  class="control-label">Status<span class="mandatory">*</span></label>
       <select id="status" name="status" class="form-control">
        <option value="Open">Open</option>
        <option value="Close">Close</option>
       </select>
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Total No. of Seats<span class="mandatory">*</span></label>
       <input type="number" class="form-control required" id="no_seat" name="no_seat" title="Total No. of Seats Required" placeholder="Total No. of Seats" >
      </div>
     </div>
    </div>
    <div class="row">
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">General Quota Seats<span class="mandatory">*</span></label>
       <input type="number" class="form-control required tot_change" id="g_seat" name="g_seat" title="General Quota Seats Required" placeholder="General Quota Seats" value="0" >
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">SC Quota seats<span class="mandatory">*</span></label>
       <input type="number" class="form-control required tot_change" id="sc_seat" name="sc_seat" title="SC Quota seats Required" placeholder="SC Quota seats" value="0">
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">ST Quota seats<span class="mandatory">*</span></label>
       <input type="number" class="form-control required tot_change" id="st_seat" name="st_seat" title="ST Quota seats Required" placeholder="ST Quota seats" value="0">
      </div>
     </div>
    </div>
    <div class="row">
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">SEBC Quota seats<span class="mandatory">*</span></label>
       <input type="number" class="form-control required tot_change" id="sebc_seat" name="sebc_seat" title="SEBC Quota seats Required" placeholder="SEBC Quota seats" value="0">
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">PH Quota seats<span class="mandatory">*</span></label>
       <input type="number" class="form-control tot_change" id="ph_seat" name="ph_seat" title="PH Quota seats Required" placeholder="PH Quota seats" value="0">
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Other Board Quota seats<span class="mandatory">*</span></label>
       <input type="number" class="form-control tot_change" id="obq_seat" name="obq_seat" title="Other Board Quota seats" placeholder="Other Board Quota seats" value="0">
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Management Quota seats<span class="mandatory">*</span></label>
       <input type="number" class="form-control tot_change" id="mgmt_seat" name="mgmt_seat" title="Other Board Quota seats" placeholder="Other Board Quota seats" value="0">
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Date of publishing<span class="mandatory">*</span></label>
       <div class='input-group date'>
        <input id="dop" name="dop"type="text" value="" class="form-control indatepicker">
        <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Unpublish Date<span class="mandatory">*</span></label>
       <div class='input-group date'>
        <input id="un_date" name="un_date"type="text" value="" class="form-control indatepicker">
        <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
      </div>
     </div>
    </div>
    <div class="row">
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Inquiry form fee<span class="mandatory">*</span></label>
       <input type="text" class="form-control required" id="inq_fees" name="inq_fees" title="Inquiry form fee Required" placeholder="Inquiry form fee">
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Admission form fee<span class="mandatory">*</span></label>
       <input type="text" class="form-control" id="adm_form_fees" name="adm_form_fees" title="Admission form fee Required" placeholder="Admission form fee">
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Admission fee<span class="mandatory">*</span></label>
       <input type="text" class="form-control" id="adm_fees" name="adm_fees" title="Admission fee Required" placeholder="Admission fee">
      </div>
     </div>
    </div>
    <div class="row">
     <div class="col-md-4">
      <div class="form-group">
       <label  class="control-label">Academic Year<span class="mandatory">*</span></label>
       <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control", "values"=>$this->app->academic_year_dd), "int_acd_year");?>
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label  class="control-label">Class<span class="mandatory">*</span></label>
       <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control", "values"=>$this->app->class_dd), "int_class");?>
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">SMS<span class="mandatory">*</span></label>
       <textarea class="form-control" id="sms" name="sms"></textarea>
      </div>
     </div>
    </div>
    <div class="row">
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Inquiry SMS<span class="mandatory">*</span></label>
       <textarea class="form-control" id="inq_sms" name="inq_sms"></textarea>
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Admission application SMS<span class="mandatory">*</span></label>
       <textarea class="form-control" id="adm_app_sms" name="adm_app_sms"></textarea>
      </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <label for="field-1" class="control-label">Admission confirmation SMS<span class="mandatory">*</span></label>
       <textarea class="form-control" id="adm_cnf_sms" name="adm_cnf_sms"></textarea>
      </div>
     </div>
    </div>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-info waves-effect waves-light" id="save_staff">Save</button>
   </div>
   <?=$this->app->htmlBuilder->closeForm()?>
  </div>
 </div>
</div>
