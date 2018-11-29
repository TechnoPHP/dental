<?php echo $this->element("admin/admin_sidebar"); ?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
					Update Country<div class="pull-right"><?php echo $this->Html->link("Back to list", array("controller"=>"countries","action"=>"index","admin"=>true)); ?></div>
					</header>
					<div class="row">
						<div class="panel-body">
							<div class="col-md-6">
								<div><?php echo $this->Session->flash(); ?></div>
								<?php echo $this->Form->create('Country', array("url"=>array("controller"=>"countries","action"=>"edit","admin"=>true)));?>
								<div class="col-md-6">
									<div class="form-group">
										<label>Country Name *:</label>
										<?php echo $this->Form->text('Country.name', array('class'=>'form-control'));echo $this->Form->hidden('Country.id', array('class'=>'form-control'));?><?php echo $this->Form->error('Country.name');?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Zone *:</label>
										<?php echo $this->Form->select('Country.zone_id',$zones, array('class' => 'form-control')); ?>
										<?php echo $this->Form->error('Country.zone_id');?>
									</div>
								</div>
					
								<div class="col-md-6">
									<div class="form-group">	
										<label>ISO-2*</label>
										<?php echo $this->Form->text('Country.iso_2', array('class' => 'form-control')); ?>
										<?php echo $this->Form->error('Country.iso_2');?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">	
										<label>ISO-3*</label>
										<?php echo $this->Form->text('Country.iso_3', array('class'=> 'form-control'));?>
											<?php echo $this->Form->error('Country.iso_3');?>
									</div>
								</div>													
								<div class="col-md-6">
									<div class="form-group">
										<label>Phone Country Code *:</label>
										<?php echo $this->Form->text('Country.phonecode', array('class' => 'form-control')); ?>
										<?php echo $this->Form->error('Country.phonecode');?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>ISO numeric Code *:</label>
										<?php echo $this->Form->text('Country.isonumeric', array('class' => 'form-control')); ?>
									</div>
								</div>								
								<div class="col-md-6">
									<div class="form-group">
										<label>Latitude *:</label>
										<?php echo $this->Form->text('Country.lat', array('class'=>'form-control')); ?>
										<?php echo $this->Form->error('Country.lat');?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">		
										<label>Longitude *:</label>
										<?php echo $this->Form->text('Country.long', array('class'=>'form-control')); ?>
										<?php echo $this->Form->error('Country.long');?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">		
										<label>
										<?php echo $this->Form->checkbox('Country.active', array()); ?>&nbsp;Make Active</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="col-md-12">
									<div class="form-group">
										<label>About / Short Note on country:</label>
										<?php echo $this->Form->textarea('Country.about', array('class'=>'form-control')); ?>
									</div>
								</div>
							</div>							
							<div class="col-md-12">							
								<button type="submit" class="btn btn-success">Update</button>
							</div>
						</div><!-- end of panel-body -->
														
						<?php echo $this->Form->end(); ?>
					</div><!--end of row -->
						
                </section>		
			</div><!-- end of id welcome -->
		</div><!--/#content.span10-->
	</section>
</section>