<?php echo $this->element("admins/sidebar"); ?>	
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<!--breadcrumbs start -->
				<ul class="breadcrumb">
					<li><?php echo $this->Html->link("<i class='fa fa-home'></i> Home",array("controller"=>"admins","action"=>"dashboard","admin"=>false),array("escape"=>false)); ?></li>
					<li><a href="#">User Groups</a></li>
					<li class="active">List</li>
				</ul>
				<!--breadcrumbs end -->
				<section class="panel">
					<header class="panel-heading">List of User groups<div class="pull-right"><?php echo $this->Html->link("Add New", array("controller"=>"groups","action"=>"create","admin"=>true)); ?></div></header>
					<?php echo $this->Session->flash('auth');?>
					<div class="panel-body">
						<section id="unseen">
							<table class="table table-bordered table-striped table-condensed">
								<thead>
								<tr>
									<th>Group</th>
									<th>Description</th>
									<th>Active</th>
									<th>Action</th>								  
								</tr>
								</thead>							
								<tbody>
									<?php //pr($admingroups); 
									foreach($groups as $group){	?>
										<tr>
										<td><?php echo $group['Group']['name']; ?> </td>
										<td><?php echo $group['Group']['description']; ?> </td>
										<td><?php echo ($group['Group']['active'])?"Yes":"No"; ?></td>
										<td>
											<?php echo $this->Html->link('View',array('controller'=>'groups','action'=>'view/'.$group['Group']['id'],'admin'=>true),array('class'=>'btn btn-success btn-xs')); ?>
										
											<?php echo $this->Html->link('Edit',array('controller'=>'groups','action'=>'edit/'.$group['Group']['id'],'admin'=>true),array('class'=>'btn btn-info btn-xs')); ?>
										
											<?php echo $this->Html->link('Delete',array('controller'=>'groups','action'=>'delete/'.$group['Group']['id'],'admin'=>true),array('class'=>'btn btn-danger btn-xs'),"Are you sure you want to delete?"); ?>
										</td>										
										</tr>
									<?php }	?>
								</tbody>
							</table>						
						</section> <!-- unseen -->
					</div><!--/#content.span10-->
				</section><!-- panel -->
			</div><!--/col-lg-12-->
		</div>
	</section>
</section>