<?php echo $this->element("admins/sidebar"); ?>
	
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
					Create New Work Category<div class="pull-right"><?php echo $this->Html->link("Back to list", array("controller"=>"tasks","action"=>"index","admin"=>true)); ?></div>
					</header>
					<div class="row">
						<div class="col-md-12">						
							<div class="panel-body">
							<?php echo $this->Form->create('Task', array("url"=>array("controller"=>"tasks",'action' => 'create','admin'=>true)));	?>
							
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										<label for="parentcategoryname">Category</label>
											<?php echo $this->Form->select('Task.category_id',$categories,array("class"=>"form-control","empty"=>"Select Category")); ?>
										</div>
									</div>
								</div>
								<div class="row">	
									<div class="col-md-12">
										<div class="form-group">
										<label for="categoryname">Task Title</label>
											<?php echo $this->Form->text('Task.title',array("class"=>"form-control","placeholder"=>"Task Title")); ?>
										</div>
									</div>
								</div>
								<div class="row">	
									<div class="col-md-12">
										<div class="form-group">
										<label for="categoryname">Short Description</label>
											<?php echo $this->Form->text('Task.description',array("class"=>"form-control","placeholder"=>"Short Description")); ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="checkbox">
											<label>
											<?php echo $this->Form->checkbox('Category.active',array()); ?>&nbsp;Make it active</label>
										</div>
									</div>
								
									<div class="col-md-3">
										<div class="form-group">
										<input name="" type="submit" value="Create" class="btn btn-success" />
									</div>
								</div>
							<?php echo $this->Form->end(); ?>							
							</div>
						</div>
					</div>
				</section>
			</div><!-- end of id welcome -->
		</div><!--/#content.span10-->
	</section>
</section>