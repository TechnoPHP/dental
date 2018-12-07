<?php echo $this->element("admins/sidebar"); ?>
	
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
					Create New Work Faqcategory<div class="pull-right"><?php echo $this->Html->link("Back to list", array("controller"=>"categories","action"=>"index","admin"=>true)); ?></div>
					</header>
					<div class="row">
						<div class="col-md-12">						
							<div class="panel-body">
							<?php echo $this->Form->create('Faqcategory', array("url"=>array("controller"=>"categories",'action' => 'create','admin'=>true)));	?>
							
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
										<label for="parentcategoryname">Parent Category</label>
											<?php echo $this->Form->select('Faqcategory.parent_id',$parent,array("class"=>"form-control","empty"=>"Select Parent Category")); ?>
										</div>
									</div>									
									<div class="col-md-3">
										<div class="form-group">
										<label for="categoryname">Category Name</label>
											<?php echo $this->Form->text('Faqcategory.name',array("class"=>"form-control","placeholder"=>"Category Name")); ?>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										<label for="">Describe this category</label>
											<?php echo $this->Form->textarea('Faqcategory.description',array("class"=>"form-control","placeholder"=>"Describe this category")); ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="checkbox">
											<label>
											<?php echo $this->Form->checkbox('Faqcategory.active',array()); ?>&nbsp;Make it active</label>
										</div>
									</div>
									<div class="col-md-3">
										<div class="checkbox">
											<label>
											<?php echo $this->Form->checkbox('Faqcategory.featured',array()); ?>&nbsp;Make it featured</label>
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