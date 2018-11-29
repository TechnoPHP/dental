<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class=""><?php echo $this->Session->flash();?></div>
			<div class="panel">
				<div class="panel-heading">
					<div class="">Sign in</div>					
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">							
							<?php echo $this->Form->create('Iagents.Aagent',array("url"=>array("plugin"=>"iagents","controller"=>"aagents","action"=>"login"), "role"=>"form","id"=>"login-form")); ?>
								<div class="row">
									<div class="col-md-12 form-group">
										<?php echo $this->Form->input('Aagent.email_address',array("type"=>"text","class"=>"form-control ie7-margin","placeholder"=>"Email Id","label"=>false)); ?>
										<?php echo $this->Form->error('Aagent.email_address'); ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<?php echo $this->Form->input('Aagent.password',array("type"=>"password","class"=>"form-control ie7-margin", "placeholder"=>"Password","label"=>false));?>
										<?php echo $this->Form->error('Aagent.password'); ?>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-sm-6 col-sm-offset-3">
											<?php echo $this->Form->submit('Log In',array("class"=>" form-control btn btn-login")); ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-12">
										<div class="text-center form-group">
											<?php echo $this->Html->link("Forgot Password",array("plugin"=>"","controller"=>"users","action"=>"forgotpassword","admin"=>false),array("class"=>"forgot-password")); ?>
										</div>
										<div class="text-center">Click on sign up if you are not yet registered agent</div>
									</div>
								</div>
							<?php echo $this->Form->end(); ?>
						</div>
					</div>
				</div>
			</div><!--pannel-login -->
		</div><!--inner_pages -->
		<div class="col-md-4 col-sm-6">
			
		</div>
	</div> <!--row-->
</div> <!-- container -->