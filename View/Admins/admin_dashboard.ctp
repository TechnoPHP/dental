<?php echo $this->element("admins/sidebar"); ?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	  <!--state overview start-->
		<div class="">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Flash->render('auth');?>
		</div>
		<?php echo $this->element('admins/dashboard_count'); ?>
		<?php //echo $this->element('admins/earning_charts'); ?>
		<?php echo $this->element('admins/workprogress'); ?>
		<?php //echo $this->element('admin/timeline'); ?>
	</section>
</section>
<!--main content end-->
<?php //echo $this->element("admins/right_sidebar"); ?>