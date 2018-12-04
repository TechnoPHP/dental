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
					<li><a href="#">Tasks</a></li>
					<li class="active">List</li>
				</ul>
				<!--breadcrumbs end -->
				<section class="panel">
					<header class="panel-heading">List of Tasks<div class="pull-right"><?php echo $this->Html->link("Add New", array("plugin"=>"","controller"=>"tasks","action"=>"create","admin"=>true)); ?></div></header>
					<div class="panel-body">
						<section id="unseen">
							<table class="table table-bordered table-striped table-condensed">
								<thead>
								<tr>
									<th width="40%">Task</th>
									<th width="15%">Category</th>
									<th width="5%">Active</th>
									<th width="11%">Created</th>
									<th width="11%">Modified</th>
									<th width="15%">Action</th>								  
								</tr>
								</thead>

	<tbody>
	<?php foreach ($tasks as $task): ?>
	<tr>
		<td><?php echo h($task['Task']['title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($task['Category']['name'], array('controller' => 'categories', 'action' => 'view', $task['Category']['id'])); ?>
		</td>
<td><?php echo ($task['Task']['active']?"Yes":"No"); ?>&nbsp;</td>
		<td><?php echo h($task['Task']['created']); ?>&nbsp;</td>
		<td><?php echo h($task['Task']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $task['Task']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $task['Task']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $task['Task']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $task['Task']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	
							</table>						
						</section> <!-- unseen -->
					</div><!--/#content.span10-->
				</section><!-- panel -->
			</div><!--/col-lg-12-->
		</div>
	</section>
</section>