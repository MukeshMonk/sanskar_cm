<style>
.pac-container {
	z-index: 9999 !important;
}
input[type=text]:focus {
	border: 1px solid #00a8ff;
}
input[type=text]:active {
	border: 1px solid #00a8ff;
}
input[type=text]:hover {
	border: 1px solid #00a8ff;
}
</style>
<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">Exam Schedule </h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Setup</a></li>
            <li class="active">List</li>
          </ol>
        </div>
        <div class="panel-body">
          <div class="row mb20">
            <div class="col-md-8 col-sm-12 search-container padding-bottom15">
              <div class="input-group"> <span class="input-group-btn ui-select">
                <select class="form-control" id="search_by">
                  <option value="cm_course.course_name">Course</option>
                  <option value="cm_subjects.subject_name">Subject</option>
                  <option value="exam_schedule.act_date">Activity Date</option>
                </select>
                </span>
                <input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach word">
                <span class="input-group-btn">
                <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>
                </span> </div>
            </div>
            <div class="col-md-4 col-sm-12 actions-container padding-bottom15">
            <?php 
            //echo $this->app->is_generated; exit;
              if($this->app->is_generated>0){ ?>
              <a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void(0);" id="generate"><i class="fa fa-refresh"></i> Generate</a> 
            <?php  }
            ?>
            <a class="btn btn-danger btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" data-act="muliple_delete" data-connector="delselected_exam_sch"  title="Delete"><i class="fa fa-trash-o"></i></a> <a class="btn btn-default btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" onclick="dizzi_exporter('1','exam_sch_export');"><i class="fa fa-download"></i></a> </div>
          </div>
          <table class="table table-striped table-bordered" id="cf_table_list" data-method="exam_sch">
            <thead>
              <tr>
                <th  style="width:1%;"> <label class="custom-checkbox-item">
                    <input name="checkbox" type="checkbox" class="custom-checkbox checkAll" />
                    <span class="custom-checkbox-mark"></span> </label>
                  <input type="hidden" name="filters" id="filters" value="" />
                  <input type="hidden" name="sort_colums" id="sort_colums" value="" />
                  <input type="hidden" name="sort_field" id="sort_field" value="" />
                  <input type="hidden" name="sort_field_value" id="sort_field_value" value="" />
                  
                </th>
                <th style="width:6%;" class="sort-column">Sr.</th>
                <th style="width:15%;" class="sort-column">Edit Marks<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_course.course_name" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_course.course_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:15%;" class="sort-column">PDF Reports<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_course.course_name" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_course.course_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:15%;" class="sort-column">Academic Year<span class="sort-wrap"> <a href="#" class="asc" data-field="act_date" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="act_date" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:15.5%;" class="sort-column">Class Section<span class="sort-wrap"> <a href="#" class="asc" data-field="act_date" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="act_date" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:23.5%;" class="sort-column">Subject<span class="sort-wrap"> <a href="#" class="asc" data-field="act_date" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="act_date" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
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


