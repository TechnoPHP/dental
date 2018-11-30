<?php echo $this->element("admins/sidebar"); ?>	
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<!--breadcrumbs start -->
				<div class=""><?php echo $this->Session->flash(); ?> </div>
				<ul class="breadcrumb">
					<li><?php echo $this->Html->link("<i class='fa fa-home'></i> Home",array("controller"=>"users","action"=>"dashboard","admin"=>true),array("escape"=>false)); ?></li>
					<li><a href="#">Categories</a></li>
					<li class="active">List</li>
				</ul>
				<!--breadcrumbs end -->
				<section class="panel">
					<header class="panel-heading">List of Categories<div class="pull-right"><?php echo $this->Html->link("Add New", array("plugin"=>"","controller"=>"categories","action"=>"create","admin"=>true)); ?></div></header>
					<div class="panel-body">
						<section id="unseen">
							<table class="table table-bordered table-striped table-condensed">
								<thead>
								<tr>
									<th width="30%">Name</th>
									<th width="35%">Parent</th>									
									<th width="5%">Status</th>
									<th width="11%">Created</th>
									<th width="15%">Action</th>								  
								</tr>
								</thead>							
								<tbody>
									<?php //pr($postcategories);exit;
										foreach($categories as $postcategory){	?>
										<tr>
										
										
										<td><?php echo h($postcategory['Category']['name']); ?>&nbsp;</td>
										<td>
											<?php echo $this->Html->link($postcategory['ParentCategory']['name'], array('controller' => 'categories', 'action' => 'view', $postcategory['ParentCategory']['id'])); ?>
										</td>
										<td><?php echo ($postcategory['Category']['active']?"Yes":"No"); ?>&nbsp;</td>										
										<td><?php echo $this->Time->format($postcategory['Category']['created'],'%B %e, %Y'); ?>&nbsp;</td>
										<td class="actions">
											<?php echo $this->Html->link(__('View'), array('action' => 'view', $postcategory['Category']['id']),array('class'=>'btn btn-success btn-xs')); ?>
											<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $postcategory['Category']['id']),array('class'=>'btn btn-info btn-xs')); ?>
											<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $postcategory['Category']['id']), array('class'=>'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $postcategory['Category']['id'])); ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>						
						</section> <!-- unseen -->
					</div><!--/#content.span10-->
				</section><!-- panel -->
			</div><!--/col-lg-12-->
		</div>
	</section>
</section>