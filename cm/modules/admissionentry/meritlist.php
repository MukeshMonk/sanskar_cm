<div class="page-content">
 <div class="container-fluid mt50 dizzilist-block">
  <div class="col-xxl-12 col-md-12">
   <div class="panel panel-default">
    <div class="panel-heading">
     <h4 class="panel-title mb0">Meritlist </h4>
     <ol class="breadcrumb breadcrumb-simple">
      <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
      <li><a href="javascript:void(0);">Setup</a></li>
      <li class="active">List</li>
     </ol>
    </div>
    <div class="panel-body">
     <div class="row mb20">
      <div class="col-md-6 col-sm-12 search-container padding-bottom15">
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
        <div class="col-md-2">
        <div class="form-group">
         <label class="control-label">Merit</label>
         <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control gen_conditionalval", "values"=>array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5")), "total_merit");?>
        </div>
        </div>
       </div>
       <!--<div class="input-group"> <span class="input-group-btn ui-select">
        <select class="form-control" id="search_by">
         <option value="name">Class</option>
        </select>
        </span>
        <input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach word">
        <span class="input-group-btn">
        <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>
        </span> </div>-->
      </div>
      <?php /*?><div class="col-md-8 col-sm-12 search-container padding-bottom15 pr0">
      
       <div class="input-group"> <span class="input-group-btn ui-select w30 pull-leftm10">
        <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 sel_class gen_conditionalval", "values"=>$this->app->branch_dds), "class_sel");?>
        </span> <span class="input-group-btn ui-select w30 pull-leftm10">
        <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 sel_year gen_conditionalval", "values"=>$this->app->academic_year_dds), "acd_year_sel");?>
        </span>
        <span class="input-group-btn ui-select w30 pull-leftm10">
        <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 sel_year gen_conditionalval", "values"=>array(""=>"Select Merit","1"=>"1","3","4","5""1","2","3","4","5")), "total_merit");?>
        </span> <!--<span class="input-group-btn ui-select w30">
        <select id="category" name="category" class="form-control">
         <option value="all"  >All</option>
         <option value="open"  >Open</option>
         <option value="sc" >SC</option>
         <option value="st" >ST</option>
         <option value="sebc" >SEBC</option>
         <option value="ph" >Pphysically handicapped</option>
         <option value="ob" >Other Board</option>
        </select>
        </span>--> </div>
      </div><?php */?>
      <div class="col-md-6 col-sm-12 actions-container padding-bottom15 pl0"> <a class="btn btn-success btn-default-custom md-trigger pull-left btn-connected" href="javascript:void(0);" onclick="dizzi_exporter_merit('1','meritlist_export_new2');" ><i class="fa fa-plus"></i> Generate Merit</a><a class="btn btn-success btn-default-custom md-trigger pull-left btn-connected" href="javascript:void(0);" onclick="cf_datapager('1','meritlist');" >View Merit</a> <a class="btn btn-default btn-default-custom pull-right"   href="javascript:void(0);" onclick="dizzi_exporter('1','download_merit');"><i class="fa fa-download"></i></a> <input type="hidden" name="filters" id="filters" value="" />
         <input type="hidden" name="sort_colums" id="sort_colums" value="" />
         <input type="hidden" name="sort_field" id="sort_field" value="" />
         <input type="hidden" name="sort_field_value" id="sort_field_value" value="" /> </div>
     </div>
     <div class="table-responsive">
     <table class="table table-striped table-bordered" id="cf_table_list" data-method="initiate">
            <thead>
              <tr>
                <th style="width:5%;" class="sort-column"> <input type="hidden" name="filters" id="filters" value="" />
                  <input type="hidden" name="sort_colums" id="sort_colums" value="" />
                  <input type="hidden" name="sort_field" id="sort_field" value="" />
                  <input type="hidden" name="sort_field_value" id="sort_field_value" value="" />
                  <input type="hidden" name="conditional_val" id="conditional_val" value='{"acd_year_sel":"<?php echo $this->app->academic_year_default_int;?>","total_merit":"1"}' />Sr.</th>
                <th style="width:12%;" class="sort-column">Status</th>
                <th style="width:12%;" class="sort-column">Registration no<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_register.id" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_register.id" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Merit list no<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_meritlist.merit_no" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_meritlist.merit_no" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Merit<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_meritlist.merit_no" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_meritlist.merit_no" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">name<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_register.last_name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_register.last_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:12%;" class="sort-column">Academic Year</th>
                <th style="width:12%;" class="sort-column">Class Name</th>
                <th style="width:12%;" class="sort-column">Category</th>
                <th style="width:12%;" class="sort-column">Stream</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
     </div>
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
