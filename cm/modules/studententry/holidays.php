<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">Leave Detail Entry</h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Setup</a></li>
            <li class="active">Leave Detail Entry</li>
          </ol>
        </div>
        
        <div class="panel-body">
          
        <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_holidays");?>
        <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"frm_holidays"), "act");?>
   
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">             
				<label for="field-1" class="control-label">Select Date </label>               
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">             
              <div class='input-group date'>
				<input id="to_date" name="from_date"type="text" value="" class="form-control indatepicker">
                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> 
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">             
				<label for="field-1" class="control-label">To : </label>               
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">             
              <div class='input-group date'>
				<input id="to_date" name="to_date"type="text" value="" class="form-control indatepicker">
                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> 
              </div>
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-12">
        	<div class="form-group">        		
				<button type="submit" class="btn btn-info waves-effect waves-light" id="" name='populatedate' value="populatedate">Populate Date</button>
				<button type="submit" class="btn btn-info waves-effect waves-light" id="" name='holidayform-save' value="holidayform-save">Save</button>
				<button type="submit" class="btn btn-info waves-effect waves-light" id="" name='reset' value="reset">Reset</button>
        	</div>
	      </div>
        </div>
        
        
        
        
        <?php
        if(count($this->app->alldaysfroholidays))
       	{
        ?>
        <div class="row">
        	<table class="table table-bordred">
        		
        		<tr>
        			<th>Mark Date</th>
        			<th>Day</th>
        			<th>Marked As</th>
        			<th>Last Modified By</th>
        			<th>Last Modified Date</th>
        		</tr>
        		<?php
        		
        		foreach($this->app->alldaysfroholidays as $day)
				{
        		?>
        		<input type="hidden" name="holiday_dates[]" value="<?php echo date('Y-m-d',strtotime($day)); ?>" />
        		<tr>
        			<td><?php echo $day; ?></td>
        			<td><?php echo date('D', strtotime($day)); ?></td>        			
        			<td>
        				<input type="text" name='holidayname[]' 
        				value="<?php if(date('w', strtotime($day)) == 0){ echo "Sunday"; }else{ $marked_as = $this->app->cmx->holiday_updated_on(date('Y-m-d',strtotime($day))); echo $marked_as[0]['marked_as']; }  ?>" />
        			</td>
        			<td><?php echo $this->app->cmx->holiday_modified_by(date('Y-m-d',strtotime($day))); ?></td>
        			<td>
        			<?php 
        				$updated_on = $this->app->cmx->holiday_updated_on(date('Y-m-d',strtotime($day)));
						echo date('j F Y H :i:s', $updated_on[0]['updated_on']);
					?></td>
        		</tr>
        		<?php } ?>
        	</table>
        </div>  
        <?php } ?>
        
        
        
        <?=$this->app->htmlBuilder->closeForm()?>  
        </div>
        <!-- panel-body --> 
        
      </div>
    </div>
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content--> 


