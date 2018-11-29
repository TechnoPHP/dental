<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">WebSiteName</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><?php echo $this->Html->link("Home",array('plugin'=>'iagents','controller'=>'pages','action'=>'homepage','admin'=>false));?></li>
			<?php if ($this->Session->check('Auth.Aagent.id')){ ?>
			<li><?php echo $this->Html->link("Welcom&nbsp;&nbsp;".$this->Session->read('Auth.Aagent.firstname'),	array('plugin'=>'iagents',"controller"=>"aagents","action"=>"dashboard","admin"=>false),array("aria-expanded"=>"false","escape"=>false)); ?>
			</li>
			<li><?php echo $this->Html->link("Change Password", array('plugin'=>'iagents','controller'=>'aagents','action'=>'changepassword/'.$this->Session->read('sessuserid'),'admin'=>false)); ?></li>
			<li><?php echo $this->Html->link("Logout", array("plugin"=>"iagents","controller"=>"aagents","action"=>"logout","admin"=>false));?></li>
			<?php }else { ?>
			
			<li><?php echo $this->Html->link("Sign up",array('plugin'=>'iagents','controller'=>'aagents','action'=>'register','admin'=>false));?></li>
			<li><?php echo $this->Html->link("Sign in",array('plugin'=>'iagents','controller'=>'aagents','action'=>'login','admin'=>false));?></li>
			<?php } ?>	
			<li><a href="#">Page 3</a></li>
		</ul>
	</div>
</nav>