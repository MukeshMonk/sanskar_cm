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
          <h4 class="panel-title mb0">Enter Marks </h4>
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
                <th style="width:5%;" class="sort-column">Sr.</th>
                <th style="width:12%;" class="sort-column">Enter Marks<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_course.course_name" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_course.course_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">PDF Reports<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_course.course_name" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_course.course_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Academic Year<span class="sort-wrap"> <a href="#" class="asc" data-field="act_date" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="act_date" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Class Section<span class="sort-wrap"> <a href="#" class="asc" data-field="act_date" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="act_date" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Term Name<span class="sort-wrap"> <a href="#" class="asc" data-field="act_date" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="act_date" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Subject<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_subjects.subject_name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_subjects.subject_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
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
      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_exam_sch");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"exam_sch_form"), "connector");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->record_id), "record_id");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden","value"=>$this->app->last_id1),"last_id");?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><span>Add</span> <strong>Exam Schedule</strong> </h4>
      </div>
      <div class="modal-body">
        <div id="exam_response"></div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label  class="control-label">Academic Year<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->academic_year_dd,"title"=>"Academic Year Required"), "a_year");?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label  class="control-label">Course<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->branch_dd,"title"=>"Class Required"), "branch");?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label  class="control-label">Semester<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->sem_dd,"title"=>"Class Required"), "sem");?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label  class="control-label">Divisions<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->div_dd,"title"=>"Academic Year Required"), "div1");?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label  class="control-label">Subject<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->sub_dd,"title"=>"Class Required"), "sub");?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label  class="control-label">Term</label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control", "values"=>$this->app->trm_dd,"title"=>"Class Required"), "trm");?>
            </div>
          </div>
        </div>
        <div class="row"> </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Activity Name</label>
              <input type="text" class="form-control required" id="a_name" name="a_name" title="First Name " placeholder="First Name">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Max Marks<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="m_marks" name="m_marks"  placeholder="Middle Name">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Activity Date<span class="mandatory">*</span></label>
              <div class='input-group date'>
                <input id="a_date" name="a_date"type="text" value="" class="form-control indatepicker">
                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Marks Submission Date<span class="mandatory">*</span></label>
              <div class='input-group date'>
                <input id="m_s_date" name="m_s_date"type="text" value="" class="form-control indatepicker">
                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
            </div>
          </div>
        </div>
        <div class="row"> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_exam">Save</button>
      </div>
      <?=$this->app->htmlBuilder->closeForm()?>
    </div>
  </div>
</div>
