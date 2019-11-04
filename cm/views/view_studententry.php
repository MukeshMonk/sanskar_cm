<?php include('includes/header.php'); ?>

<div class="mobile-menu-left-overlay"></div>
<?php include('includes/sidebar-compact.php'); ?>
<div class="tmenu">
  <?php include('modules/studententry/menu.php'); ?>
</div>
<?php 
echo $this->utility->get_message();
?>
<?php 
	$this->cmx->load_inner_block($this->getGetVars(),"students");
?>
