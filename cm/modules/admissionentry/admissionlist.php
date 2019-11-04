<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">Admission Confirmation </h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Setup</a></li>
            <li class="active">List</li>
          </ol>
        </div>
        <div class="panel-body">
        <div class="filters-top">
      <div class="row">
       <div class="col-md-8">
       <div class="row">
        <div class="col-md-4">
        <div class="form-group">
         <label for="field-1" class="control-label">Academic Year</label>
          <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control sel_year gen_conditionalval", "values"=>$this->app->academic_year_dd), "acd_year_sel");?>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
         <label for="field-1" class="control-label">Class.</label>
           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control sel_class gen_conditionalval", "values"=>$this->app->class_dd), "class_sel");?>

        </div>
       </div>
        <div class="col-md-4">
        <div class="form-group">
         <label class="control-label">Status</label>
         <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control sel_class gen_conditionalval", "values"=>array(""=>"Select Status","Registration Done - Fees Pending"=>"Registration Done - Fees Pending","Registration Done - Fees Paid"=>"Registration Done - Fees Paid","Admission Granted"=>"Admission Granted","Admission Rejected"=>"Admission Rejected")), "status_sel");?>

        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
         <label class="control-label">Quota</label>
         <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control sel_class gen_conditionalval", "values"=>array(""=>"Select Quota","open"=>"Open","sc"=>"SC","st"=>"ST","sebc"=>"SEBC","ob"=>"Other Board","mgmt"=>"Management")), "quota_sel");?>

        </div>
        </div>
       </div>
       </div>
       
	   
       
       <div class="col-md-4">
       
       <div class="row">
        <div class="col-md-6">
        <div class="form-group">
         <label for="field-1" class="control-label">From Date</label>
         <div class="input-group date">
          <input id="filter_date" name="filter_date" type="text" value="" class="form-control indatepicker2 gen_conditionalval">
          <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
        </div>
        </div>
        
        <div class="col-md-6">
        <div class="form-group">
         <label for="field-1" class="control-label">To Date</label>
         <div class="input-group date">
          <input id="filter_date2" name="filter_date2" type="text" value="" class="form-control indatepicker2 gen_conditionalval">
          <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
        </div>
       </div>
       </div>
       
       </div>
	   
       
       
      </div>
     </div>
          <div class="row mb20">
            
            <div class="col-md-10 col-sm-12 search-container padding-bottom15">
              <div class="input-group"> <span class="input-group-btn ui-select">
                <select class="form-control" id="search_by">
                   	  <option value="cm_register.first_name">Name</option>				  <option value="cm_confirmation.adm_date">Admission Date</option>
                </select>
                </span>
               
                <input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach Name or Date(DD-MM-YYYY)">
                <span class="input-group-btn">
                <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>
                </span> </div>
            </div>
            <div class="col-md-2 col-sm-12 actions-container padding-bottom15"><!--<a class="btn btn-danger btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" data-act="muliple_delete" data-connector="delselected_initiate"  title="Delete"><i class="fa fa-trash-o"></i></a>--> <a class="btn btn-default btn-default-custom pull-right"    href="javascript:void(0);" onclick="dizzi_exporter('1','admission_export');"><i class="fa fa-download"></i></a> </div>
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
                <th style="width:12%;" class="sort-column">Status</th>
                <th style="width:12%;" class="sort-column">Academic Year</th>
                <th style="width:12%;" class="sort-column">Class Name</th>
                <th style="width:12%;" class="sort-column">Registration no<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_register.id" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_register.id" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
               <th style="width:12%;" class="sort-column">merit list no<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_meritlist.merit_no" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_meritlist.merit_no" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">admission number<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_confirmation.id" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_confirmation.id" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">name<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_register.last_name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_register.last_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Student mob</th>
                <th style="width:12%;" class="sort-column">Registration Date<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_register.reg_date" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_register.reg_date" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">confirmation date<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_confirmation.adm_date" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_confirmation.adm_date" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:5%;">Action</th>
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
