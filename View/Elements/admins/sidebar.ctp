<!--sidebar start-->
<aside>
	<div id="sidebar" class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">
		  
			<li class="sub-menu">			
				<a href="javascript:;" class="<?php echo ($usersclass)?$usersclass:""; ?>">
				<i class="fa fa-user"></i><span>Admin</span></a>
				<ul class="sub">
					<li><?php echo $this->Html->link("<i class='fa fa-dashboard'></i>Dashboard", array("plugin"=>false,"controller"=>"admins","action"=>"dashboard","admin"=>true),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link("<i class='fa fa-users'></i>All Users", array("plugin"=>false,"controller"=>"users","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				</ul>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" class="<?php echo ($masterclass)?$masterclass:""; ?>">
				  <i class="fa fa-laptop"></i>
				  <span>Masters</span>
				</a>
				<ul class="sub">
					
					<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Countries", array("plugin"=>false,"controller"=>"countries","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>					
					<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Categories", array("plugin"=>false,"controller"=>"categories","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Faqcategories", array("plugin"=>false,"controller"=>"faqcategories","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				</ul>
			</li>
			<li><?php echo $this->Html->link("<i class='fa fa-group'></i>Admin Groups", array("plugin"=>false,"controller"=>"admingroups","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
			<li><?php echo $this->Html->link("<i class='fa fa-group'></i>User Groups", array("plugin"=>false,"controller"=>"groups","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
			<li class="sub-menu">
				<a href="javascript:;" class="<?php echo ($announceclass)?$announceclass:""; ?>">
					<i class="fa fa-user"></i>
					<span>Users</span>
				</a>
				<ul class="sub">
				<li>
				<?php echo $this->Html->link("<i class='fa fa-laptop'></i>Administrators", array("plugin"=>false,"controller"=>"admins","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				<li><?php echo $this->Html->link("<i class='fa fa-laptop'></i>Users", array("plugin"=>false,"controller"=>"users","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				</ul>
			</li>
			<li><?php echo $this->Html->link("<i class='fa fa-comment'></i>Comments", array("plugin"=>false,"controller"=>"comments","action"=>"index","admin"=>false),array("escape"=>false)); ?></li>
			<li><?php echo $this->Html->link("<i class='fa fa-group'></i>Contact Message", array("plugin"=>"contact","controller"=>"contacts","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
			<li><?php echo $this->Html->link("<i class='fa fa-comment'></i>Subscribers", array("plugin"=>false,"controller"=>"subscribers","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
			<li><?php echo $this->Html->link("<i class='fa fa-group'></i>FAQs", array("plugin"=>false,"controller"=>"faqs","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
			<li class="sub-menu">
				<a href="javascript:;" class="<?php echo ($aclclass)?$aclclass:""; ?>">
					<i class="fa fa-user"></i>
					<span>Access Control</span>
				</a>
				<ul class="sub">
					<li><?php echo $this->Html->link(__("<i class='fa fa-laptop'></i>Update AROs"), array("plugin"=>"AclManager"),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link(__("<i class='fa fa-laptop'></i>Update ACOs"), array("plugin"=>"AclManager"),array("escape"=>false)); ?></li>
					<li><?php echo $this->Html->link(__("<i class='fa fa-laptop'></i>Manage permissions"), array("controller"=>"AclManagers","action"=>"index","admin"=>true),array("escape"=>false)); ?></li>
				</ul>
			</li>
		</ul>
		<!-- sidebar menu end-->
	</div>
</aside>
<!--sidebar end-->