<!--Heading Bar start-->
<div class="heading-bar">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 item ">
				<div class="call-part">
					<div class="icon">
						<p><i class="fa fa-phone"></i></p>
					</div>
					<div class="text">
						<h3>Call Us: +91 079 079-0799</h3>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12  item">
				<div class="loginbutton">
					<?php if($this->Session->check('Auth.User.id')){ ?>
					<ul>
						<li>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $this->Session->read('Auth.User.firstname');?> <span class="caret"></span>
							</button>
						<ul class="dropdown-menu dropdown-menu-right">
								<li><?php echo $this->Html->link("<i class='fa fa-lock-open'></i>Logout",array("plugin"=>false,"controller"=>"users","action"=>"logout"),array("escape"=>false)); ?></li></li>
								</ul>
						</div>
					</ul>
					<?php } else {?>
					<ul>
						<li>
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Sign In <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><?php echo $this->Html->link("<i class='fa fa-lock'></i>Sign In",array("plugin"=>false,"controller"=>"users","action"=>"login"),array("escape"=>false)); ?></li>
									<li><?php echo $this->Html->link("<i class='fa fa-lock'></i>Sign up",array("plugin"=>false,"controller"=>"users","action"=>"register"),array("escape"=>false)); ?></li>
									<li role="separator" class="divider"></li>
									<li><?php echo $this->Html->link("<i class='fa fa-lock'></i>Forgot password",array("plugin"=>false,"controller"=>"users","action"=>"forgotpassword"),array("escape"=>false)); ?></li>
								</ul>
							</div>
						</li>
					</ul>
					<?php } ?>	
				</div>
			</div>
			
		</div>
	</div>
</div>
<!--Heading Bar End-->
<!--Header Start-->
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-4 logo">
					<?php echo $this->Html->link($this->Html->image("logo.jpg",array("alt"=>"trusted housecare services")),array("controller"=>"/"),array("escape"=>false,"title"=>"My Site name is site"));?>
				</div>
				<!-- Nav Start -->
				<div class="col-md-8 nav-wrapper">
					<div class="nav">
						<ul class="sf-menu" id="menu">
							
							<?php 
							$i=1;	$more=array();
							foreach($appcategories as $fkey=>$fcategory){
								if($i>3){ $more[$fkey]=$fcategory;}else{ ?>
								<li><?php echo $this->Html->link($fcategory,array('plugin'=>'','controller'=>'categories','action'=>'view/'.$fkey,'admin'=>false));?></li>
							<?php }
							
							$i++;} ?>
							
							<li><a href="#">More</a>
								<ul>
								<?php foreach($more as $key=>$category){?>
									<li><?php echo $this->Html->link($category,array('plugin'=>'','controller'=>'categories','action'=>'view/'.$key,'admin'=>false));?></li>
								<?php } ?>
									
								</ul>									
							</li>
							<li><a href="#">Agencies</a>
								<ul>
									<li><?php echo $this->Html->link("Agents",array('plugin'=>"iagents",'controller'=>'pages','action'=>'homepage','admin'=>false));?></li>
									<li><a href="#">Referal form</a></li>
								</ul>									
							</li>
							<li><?php echo $this->Html->link("Admins",array('plugin'=>false,'controller'=>'admins','action'=>'login','admin'=>true));?></li>
							<li><?php echo $this->Html->link("Inquiries",array('plugin'=>'appointments','controller'=>'appointments','action'=>'index','admin'=>false));?>
							</li>
						</ul>
					</div>
				</div>
				<!-- Nav End-->
			</div>
		</div>
	</header>
	<!--Header End-->