
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
        <div id="markattandences_response"></div>
        <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label  class="control-label">Academic Year<span class="mandatory">*</span></label>
	          <input type="text" class="form-control required" value="<?php echo date('Y'); ?>" disabled>
 			  <input type="hidden" class="form-control required" id="academic_year1" name="academic_year1" value="<?php echo date('Y'); ?>">
			</div>
         </div>
         <div class="col-md-6">
	        <div class="form-group">
	          <label  class="control-label">Section<span class="mandatory">*</span></label>
	          <select name="report_month" id="report_month" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
				<option value="">Select Month</option>
				<option value="1">Jan</option>
				<option value="2">Fen</option>
				<option value="3">Mar</option>
				<option value="4">Apr</option>
				<option value="5">May</option>
				<option value="6">Jun</option>
				<option value="7">July</option>
				<option value="8">Aug</option>
				<option value="9">Sep</option>
				<option value="10">Oct</option>
				<option value="11">Nov</option>
				<option value="12">Dec</option>
			  </select>
			</div>
        </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label  class="control-label">Course<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->course_dd), "course1");?>
            </div>
          </div>
          <div class="col-md-6">
	        <div class="form-group">
	          <label  class="control-label">Semester<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->sem_dd), "sem1");?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
	        <div class="form-group">
	          <label  class="control-label">Division<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->division_dd), "division1");?>
            </div>
          </div>          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_markattandences">Save</button>
      </div>
      <?=$this->app->htmlBuilder->closeForm()?>
    <!-- </div>
  </div>
</div> -->
<?php } ?>
 	</div>
  </div>
</div>