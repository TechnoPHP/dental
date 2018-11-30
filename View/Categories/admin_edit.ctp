<?php echo $this->element("admins/sidebar"); ?>
	
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
					Update Work Category<div class="pull-right"><?php echo $this->Html->link("Back to list", array("controller"=>"categories","action"=>"index","admin"=>true)); ?></div>
					</header>
					<div class="row">
						<div class="col-md-12">						
							<div class="panel-body">
							<?php echo $this->Form->create('Category', array("url"=>array("controller"=>"categories",'action'=>'edit','admin'=>true)));	?>
							
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
										<label for="parentcategoryname">Parent Category</label>
											<?php echo $this->Form->select('Category.parent_id',$parent,array("class"=>"form-control","empty"=>"Select Parent Category")); echo $this->Form->hidden('Postcategory.id');?>
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
										<label for="categoryname">Category Name</label>
											<?php echo $this->Form->text('Category.name',array("class"=>"form-control","placeholder"=>"Category Name")); echo $this->Form->hidden('Category.id');?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="checkbox">
											<label>
											<?php echo $this->Form->checkbox('Category.active',array()); ?>Make it active</label>
										</div>
									</div>
								
									<div class="col-md-3">
										<div class="form-group">
										<input name="" type="submit" value="Update" class="btn btn-success" />
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