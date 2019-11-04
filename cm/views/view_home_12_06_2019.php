<?php include('includes/header.php'); ?>

<div class="mobile-menu-left-overlay"></div>
<?php include('includes/sidebar-compact.php'); ?>
<div class="page-content">
  
  <!--.page-content-header-->
  
  <div class="container-fluid">
    <div class="col-xxl-3 col-md-12">
      <div class="row">
        <div class="col-xs-3">
          <section class="widget widget-simple-sm-fill" onclick="window.location.href='<?php echo CMX_ROOT.'/configuration/'; ?>'">
            <div class="widget-simple-sm-icon"> <i class="font-icon font-icon-cogwheel"></i> </div>
            <div class="widget-simple-sm-fill-caption">Configuration</div>
          </section>
        </div>
        <!--.widget-simple-sm-fill-->
        <div class="col-xs-3">
          <section class="widget widget-simple-sm-fill red" onclick="window.location.href='<?php echo CMX_ROOT.'/studententry/'; ?>'">
            <div class="widget-simple-sm-icon"> <i class="font-icon font-icon-user"></i> </div>
            <div class="widget-simple-sm-fill-caption">Student Entry</div>
          </section>
        </div>
        <!--.widget-simple-sm-fill--> 
        
        <div class="col-xs-3">
          <section class="widget widget-simple-sm-fill green" onclick="window.location.href='<?php echo CMX_ROOT.'/examination/'; ?>'">
            <div class="widget-simple-sm-icon"> <i class="font-icon font-icon-pen-square"></i> </div>
            <div class="widget-simple-sm-fill-caption">Examination requirements</div>
          </section>
          <!--.widget-simple-sm-fill--> 
        </div>
        
         <div class="col-xs-3">
          <section class="widget widget-simple-sm-fill orange" onclick="window.location.href='<?php echo CMX_ROOT.'/admissionentry/'; ?>'">
            <div class="widget-simple-sm-icon"> <i class="font-icon font-icon-plus"></i> </div>
            <div class="widget-simple-sm-fill-caption">Admission module</div>
          </section>
          <!--.widget-simple-sm-fill--> 
        </div>
        
         <div class="col-xs-3">
          <section class="widget widget-simple-sm-fill purple" onclick="window.location.href='<?php echo CMX_ROOT.'/staffentry/'; ?>'">
            <div class="widget-simple-sm-icon"> <i class="font-icon font-icon-users"></i> </div>
            <div class="widget-simple-sm-fill-caption">Staff information</div>
          </section>
          <!--.widget-simple-sm-fill--> 
        </div>
      </div>
      <!--.row-->
      
      
      <!--.row-->
      
      
      <!--.row-->
      
      
      <!--.row-->
      
      
      <!--.row-->
      
      
    </div>
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content--> 
