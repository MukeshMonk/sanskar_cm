
<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">Daily Attendance Report</h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Setup</a></li>
            <li class="active">Daily Attendance Report</li>
          </ol>
        </div>
        <?php echo $this->app->utility->get_message();?>
        <div class="panel-body">
          <div class="row mb20">
            <div class="col-md-6 col-sm-12 search-container padding-bottom15">
              <div class="input-group"> 
                <!-- <span class="input-group-btn ui-select">
	                <select class="form-control" id="search_by">                  
	                  <option value="cm_academicyears.academic_year">Academy Year</option>
	                  <option value="cm_sections.section_name">Section</option>
	                </select>
                </span> -->
<!--                <div class="col-md-12">
                  <div class="form-group">
                    <div class='input-group date'>
                      <input id="search_by" name="attandence_report_date"type="text" value="" class="form-control indatepicker">
                      <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
                  </div>
                </div>
-->              
<input type="text" id="search_by" name="attandence_report_date" class="form-control indatepicker" placeholder="Serach word"> 
                <span class="input-group-btn">
                <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>
                </span> </div>
            </div>
            <div class="col-md-6 col-sm-12 actions-container padding-bottom15"> 
              <!-- <a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void(0)" data-toggle="modal" data-target="#con-close-modal"><i class="fa fa-plus"></i> Add New</a> --> 
              <a class="btn btn-danger btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" data-act="muliple_delete" data-connector="delselected_markattandences"  title="Delete"><i class="fa fa-trash-o"></i></a> <a class="btn btn-default btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" onclick="dizzi_exporter('1','dailyattandencereports_export');"><i class="fa fa-download"></i></a> </div>
          </div>
          <table class="table table-striped table-bordered" id="cf_table_list" data-method="markattandences">
            <thead>
              <tr>
                <th  style="width:1%;">Sr No. 
                  <!-- <label class="custom-checkbox-item">
	                  <input name="checkbox" type="checkbox" class="custom-checkbox checkAll" />
	                  <span class="custom-checkbox-mark"></span> 
	                </label> -->
                  
                  <input type="hidden" name="filters" id="filters" value="" />
                  <input type="hidden" name="sort_colums" id="sort_colums" value="" />
                  <input type="hidden" name="sort_field" id="sort_field" value="" />
                  <input type="hidden" name="sort_field_value" id="sort_field_value" value="" />
                </th>
                <th style="width:5%;" class="sort-column">Class</th>
                <th style="width:5%;" class="sort-column">Total Student</th>
                <th style="width:5%;" class="sort-column">Present Student</th>
                <th style="width:5%;" class="sort-column">Leave Student</th>
                <th style="width:8%;" class="sort-column">Absent Student</th>
                <!-- <th style="width:8%;" class="sort-column">Suspend</th> --> 
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