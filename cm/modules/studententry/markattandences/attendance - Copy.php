<style>
.w150
{
	width:150px;
}
#dateheaqding
{	
    background: #5dca73 none repeat scroll 0 0;
    color: white;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    padding: 6px 25px;
}
.leavespan {
    background: #5DCA73 none repeat scroll 0 0;
    color: white;
    font-size: 15px;
    height: 92px;
    padding: 6px 9px;
    font-weight: bold;
}	
</style>
<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">Mark Attendance</h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Setup</a></li>
            <li class="active">Mark Attendance</li>
          </ol>
        </div>
        <div class="panel-body">
          <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_attendance");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"save_attendance"), "act");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->markattandence_id),"record_id");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->cmx->curPageURL()),"returnUrl");?>
        
         <div class="panel-heading pull-right" id="dateheaqding">
         	<span><?php echo date('j F Y'); ?></span>
         </div>	

          <div class="panel-default">
          	
          	 <div class="panel-body">
      
          <table class="table table-striped table-bordered"  >
            <thead>
              <tr>
                <th style="width:2%;" class="sort-column">Sr.</th>
                <th style="width:15%;" class="sort-column">Admission No.</th>
                <th style="width:15%;" class="sort-column">Student Name</th>
                <th style="width:15%;" class="sort-column">Date</th>
                <th style="width:15%;" class="sort-column">Status</th>
                <th style="width:38%;" class="sort-column">Remarks</th>
              </tr>
            </thead>
            <tbody>
            	<?php  
            	$defaultstatusforleave1 = $this->app->cmx->get_status_for_attandenace($this->app->students[0]['course_id'],$this->app->students[0]['sem']);
            	$defaultstatusforleave = $defaultstatusforleave1[0]['default_status']; 
				         	 
            	if(count($this->app->editr)>0)
				{					
				foreach($this->app->students as $k => $student)
				{									
				?>
				<input type="hidden" name="student_id1[]" value="<?php echo $student['id']; ?>"/>
				<input type="hidden" name="course1[]" value="<?php echo $student['course_id']; ?>"/>
				<input type="hidden" name="sem1[]" value="<?php echo $student['sem']; ?>"/>
				<input type="hidden" name="add_date1[]" value="<?php echo date('Y-m-d'); ?>"/>
				<input type="hidden" name="attandence_id[]" value="<?php echo $student['id']; ?>"/>
				
				<tr>					
					<td><?php echo $k+1; ?></td>
					<td><?php echo $student['id_no']; ?></td>
					<td><?php echo $student['name']; ?></td>
					<td><?php echo date('Y-m-d'); ?></td>
					<td>
					<?php
					if($this->app->editr[$k]['student_id'] == $student['id'])
					{
						if(!empty($this->app->official_and_medical_leave_students))
						{
							if(in_array($this->app->editr[$k]['student_id'],$this->app->official_and_medical_leave_students))
							{
								if($this->app->editr[$k]['default_status'] == "Official Leave")
								{
									$selected_vallue="Official Leave";
								}elseif($this->app->editr[$k]['default_status'] == "Medical Leave")
								{
									$selected_vallue="Medical Leave";
								}else
								{
									$selected_vallue=   isset($this->app->editr[$k]['default_status'])?$this->app->editr[$k]['default_status']:$defaultstatusforleave;
								}
							}
							else
							{
								$selected_vallue=   isset($this->app->editr[$k]['default_status'])?$this->app->editr[$k]['default_status']:$defaultstatusforleave;
							} 
						}
					}else
					{
						$selected_vallue=   isset($this->app->editr[$k]['default_status'])?$this->app->editr[$k]['default_status']:$defaultstatusforleave;
					}				
					$disabled = ($selected_vallue == "Medical Leave" OR $selected_vallue == "Official Leave") ? "disabled" : '';
					$status_array=array(""=>"Select Status","Present"=>"Present","Absent"=>"Absent");
					?>
					<?php
					if($selected_vallue == "Medical Leave" OR $selected_vallue == "Official Leave")
					{
					?>
					<span class="leavespan"><?php echo $selected_vallue; ?></span>
					<input type="hidden" name="default_status1[]" value="<?php echo $selected_vallue; ?>" />
					<?php
					}else
					{
					?>
					<? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 select2-hidden-accessible w150","id"=>"default_status",  "name"=>"default_status1[]","values"=>$status_array,"selected"=>$selected_vallue),"");?>
					<?php } ?>
					</td>
					<td><input type="text" class="form-control" name="remarks1[]"  value="<?php echo isset($student['cm_attendance_remarks'])?$student['cm_attendance_remarks']:''; ?>"/></td>
				</tr>	
				<? }
				} 
				else
				{		
				foreach($this->app->students as $k => $student)
				{					
				?>
				<input type="hidden" name="student_id1[]" value="<?php echo $student['id']; ?>"/>
				<input type="hidden" name="course1[]" value="<?php echo $student['course_id']; ?>"/>
				<input type="hidden" name="sem1[]" value="<?php echo $student['sem']; ?>"/>
				<input type="hidden" name="add_date1[]" value="<?php echo date('Y-m-d'); ?>"/>
				<tr>					
					<td><?php echo $k+1; ?></td>
					<td><?php echo $student['id_no']; ?></td>
					<td><?php echo $student['name']; ?></td>
					<td><?php echo date('Y-m-d'); ?></td>
					<td>
					<?php
						
					if(!empty($this->app->official_and_medical_leave_students))
					{
						if(in_array($student['id'],$this->app->official_and_medical_leave_students))
						{
							if($student['cm_attendance_default_status'] == "Official Leave")
							{
								$selected_vallue="Official Leave";
							}elseif($student['cm_attendance_default_status'] == "Medical Leave")
							{
								$selected_vallue="Medical Leave";
							}else
							{
								$selected_vallue=$defaultstatusforleave;
							}
						}
						else
						{
							$selected_vallue=$defaultstatusforleave;
						} 
					}else
					{
						$selected_vallue=$defaultstatusforleave;
					}
					$status_array=array(""=>"Select Status","Present"=>"Present","Absent"=>"Absent");
					?>
					<?php
					if($selected_vallue == "Medical Leave" OR $selected_vallue == "Official Leave")
					{
					?>
					<span class="leavespan"><?php echo $selected_vallue; ?></span>
					<input type="hidden" name="default_status1[]" value="<?php echo $selected_vallue; ?>" />
					<?php
					}else
					{
					?>
					<? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 select2-hidden-accessible w150","id"=>"default_status",  "name"=>"default_status1[]","values"=>$status_array,"selected"=>$selected_vallue),"");?>
					<?php } ?>
				    </td>
					<td><input type="text" class="form-control" name="remarks1[]"  /></td>
				</tr>	
				<?php } ?>
				<?php } ?>
            </tbody>
          </table>
          </div>
          <div class="panel-footer">          	
          	<button type="submit" class="btn btn-success btn-md" name="save" value="save">Save</button>          	
          	<button type="submit" class="btn btn-danger btn-md" name="saveandclose" value="savenclose">Save & Close</button>
          	
          </div>
               
	
          </div>
           <?=$this->app->htmlBuilder->closeForm()?>
        </div>
        
        <!-- panel-body --> 
        
      </div>
    </div>
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content--> 
