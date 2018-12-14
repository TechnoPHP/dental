<div class="container">
	<div class="row">
		<div class="col-md-7">
			<div class=""><?php echo $this->Session->flash();?></div>
			<div class="card">
				<div class="card-header">
					<div class="">Send Inquiry</div>
				</div>
				<div class="card-body">					
					<div class="row">
						<div class="col-md-12">
							<?php echo $this->Form->create('Inquiry',array("url"=>array("plugin"=>false,"controller"=>"inquiries","action"=>"create","admin"=>false), "role"=>"form", "id"=>"inquiry-form")); ?>
																
								<div class="row">
									<div class="col-md-12 form-group">
										<lable><small>Provide information how to reach to you for communication </small></lable>
									</div>
								</div>
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
								<hr />
								<div class="row">
									<div class="col-md-12 form-group">
										<lable><small>Provide information what kind of service you are looking for </small></lable>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										
										<?php echo $this->Form->select("Inquiry.task_id",$tasks, array("empty"=>"Select task","class"=>"form-control")); 
										echo $this->Form->error('Inquiry.task_id');?>
									<small>Select task from the list above which matchs with your inquiry</small>
									</div>
									
								</div>
								<div class="row">						
									<div class="col-md-12 form-group">
										<?php echo $this->Form->text('Inquiry.inquirytitle',array("type"=>"text","class"=>"form-control ie7-margin","placeholder"=>"Inquiry title"));
										echo $this->Form->error('Inquiry.inquirytitle'); ?>
									</div>
									<div class="col-md-12 form-group">
										<?php echo $this->Form->textarea('Inquiry.inquiryremark',array("type"=>"password","class"=>"form-control ie7-margin","placeholder"=>"Write some more on inquiry")); 
										echo $this->Form->error('Inquiry.inquiryremark'); ?> 
									</div>
								</div>
								<hr />
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
									<input type="submit" tabindex="" class="btn btn-primary" value="Submit inquiry">
										
								</div>
							<?php echo $this->Form->end(); ?>
						</div>
					</div>
				</div>
			</div><!--pannel-login -->
		</div><!--inner_pages -->
		<div class="col-md-4 col-sm-6">
			<div class="card">
				 <ul class="list-group list-group-flush">
			<li class="list-group-item bg-light">Provide basic information about yourself so we know you better and can reach you if needed in case.</li>
			<li class="list-group-item">Once you submit the form, it will create your basic profile in the system with information you provided and will get the email confirmation link.</li>
			<li class="list-group-item bg-light">After confirming the email link receieved in the email, you may login and update/provide more information about yourself.</li>
			<li class="list-group-item">You may also get the verification call to check that registration is not done by mistake and you are intended to use services of iAdvisor.com.</li>
				</ul>
			</div>
		</div>
	</div> <!--row-->
</div> <!-- container -->