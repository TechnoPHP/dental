<?php echo $this->element("admin/admin_sidebar"); ?>
	<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
					Update Group<div class="pull-right"><?php echo $this->Html->link("Back to list", array("controller"=>"groups","action"=>"index","admin"=>false)); ?></div>
					</header>
					<div class="panel-body">
						<?php echo $this->Form->create('Group', array("url"=>array("controller"=>"groups","action"=>"edit","admin"=>false),"role"=>"form","class"=>"form-inline"));	?>
						<div class="col-md-3">
							<div class="form-group">
								<?php echo $this->Form->text('Group.name',array("class"=>"form-control","placeholder"=>"Group name")); echo $this->Form->hidden('Group.id');?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<?php echo $this->Form->text('Group.description',array("class"=>"form-control","placeholder"=>"Group description")); ?>
							</div>
						</div>
						<div class="col-md-2">
							<div class="checkbox">
								<label>
								<?php echo $this->Form->checkbox('Group.active',array()); ?>Make it active</label>
							</div>
						</div>
						<div class="col-md-2">
						<button type="submit" class="btn btn-success">Update</button>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
					
                </section>	
		
			</div><!-- end of id welcome -->
		</div><!--/#content.span10-->
	</section>
</section>