<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
	<div class="container">
		
		<?php echo $this->Html->link("Website Logo",array('plugin'=>'iagents','controller'=>'pages','action'=>'homepage','admin'=>false),array("class"=>"navbar-brand"));?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExample09">
			<ul class="navbar-nav mr-auto">
				
				  
				<li class="nav-item">
					<?php echo $this->Html->link("Home",array('plugin'=>'iagents','controller'=>'pages','action'=>'homepage','admin'=>false),array("class"=>"nav-link"));?>
				</li>
				
				<?php if ($this->Session->check('Auth.Aagent.id')){ ?>
				<li class="nav-item"><?php echo $this->Html->link("My workmen",array('plugin'=>'iagents','controller'=>'workers','action'=>'index','admin'=>false),array("class"=>"nav-link"));?></li>
				<li class="nav-item dropdown">
					<?php echo $this->Html->link("Welcome&nbsp;&nbsp;".$this->Session->read('Auth.Aagent.firstname'),array('plugin'=>'iagents',"controller"=>"aagents","action"=>"dashboard","admin"=>false),array("class"=>"nav-link dropdown-toggle","data-toggle"=>"dropdown", "aria-haspopup"=>"true","aria-expanded"=>"false","escape"=>false)); ?>
					<div class="dropdown-menu" aria-labelledby="dropdown09">
					<?php echo $this->Html->link("My Dashboard", array('plugin'=>'iagents','controller'=>'aagents','action'=>'dashboard','admin'=>false),array("class"=>"dropdown-item")); ?>
					<?php echo $this->Html->link("Change Password", array('plugin'=>'iagents','controller'=>'aagents','action'=>'changepassword/'.$this->Session->read('sessuserid'),'admin'=>false),array("class"=>"dropdown-item")); ?>
					<?php echo $this->Html->link("Logout", array("plugin"=>"iagents","controller"=>"aagents","action"=>"logout","admin"=>false),array("class"=>"dropdown-item"));?>
					</div>
				</li>
				
				<?php }else { ?>
				
				<li class="nav-item"><?php echo $this->Html->link("Sign up",array('plugin'=>'iagents','controller'=>'aagents','action'=>'register','admin'=>false),array("class"=>"nav-link"));?></li>
				<li class="nav-item"><?php echo $this->Html->link("Sign in",array('plugin'=>'iagents','controller'=>'aagents','action'=>'login','admin'=>false),array("class"=>"nav-link"));?></li>
				<?php } ?>
			</ul>
		</div>
	</div><!--container -->
</nav>