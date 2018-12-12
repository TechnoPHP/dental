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
						<div class="col-md-12 form-group">
							<lable><strong>Sign In</strong>&nbsp;&nbsp;<small>with your email provided at the time of registration.</small></lable>
						</div>
					</div>
	
				<div class="row">
					<div class="col-md-8">			
						<?php
							echo $this->Form->create('User', array("url"=>array("controller"=>"users","action"=>"login","admin"=>false), "class"=>"form-signin"));?>
							
							<div class="login-wrap">
								<?php echo $this->Session->flash();?><?php echo $this->Flash->render();?>
								<div class="">
								<?php echo $this->Form->text('User.email_address',array("class"=>"form-control","placeholder"=>"User ID")); ?>
								<?php echo $this->Form->error('User.email_address');?>
								</div>

								<div class="">
								<?php echo $this->Form->password('User.password',array("class"=>"form-control","placeholder"=>"Password")); ?>
								<?php echo $this->Form->error('User.password');?>
								</div>
							
								<div class="">
								<button type="submit" value="LogIn" class="btn btn-lg btn-login btn-block">Log In</button>
								</div>							
							</div>
						<?php echo $this->Form->end(); ?>
						<?php echo $this->Html->link("Forgot password ?",array("plugin"=>false,"controller"=>"users","action"=>"forgotpassword")); ?>
						<?php echo $this->Html->link("New user registration",array("plugin"=>false,"controller"=>"users","action"=>"register")); ?>
					</div>
				</div><!--end of row--></div>
			</div><!--pannel-login -->
		</div><!--col-md-7 -->
		<div class="col-md-4 col-sm-6">

		</div>
	</div> <!--row-->
</div> <!-- container -->