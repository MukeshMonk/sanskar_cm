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
          <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_marks");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"update_atd_marks"), "act");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->exam_sch_id),"record_id");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->cmx->curPageURL()),"returnUrl");?>
        
         <?php /*?><div class="panel-heading pull-right" id="dateheaqding">
         	<span><?php echo date('j F Y',$this->app->atten[0]['add_date']); ?></span>
         </div>	<?php */?>

          <div class="panel-default">
          	
          	 <div class="panel-body">
      
          <table class="table table-striped table-bordered"  >
            <thead>
              <tr>
                <th style="width:2%;" class="sort-column">Sr.</th>
                <th style="width:10%;" class="sort-column">Class Section</th>
                <th style="width:10%;" class="sort-column">Roll No.</th>
                <th style="width:15%;" class="sort-column">Student Name</th>
                <th style="width:15%;" class="sort-column">Attendance</th>
                <?php /*?><th style="width:15%;" class="sort-column">Total Marks</th>
                <th style="width:15%;" class="sort-column">Grade</th><?php */?>
                <th style="width:38%;" class="sort-column">Remarks</th>
              </tr>
            </thead>
            <tbody>
            	<?php 
				
        $status_array1=array(""=>"Select Status","AB"=>"AB","NA"=>"NA","EX"=>"EX","ML"=>"ML","OL"=>"OL");
       
				if(count($this->app->stud_marks)>0)
				{
					foreach($this->app->stud_marks as $k => $student)
				{
          
				?>
				<input type="hidden" name="student_id1[]" value="<?php echo $student['student_id']; ?>"/>
				<input type="hidden" name="class1[]" value="<?php echo $student['class_id']; ?>"/>
				<tr>					
					<td><?php echo $k+1; ?></td>
					<td><?php echo $this->app->class_namenew;?></td>
					<td><?php echo $student['stud_id_no']; ?><input type="hidden" name="stud_id_no1[]" value="<?php echo $student['stud_id_no']; ?>"/></td>
					<td>
                    <?php echo $student['student_name']; ?>
                    <input type="hidden" name="stud_name1[]" value="<?php echo $student['student_name']; ?>"/>
                    </td>
					<td>
                    <?php 
						/*$this->app->htmlBuilder->buildTag("select", array("class"=>"select2 select2-hidden-accessible w150","id"=>"default_status",  "name"=>"default_status11[]","values"=>$status_array1,"selected"=>$student['default_status']),"");*/
					?><input type="text" class="form-control" name="marks1[]" value="<?php echo $student['mark']; ?>"  /></td>
                    <?php /*?><td><input type="text" class="form-control" name="tot_marks1[]" value="<?php echo $student['tot_marks']; ?>"  /></td>
                    <td><input type="text" class="form-control" name="grade1[]" value="<?php echo $student['grade']; ?>"  /></td><?php */?>
                     <td><input type="text" class="form-control" name="remarks1[]" value="<?php echo $student['remark']; ?>"  /></td>
				</tr>	
				<?php }
				}
				else
				{
					
				foreach($this->app->students as $k => $student)
				{
					
				?>
				<input type="hidden" name="student_id1[]" value="<?php echo $student['id']; ?>"/>
				<input type="hidden" name="course1[]" value="<?php echo $student['cm_course']; ?>"/>
				<input type="hidden" name="sem1[]" value="<?php echo $student['sem']; ?>"/>
                <input type="hidden" name="class1[]" value="<?php echo $student['cm_class_id']; ?>"/>
				<tr>					
					<td><?php echo $k+1; ?></td>
					<td><?php echo $this->app->class_namenew;?></td>
					<td><?php echo $student['id_no']; ?><input type="hidden" name="stud_id_no1[]" value="<?php echo $student['id_no']; ?>"/></td>
					<td>
                    <?php echo $student['name']; ?>
                    <input type="hidden" name="stud_name1[]" value="<?php echo $student['name']; ?>"/>
                    </td>
					<td>
                    <?php 
						$this->app->htmlBuilder->buildTag("select", array("class"=>"select2 select2-hidden-accessible w150","id"=>"default_status",  "name"=>"default_status11[]","values"=>$status_array1,"selected"=>$selected_vallue),"");
					?><input type="text" class="form-control" name="marks1[]" value="<?php echo $remark;?>"  /></td>
                    <?php /*?><td><input type="text" class="form-control" name="tot_marks1[]" value="<?php echo $remark;?>"  /></td>
                    <td><input type="text" class="form-control" name="grade1[]" value="<?php echo $remark;?>"  /></td><?php */?>
                     <td><input type="text" class="form-control" name="remarks1[]" value="<?php echo $remark;?>"  /></td>
				</tr>	
				<?php } 
				}?>
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
