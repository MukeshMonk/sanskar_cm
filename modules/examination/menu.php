<div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
  <ul id="menu-head-access" class="nav navbar-nav">
	<?php if($_SESSION['Role']=='3') {?>
		<li> 
    	<a title="Enter Marks" href="<?php echo $this->menu_base;?>/enter_marks/" >
    		Enter Marks
    	</a>
    </li>
	<?php } else {?>
    <li> 
    	<a title="exam schedule" href="<?php echo $this->menu_base;?>/exam_schedule/" >
    		Exam Schedule     		
    	</a>
    </li>
    
    <li> 
    	<a title="Enter Marks" href="<?php echo $this->menu_base;?>/enter_marks/" >
    		Enter Marks
    	</a>
    </li>
		<li> 
    	<a title="Attendance Mark" href="<?php echo $this->menu_base;?>/attendance_mark/" >
				Attendance Mark
    	</a>
    </li>
		<li> 
    	<a title="Scheduled Marks" href="<?php echo $this->menu_base;?>/scheduled_marks/" >
			Scheduled Marks
    	</a>
    </li>
		<li> 
    	<a title="Term Marks" href="<?php echo $this->menu_base;?>/term_marks/" >
			Term Marks
    	</a>
    </li>
	<?php } ?>
  </ul> 
</div>
