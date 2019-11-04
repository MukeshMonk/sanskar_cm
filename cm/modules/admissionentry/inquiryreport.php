<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">Inquiry Report</h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Report</a></li>
            <li class="active">Inquiry</li>
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
       <div class="col-md-3">
        <div class="form-group">
         <label for="field-1" class="control-label">Class.</label>
           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control change_vallue_new sel_class gen_conditionalval", "values"=>$this->app->branch_dds), "class_sel");?>

        </div>
       </div>
       <div class="col-md-3">
        <div class="form-group">
         <label class="control-label">Status</label>
         <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control change_vallue_new sel_class gen_conditionalval", "values"=>array("Enquire Done"=>"Enquire Done","Online Pending"=>"Online Pending","Registration Done - Fees Pending"=>"Registration Done - Fees Pending","Registration Done - Fees Paid"=>"Registration Done - Fees Paid","Admission Granted"=>"Admission Granted","Admission Rejected"=>"Admission Rejected")), "status_sel");?>

        </div>
       </div>
       <div class="col-md-2">
        <div class="form-group">
         <label for="field-1" class="control-label">From Date</label>
         <div class="input-group date">
          <input id="filter_date" name="filter_date" type="text" value="" class="form-control indatepicker2 gen_conditionalval">
          <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
        </div>
       </div>
	   <div class="col-md-2">
        <div class="form-group">
         <label for="field-1" class="control-label">To Date</label>
         <div class="input-group date">
          <input id="filter_date2" name="filter_date2" type="text" value="" class="form-control indatepicker2 gen_conditionalval">
          <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
        </div>
       </div>
       
            <!--<div class="col-md-12 col-sm-12 search-container padding-bottom15">
              <div class="input-group"> <span class="input-group-btn ui-select">
                <select class="form-control" id="search_by">
                  <option value="name">Class</option>
                </select>
                </span>
               
                <input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach word">
                <span class="input-group-btn">
                <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>
                </span> </div>
            </div>-->
            <div class="col-md-8 col-sm-12 search-container padding-bottom15">
              <?php /*?><div class="input-group"> <span class="input-group-btn ui-select w30">
                 <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 sel_class", "values"=>$this->app->branch_dds), "class_sel");?>
                </span>
               <span class="input-group-btn ui-select w30">
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 sel_year", "values"=>$this->app->academic_year_dds), "acd_year_sel");?>
                </span>
               <!-- <span class="input-group-btn ui-select">
                <select id="category" name="category" class="form-control">
                <option value="0" >Select Merit No</option>
              	</select>
                </span>-->
                
                 </div><?php */?>
            </div>
            <div class="col-md-4 col-sm-12 actions-container padding-bottom15"> <a class="btn btn-success btn-default-custom md-trigger pull-left view-cnf-list" href="javascript:void(0);" onclick="cf_datapager('1','inquiryreport');" > View Report</a>  <a class="btn btn-default btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" onclick="dizzi_exporter('1','inquiryreport_export');"><i class="fa fa-download"></i></a> </div>
          </div>
          <table class="table table-striped table-bordered" id="cf_table_list" data-method="inquiryreport">
            <thead>
              <tr>
                
                <th style="width:5%;" class="sort-column"> <input type="hidden" name="filters" id="filters" value="" />
                  <input type="hidden" name="sort_colums" id="sort_colums" value="" />
                  <input type="hidden" name="sort_field" id="sort_field" value="" />
                  <input type="hidden" name="sort_field_value" id="sort_field_value" value="" />
                  <input type="hidden" name="conditional_val" id="conditional_val" value='{"cl_id":"","year_id":"3","status_sel":"Enquire Done"}' />Sr.</th>

                <th style="width:12%;" class="sort-column">Status<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.status" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.status" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Academic Year<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.acd_year" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.acd_year" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Class Name<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.enq_class" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.enq_class" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Enquiries No<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.enq_no" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.enq_no" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Name<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.last_name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.last_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Mobile</th>

                <th style="width:12%;" class="sort-column">Enquiry Date<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.enq_date" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.enq_date" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
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


