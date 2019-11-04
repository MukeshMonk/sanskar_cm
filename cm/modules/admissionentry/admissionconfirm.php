
<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_conf");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"conf_form"), "connector");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->getGetVar("record_id")), "record_id");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->getGetVar("item_id")), "update_id");?>
     
      <? //$this->app->htmlBuilder->buildTag("input", array("type"=>"hidden","value"=>$this->app->last_id),"last_id");?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">Admission Confirm Form </h4>
        </div>
        <div class="panel-body">
          <?php
      $studentedit = isset($this->app->rsstudents)?$this->app->rsstudents:'';
      ?>
          <div id="students_confirm_response"></div>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="field-1" class="control-label">Admission Date<span class="mandatory">*</span></label>
                    <div class='input-group date'>
                      <input id="adm_date" name="adm_date"type="text" value="<?php echo  isset($studentedit['adm_date'])? $studentedit['adm_date'] : ''; ?>" class="form-control indatepicker">
                      <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="field-1" class="control-label">Confirmation No.<span class="mandatory">*</span></label>
                    <input type="text" class="form-control required" id="conf_no" name="conf_no" title="Registration No Required" placeholder="Registration No" value="<?php echo  isset($studentedit['cnf_no'])? $studentedit['cnf_no'] : 'Auto Generate'; ?>" readonly>
                  </div>
                </div>
                <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Name</label>
                <label for="field-1" class="control-label " id="today_age"><?php echo  $this->app->student_name_ml; ?></label>
                <input type="hidden" name="stud_name" value="<?php echo  $this->app->student_name_ml; ?>"  />
              </div>
            </div>
              
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Status</label>
                    <select id="status" name="status" class="form-control sel_class ">
                <option value="Admission Granted" <?php echo  ($this->app->student_ml_status == "Admission Granted" )? 'selected="selected"' : ''; ?> >Admission Granted</option>
                <option value="Admission Rejected" <?php echo  ($this->app->student_ml_status == "Admission Rejected" )? 'selected="selected"' : ''; ?> >Admission Rejected</option>
              	
              </select>
                  </div>
                </div>
                <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Academic year</label>
                <label for="field-1" class="control-label " id="today_age"><?php echo  $this->app->student_year_ml; ?></label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Class</label>
                <label for="field-1" class="control-label " id="today_age2"><?php echo  $this->app->student_class_ml; ?></label>
              </div>
            </div>
          </div>
          <div class="row">
          	
            <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Class Section<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 required", "values"=>$this->app->class_section_dd,"title"=>"Class Section Required"), "class_section");?>
              </div>
            </div>
            <div class="col-md-4">
                  <div class="form-group">
                    <label for="field-1" class="control-label">Fee Applicable Date<span class="mandatory">*</span></label>
                    <div class='input-group date'>
                      <input id="fee_appl_date" name="fee_appl_date" type="text" value="<?php echo  isset($studentedit['fee_appl_date'])? $studentedit['fee_appl_date'] : ''; ?>" class="form-control indatepicker">
                      <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="field-1" class="control-label">Joining Date<span class="mandatory">*</span></label>
                    <div class='input-group date'>
                      <input id="join_date" name="join_date"type="text" value="<?php echo  isset($studentedit['join_date'])? $studentedit['join_date'] : ''; ?>" class="form-control indatepicker">
                      <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
                  </div>
                </div>
                <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Quota<span class="mandatory">*</span></label>
                <select id="quota" name="quota" class="form-control exam-chnage-pec">
              	<option value="open" <?php echo  (isset($studentedit['quota']) && $studentedit['quota'] == "open" )? 'selected="selected"' : ''; ?> >Open</option>
              	<option value="sc" <?php echo  (isset($studentedit['quota']) && $studentedit['quota'] == "sc" )? 'selected="selected"' : ''; ?>>SC</option>
                <option value="st" <?php echo  (isset($studentedit['quota']) && $studentedit['quota'] == "st" )? 'selected="selected"' : ''; ?>>ST</option>
              	<option value="sebc" <?php echo  (isset($studentedit['quota']) && $studentedit['quota'] == "sebc" )? 'selected="selected"' : ''; ?>>SEBC</option>
                <option value="ob" <?php echo  (isset($studentedit['quota']) && $studentedit['quota'] == "ob" )? 'selected="selected"' : ''; ?>>Other Board</option>
                <option value="mgmt" <?php echo  (isset($studentedit['quota']) && $studentedit['quota'] == "mgmt" )? 'selected="selected"' : ''; ?>>Management Quota</option>
              </select>
              </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="field-1" class="control-label">Certificate No</label>
                  <input type="text" value="<?php echo  isset($studentedit['certificate_no'])? $studentedit['certificate_no'] : ''; ?>" class="form-control" id="certificate_no" name="certificate_no" title="Certificate No  required" placeholder="Certificate No">
                </div>
              </div>
          </div>
        </div>
        <div class="panel-footer">
          <button class="btn btn-primary mr5" type="submit" id="save-conf">Submit</button>
          <button type="reset" class="btn btn-default">Reset</button>
        </div>
      </div>
      <?=$this->app->htmlBuilder->closeForm()?>
    </div>
  </div>
</div>


