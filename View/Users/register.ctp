<div class="container">
	<div class="row">
		<div class="col-md-7">
			<div class=""><?php echo $this->Session->flash();?></div>
			<div class="card mb-3">
				<div class="card-header">
					<div class="">Sign up <small>Provide information how to reach to you for communication </small></div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<?php echo $this->Form->create('User',array("url"=>array("plugin"=>false,"controller"=>"users","action"=>"register"), "role"=>"form", "id"=>"register-form")); ?>

								<div class="row">
									<div class="col-md-6 form-group">
										<?php echo $this->Form->text('User.firstname',array("type"=>"text","class"=>"form-control ie7-margin","placeholder"=>"First name")); ?>
										<?php echo $this->Form->error('User.firstname'); ?>
									</div>
									<div class="col-md-6 form-group">
										<?php echo $this->Form->text('User.lastname',array("type"=>"text","class"=>"form-control ie7-margin","placeholder"=>"Last name")); ?>
									</div>						
								</div>
								<div class="row">
									<div class="col-md-6 form-group">
										<?php echo $this->Form->text('User.email_address',array("type"=>"text","class"=>"form-control ie7-margin","placeholder"=>"Email address"));?>
										<?php echo $this->Form->error('User.email_address'); ?>
										<small>Your email address will be your login Id</small>
									</div>
									<div class="col-md-6 form-group">
										<?php echo $this->Form->text('User.phone',array("type"=>"text","class"=>"form-control ie7-margin","placeholder"=>"Contact number"));?>
										<?php echo $this->Form->error('User.phone'); ?>
									</div>
								</div>
								<div class="row">						
									<div class="col-md-6 form-group">
										<?php echo $this->Form->text('User.password',array("type"=>"password","class"=>"form-control ie7-margin","placeholder"=>"Password"));
										echo $this->Form->error('User.password'); ?>
									</div>						
									<div class="col-md-6 form-group">
										<?php echo $this->Form->text('User.confirm_password',array("type"=>"password","class"=>"form-control ie7-margin","placeholder"=>"Retype password")); 
										echo $this->Form->error('User.confirm_password'); ?> 
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12 form-group">
										<lable><strong>Validate you are human</strong>&nbsp;&nbsp;<small>Fill answer in the textbox</small></lable>
									</div>
								</div>
								<div class="row">				
									<?php $this->Captcha->render(array('type'=>'math','width'=>'188', 'clabel'=>'Enter captcha code','mlabel'=>'Answer simple maths', 'reload_txt'=>'Reload Captcha')); ?>				
								</div>
								
								<div class="">
									<div class="col-md-12 alert alert-info terms">
										By creating an account you confirm the acceptance of <?php echo $this->Html->link('Terms of Use',array("plugin"=>false,"controller"=>"pages","action"=>"terms"),array("class"=>"alert-link"));?>&nbsp;and&nbsp;<?php echo $this->Html->link('Privacy Policy',array("plugin"=>false,"controller"=>"pages","action"=>"privacypolicies"),array("class"=>"alert-link"));?>.
									</div>
								</div>			
								<div class="form-group">
									
									<input type="submit" tabindex="" class="btn btn-primary" value="Register Now">
										
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