<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">Admission Report</h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Report</a></li>
            <li class="active">Admission</li>
          </ol>
        </div>
        <div class="panel-body">
          <div class="row mb20">
          <div class="col-md-2">
        <div class="form-group"> 
         <label for="field-1" class="control-label">Academic Year</label>
          <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control change_vallue_new sel_year gen_conditionalval", "values"=>$this->app->academic_year_dds), "acd_year_sel");?>
        </div>
       </div>
	   <div class="col-md-2">
        <div class="form-group">
         <label class="control-label">Merit</label>
         <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control gen_conditionalval", "values"=>array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5")), "total_merit");?>
        </div>
        </div>
            <div class="col-md-8 col-sm-12 search-container padding-bottom15">
            </div>
            <div class="col-md-4 col-sm-12 actions-container padding-bottom15"> <a class="btn btn-success btn-default-custom md-trigger pull-left view-cnf-list" href="javascript:void(0);" onclick="cf_datapager('1','admissionreport');" > View Report</a>  <a class="btn btn-default btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" onclick="dizzi_exporter('1','admissionreport_export');"><i class="fa fa-download"></i></a> </div>
          </div>
          <table class="table table-striped table-bordered" id="cf_table_list" data-method="inquiryreport">
            <thead>
              <tr>
                
                <th style="width:5%;" class="sort-column"> <input type="hidden" name="filters" id="filters" value="" />
                  <input type="hidden" name="sort_colums" id="sort_colums" value="" />
                  <input type="hidden" name="sort_field" id="sort_field" value="" />
                  <input type="hidden" name="sort_field_value" id="sort_field_value" value="" />
                  <input type="hidden" name="conditional_val" id="conditional_val" value='{"total_merit":"1","acd_year_sel":"<?php echo $this->app->academic_year_default_int;?>"}' />Sr.</th>
                <th style="width:12%;" class="sort-column">Academic Year<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.acd_year" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.acd_year" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Class Name<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.enq_class" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.enq_class" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Quota</th>
                 <th style="width:12%;" class="sort-column">Total Seats<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.status" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.status" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Occupied Seats<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.enq_no" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.enq_no" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Vacant Seats<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.last_name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.last_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
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


