<?php echo $this->element("admins/sidebar"); ?>
	
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><h6>Update task<?php echo $this->Html->link("Back to list", array("controller"=>"tasks","action"=>"index","admin"=>true),array("class"=>"btn btn-sm btn-outline-info float-right")); ?></h6>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card-body">
							<?php echo $this->Form->create('Task', array("url"=>array("controller"=>"tasks",'action' => 'create','admin'=>true)));	?>
							
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										<label for="">Category</label>
											<?php echo $this->Form->select('Task.category_id',$categories,array("class"=>"form-control","empty"=>"Select Category")); ?>
										</div>
									</div>
								</div>
								<div class="row">	
									<div class="col-md-12">
										<div class="form-group">
										<label for="">Task Title</label>
											<?php echo $this->Form->text('Task.title',array("class"=>"form-control","placeholder"=>"Task Title")); echo $this->Form->hidden('Task.id');?>
										</div>
									</div>
								</div>
								<div class="row">	
									<div class="col-md-12">
										<div class="form-group">
										<label for="">Short Description</label>
											<?php echo $this->Form->textarea('Task.description',array("class"=>"form-control","placeholder"=>"Short Description","rows"=>"3")); ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="checkbox">
											<label>
											<?php echo $this->Form->checkbox('Task.active',array()); ?>&nbsp;Make it active</label>
										</div>
									</div>
								
									<div class="col-md-3">
										<div class="form-group">
										<input name="" type="submit" value="Update task" class="btn btn-sm btn-success" />
									</div>
								</div>
							<?php echo $this->Form->end(); ?>							
							</div>
						</div>
						<div class="col-md-6">
						</div>
					</div>
				</div>
			</div><!-- end of id welcome -->
		</div><!--/#content.span10-->
	</section>
</section>