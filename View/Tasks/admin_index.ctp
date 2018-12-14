<?php echo $this->element("admins/sidebar"); ?>	
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<!--breadcrumbs start -->
				<div class=""><?php echo $this->Session->flash(); ?> </div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><?php echo $this->Html->link("<i class='fa fa-home'></i> Home",array("controller"=>"users","action"=>"dashboard","admin"=>true),array("escape"=>false)); ?></li>
						<li class="breadcrumb-item"><a href="#">Tasks</a></li>
						<li class="breadcrumb-item">List</li>
					</ol>
				</nav>
				<!--breadcrumbs end -->
				<div class="card">
					<div class="card-header"><h6>List of Tasks<?php echo $this->Html->link("Add New", array("plugin"=>"","controller"=>"tasks","action"=>"create","admin"=>true),array("class"=>"btn btn-outline-info btn-sm float-right")); ?></h6></div>
					<div class="card-body">
						
							<table class="table table-bordered table-striped table-condensed">
								<thead>
								<tr>
									<th width="40%">Task</th>
									<th width="15%">Category</th>
									<th width="5%">Active</th>
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
		<td><?php echo $this->Time->format('M j, Y',$task['Task']['modified']); ?></td>
		
		<td class="">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $task['Task']['id']),array('class'=>'badge badge-success')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $task['Task']['id']),array('class'=>'badge badge-info')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $task['Task']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $task['Task']['id']),'class'=>'badge badge-danger')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	
							</table>						
						
					</div><!--/#content.span10-->
				</div><!-- panel -->
			</div><!--/col-lg-12-->
		</div>
	</section>
</section>