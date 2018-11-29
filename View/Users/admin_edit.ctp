<?php echo $this->element("admins/sidebar"); ?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
					Create New User <div class="pull-right"><?php echo $this->Html->link("Back to list", array("plugin"=>false,"controller"=>"users","action"=>"index","admin"=>true)); ?></div>
					</header>
					<div class="row">
						<div class="col-md-6">						
							<div class="panel-body">
								<?php echo $this->Form->create('User', array("url"=>array("plugin"=>false,"controller"=>"admins","action"=>"create","admin"=>true),"role"=>"form","class"=>""));?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										<label for="firstname">First Name</label>
											<?php echo $this->Form->text('User.firstname',array("class"=>"form-control","placeholder"=>"First name"));
											echo $this->Form->hidden('User.id',array()); ?>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
										<label for="lastname">Last Name</label>
											<?php echo $this->Form->text('User.lastname',array("class"=>"form-control","placeholder"=>"Last name")); ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										<label for="email_address">Email Id</label>
											<?php echo $this->Form->text('User.email_address',array("class"=>"form-control","placeholder"=>"Email Id")); ?>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
										<label for="Phone">Phone</label>
											<?php echo $this->Form->text('User.phone',array("class"=>"form-control","placeholder"=>"Phone number")); ?>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										<label for="Country">Country</label>
											<?php echo $this->Form->select('User.country_id',$appcountries,array("class"=>"form-control","empty"=>"--Country--")); ?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										<label for="Zipcode">Zipcode</label>
											<?php echo $this->Form->text('User.zipcode',array("class"=>"form-control","placeholder"=>"Zipcode")); ?>
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										<label for="group">Group</label>
											<?php echo $this->Form->select('User.group_id',$groups,array("class"=>"form-control","empty"=>"--Group--")); ?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkbox">
											<label>
											<?php echo $this->Form->checkbox('User.active',array('hiddenField' => false,'value'=>'Y')); ?>Make it active</label>
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-md-6">
										<button type="submit" class="btn btn-primary">Create</button>
									</div>
								</div>
								<?php echo $this->Form->end(); ?>
							</div>
						</div>
						<div class="col-md-6"> YET TO DECIDE FOR CONTENT</div>
					</div>
                </section>	
		
			</div><!-- end of id welcome -->
		</div><!--/#content.span10-->
	</section>
</section>