<?php include('includes/header.php'); ?>
<style>
div#con-close-modal {
    overflow-y: scroll;
}
</style>


<div class="mobile-menu-left-overlay"></div>

<?php include('includes/sidebar-compact.php'); ?>

<div class="tmenu">

  <?php include('modules/examination/menu.php'); ?>

</div>

<?php 

echo $this->utility->get_message();

?>

<?php 

	$this->cmx->load_inner_block($this->getGetVars(),"exam_schedule");

?>

