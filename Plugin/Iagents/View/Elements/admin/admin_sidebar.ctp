<!--sidebar start-->
<aside>
	<div id="sidebar" class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">
		  
			<li class="sub-menu">			
				<a href="javascript:;" class="<?php echo ($usersclass)?$usersclass:""; ?>">
				<i class="fa fa-user"></i><span>Admin</span></a>
				<ul class="sub">
					<li><?php echo $this->Html->link("<i class='fa fa-dashboard'></i>Dashboard", array("plugin"=>"","controller"=>"users","action"=>"dashboard","admin"=>true),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link("<i class='fa fa-users'></i>All Users", array("plugin"=>"","controller"=>"users","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				</ul>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" class="<?php echo ($masterclass)?$masterclass:""; ?>">
				  <i class="fa fa-laptop"></i>
				  <span>Masters</span>
				</a>
				<ul class="sub">
					
					<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Countries", array("plugin"=>"","controller"=>"countries","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Buy & Sell", array("plugin"=>"","controller"=>"bscategories","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Event & Shows ", array("plugin"=>"","controller"=>"escategories","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Jobs & Vacancies ", array("plugin"=>"","controller"=>"jvcategories","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>House care services ", array("plugin"=>"","controller"=>"hccategories","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
					
					<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Science & Techno", array("plugin"=>"","controller"=>"stcategories","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Food & Recipes", array("plugin"=>"","controller"=>"frcategories","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Faqcategories", array("plugin"=>"","controller"=>"faqcategories","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				</ul>
			</li>

			
			<li><?php echo $this->Html->link("<i class='fa fa-group'></i>Groups", array("plugin"=>"","controller"=>"groups","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
			<li class="sub-menu">
				<a href="javascript:;" class="<?php echo ($announceclass)?$announceclass:""; ?>">
					<i class="fa fa-user"></i>
					<span>Announcements</span>				
				</a>
				<ul class="sub">
				<li>
				<?php echo $this->Html->link("<i class='fa fa-laptop'></i>Buy & Sales", array("plugin"=>"","controller"=>"buynsales","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Events & Shows", array("plugin"=>"","controller"=>"eventsnshows","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				<li>
				<?php echo $this->Html->link("<i class='fa fa-laptop'></i>Jobs & vacancies", array("plugin"=>"","controller"=>"jobsvacancies","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>House care services", array("plugin"=>"","controller"=>"hcservices","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				
				
				<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Science & techno", array("plugin"=>"","controller"=>"scinteches","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Food & recipes", array("plugin"=>"","controller"=>"foodnrecipes","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				</ul>
			</li>
			<li><?php echo $this->Html->link("<i class='fa fa-comment'></i>Comments", array("plugin"=>"","controller"=>"comments","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
			<li><?php echo $this->Html->link("<i class='fa fa-group'></i>Contact Message", array("plugin"=>"contact","controller"=>"contacts","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
			<li><?php echo $this->Html->link("<i class='fa fa-comment'></i>Subscribers", array("plugin"=>"","controller"=>"subscribers","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
			<li><?php echo $this->Html->link("<i class='fa fa-group'></i>FAQs", array("plugin"=>"","controller"=>"faqs","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
			<li class="sub-menu">
				<a href="javascript:;" class="<?php echo ($aclclass)?$aclclass:""; ?>">
					<i class="fa fa-user"></i>
					<span>Access Control</span>
				</a>
				<ul class="sub">
					<li><?php echo $this->Html->link(__("<i class='fa fa-laptop'></i>Update AROs"), array("plugin"=>"acl_manager","controller"=>"acl","action" => "update_aros"),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link(__("<i class='fa fa-laptop'></i>Update ACOs"), array("plugin"=>"acl_manager","controller"=>"acl","action"=>"update_acos"),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link(__("<i class='fa fa-laptop'></i>Manage permissions"), array("plugin"=>"acl_manager","controller"=>"acl","action"=>"permissions"),array("escape"=>false)); ?></li>
				</ul>
			
			</li>
		</ul>
		<!-- sidebar menu end-->
	</div>
</aside>
<!--sidebar end-->