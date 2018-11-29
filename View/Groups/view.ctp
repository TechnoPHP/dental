<?php echo $this->element("admin/admin_sidebar"); ?>	
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<!--breadcrumbs start -->
				<ul class="breadcrumb">
					<li><?php echo $this->Html->link("<i class='fa fa-home'></i> Home",array("controller"=>"users","action"=>"dashboard","admin"=>true),array("escape"=>false)); ?></li>
					<li><a href="#">Group</a></li>
					<li class="active">Detail</li>
				</ul>
				<!--breadcrumbs end -->
				<section class="panel">
					<header class="panel-heading">Detail of <div class="pull-right"><?php echo $this->Html->link("Back to list", array("controller"=>"groups","action"=>"index","admin"=>true)); ?></div>
					</header>
					<div><?php echo $this->Session->flash(); ?> </div>
					<div class="row">
						<div class="col-md-6">						
							<div class="panel-body">
								<p><label>Name </label><?php echo $group['Group']['name']?></p>
							</div>
						</div>
					</div>
				</section><!-- panel -->
			</div><!--/col-lg-12-->
		</div>
	</section>
</section>