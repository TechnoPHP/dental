<?php echo $this->element("admins/sidebar"); ?>
	<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
					Create New Group<div class="pull-right"><?php echo $this->Html->link("Back to list", array("controller"=>"admingroups","action"=>"index","admin"=>true)); ?></div>
					</header>
					<div class="panel-body">
						<?php echo $this->Form->create('Admingroup', array("url"=>array("controller"=>"admingroups","action"=>"create","admin"=>true),"role"=>"form","class"=>"form-inline"));	?>
						<div class="col-md-3">
							<div class="form-group">
								<?php echo $this->Form->text('Admingroup.name',array("class"=>"form-control","placeholder"=>"Group name")); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<?php echo $this->Form->text('Admingroup.description',array("class"=>"form-control","placeholder"=>"Group description")); ?>
							</div>
						</div>
						<div class="col-md-2">
							<div class="checkbox">
								<label>
								<?php echo $this->Form->checkbox('Admingroup.active',array()); ?>Make it active</label>
							</div>
						</div>
						<div class="col-md-2">
						<button type="submit" class="btn btn-success">Create</button>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
					
                </section>	
		
			</div><!-- end of id welcome -->
		</div><!--/#content.span10-->
	</section>
</section>