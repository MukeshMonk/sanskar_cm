
<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
<?php 
if($this->app->display_table != '')
{
	if($this->app->display_table == "notfound")
	{			
		echo "<div style='border: 1px solid #b9b9b9;padding: 10px;'> Data Not Found. </div>"; 
	}else
	{	
?>
	<? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "updateattandence");?>
    <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"updateattandence"), "act");?>
    <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->cmx->curPageURL()),"returnUrl");?>

    
    <?php echo $this->app->display_table; ?> 
	<div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_markattandences">Save</button>
    </div>
	<?=$this->app->htmlBuilder->closeForm()?>
	<?php
}}else
{
?>
<!-- <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content"> -->
      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "edit_report");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"edit_report"), "act");?>
            
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><span>Edit</span> <strong>Monthly Attendance</strong> </h4>
      </div>
      <div class="modal-body">
                
        <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label  class="control-label">Academy Year<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->academic_year_dd), "academicyear1");?>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <label  class="control-label">Course</label>
      		  <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->course_dd), "course_id");?>
            </div>
          </div>         
        </div>
        <div class="row">          
          <div class="col-md-6">
	        <div class="form-group">
	          <label  class="control-label">Semester<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->sem_dd), "sem1");?>
            </div>
          </div>
          <div class="col-md-6">
	        <div class="form-group">
	          <label  class="control-label">Division<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->division_dd), "division1");?>
            </div>
          </div>
        </div>
        
       <div class="row">
      	  <div class="col-md-6">
	        <div class="form-group">
	        	<label for="field-1" class="control-label">From Date</label>
	          <div class='input-group date'>	          	
				<input id="from_date" name="from_date"type="text" value="" class="form-control indatepicker">
	            <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> 
	          </div>
	        </div>
	      </div>
	      <div class="col-md-6">
	        <div class="form-group">
	        	<label for="field-1" class="control-label">To Date</label>
	          <div class='input-group date'>	          	
				<input id="to_date" name="to_date"type="text" value="" class="form-control indatepicker">
	            <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> 
	          </div>
	        </div>
	      </div>
      </div>
      
      <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label  class="control-label">Class<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->class_dd), "class1");?>
            </div>
          </div> 
          <div class="col-md-6">
	        <div class="form-group">
	          <label  class="control-label">Percentage<span class="mandatory">*</span></label>
			  <input type="text" class="form-control required" id="percentage" name="percentage">
            </div>
          </div>          
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_markattandences">Generate Report</button>
        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_markattandences">Generate Letter</button>
      </div>
      <?=$this->app->htmlBuilder->closeForm()?>
    <!-- </div>
  </div>
</div> -->
<?php } ?>
 	</div>
  </div>
</div>