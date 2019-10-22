<?php
if(isset($this->app->display_table) && $this->app->display_table != '')
{
		
?>
<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
    	
		
    	<?php 
    	if($this->app->display_table == "notfound")
		{			
    		echo "<div style='border: 1px solid #b9b9b9;padding: 10px;'> Data Not Found. </div>"; 
		}else
		{		
		?>
			<? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_detailreportexcelexport");?>
	      	<? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"frm_detailreportexcelexport"), "act");?>
	        <input type="hidden" name="detailreportexcelexport" value='<?php echo $this->app->getGetVar('record_id'); ?> ' />

			<?php echo $this->app->display_table; ?>
			
			<div class="col-md-12">
      		<button type="submit" class="btn btn-info waves-effect waves-light" id="">Export Excel</button>
        </div> 
    	<?=$this->app->htmlBuilder->closeForm()?> 
		<?php } ?>
    	
    	
    </div>
  </div>
</div>
<?php }else{ ?>


<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
    <?php if($this->app->display_table==""){ ?>	
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
      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_expreport");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"export_report"), "act");?>
          <div class="row mb20">
            <div class="col-md-6 col-sm-12 search-container padding-bottom15">
              <div class="input-group">               	
                <div class="col-md-12">
		            <div class="form-group">
		              <label  class="control-label">Course</label>
		      		  <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->course_dd), "course_id");?>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <label  class="control-label">Semester</label>
		      		  <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->sem_dd), "sem_id");?>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <label  class="control-label">Division</label>
		      		  <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->division_dd), "division_id");?>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <div class='input-group date'>
		              	<label for="field-1" class="control-label">From Date </label>
						<input id="from_date" name="from_date"type="text" value="" class="form-control indatepicker">
		                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> 
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <div class='input-group date'>
		              	<label for="field-1" class="control-label">To Date</label>
						<input id="to_date" name="to_date"type="text" value="" class="form-control indatepicker">
		                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> 
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <div class="form-group">
			              <label for="field-1" class="control-label">Operator</label>
			          		<select class="select2 select2-hidden-accessible" name="operator">
			          			<option value=""> Select Operator </option>
			          			<option value="less"><</option>
			          			<option value="lesseql"><=</option>
			          			<option value="greter">></option>
			          			<option value="gretereql">>=</option>
			          			<option value="eql">=</option>
			          		</select>
			          </div>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <div class="form-group">
			              <label for="field-1" class="control-label">Value</label>
			              <input type="text" class="form-control required" id="value" name="operatorvalue">
			          </div>
		            </div>
		          </div>
		          
		          <!-- <div class="col-md-12">
		            <div class="form-group">
		              <div class="checkbox">
		                <input id="downloadreport" name="downloadreport" value="1" type="checkbox">
		                <label for="downloadreport">Download Report</label>
		              </div>
		            </div>
		          </div> -->
		          <div class="col-md-12">
		            <div class="form-group">
		              <div class="checkbox">
		                <input id="summeryreport" name="summeryreport" value="1" type="checkbox">
		                <label for="summeryreport">Summery Report</label>
		              </div>
		            </div>
		          </div>               
                  <div class="col-md-12">
                  		<button type="submit" class="btn btn-info waves-effect waves-light" id="">Detail Report</button>
	              </div>               
               </div>
            </div>
            
          </div>
                <?=$this->app->htmlBuilder->closeForm()?>

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
      <?php }else{ ?>
      	<?php echo $this->app->display_table;?>
      	<?php } ?>
    </div>
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content--> 


<?php } ?>


<!-- <div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <table class="table table-striped table-bordered" id="cf_table_list" data-method="jjjj">
            <thead>
              <tr>
                <th style="width:1%;"> <label class="custom-checkbox-item">
                  <input name="checkbox" type="checkbox" class="custom-checkbox checkAll" />
                  <span class="custom-checkbox-mark"></span> </label>
                  <input type="hidden" name="filters" id="filters" value="" />
                  <input type="hidden" name="sort_colums" id="sort_colums" value="" />
                  <input type="hidden" name="sort_field" id="sort_field" value="" />
                  <input type="hidden" name="sort_field_value" id="sort_field_value" value="" />
                </th>
                <th style="width:5%;" class="sort-column">Sr.</th>
                <th style="width:12%;" class="sort-column">ID NO.<span class="sort-wrap"> <a href="#" class="asc" data-field="id_no" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="short_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span> </th>
                <th style="width:12%;" class="sort-column">Name <span class="sort-wrap"> <a href="#" class="asc" data-field="name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:8%;" class="sort-column">Class-Div</th>
                <th style="width:10%;" class="sort-column">Total Present </th>
                <th style="width:10%;" class="sort-column">Total Absent  </th>
                <th style="width:10%;" class="sort-column">Working Days </th>
                <th style="width:10%;" class="sort-column">Percent %  </th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>  
</div> -->
