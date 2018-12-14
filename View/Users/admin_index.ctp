<?php echo $this->element('admins/sidebar');?>
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
					<li class="breadcrumb-item"><a href="#">Users</a></li>
					<li class="breadcrumb-item">List</li>
					</ol>
				</nav>
				<!--breadcrumbs end -->
				<div><?php echo $this->Session->flash(); ?> </div>
				<div class="">
					<div class="card mb-3">
						<div class="card-body">
						
						<?php echo $this->Form->create("User",array("url"=>array("plugin"=>false,"controller"=>"users","action"=>"index","admin"=>true))); ?>
							
							<div class="form-inline">
								<?php echo $this->Form->select('User.group_id', $groups, array("empty"=>"--Select Group--","class"=>"form-control  mx-sm-3"), false);?>
								<?php echo $this->Form->submit("Filter",array("class"=>"btn btn-sm btn-primary")); ?>
								<?php echo $this->Form->error('User.group_id');?>
							
								
							</div>
						<?php	echo $this->Form->end();?>
						
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header"><h6>List of Users<?php echo $this->Html->link("Add New", array("controller"=>"users","action"=>"create","admin"=>true),array("class"=>"btn btn-outline-info btn-sm float-right")); ?></h6>
					</div>
					<div class="card-body">
						
						<table class="table table-bordered table-striped table-condensed">
							<thead>
								<tr>
									<th width="10%">First Name</th>
									<th width="10%">Last Name</th>
									<th width="34%">Email</th>
									<th width="7%">Group</th>
									<th width="10%">Modified</th>
									<th width="14%">Action</th>									
								</tr>							
							</thead>
							<tbody>
								<?php 
								foreach($users as $user){	?>
								<tr>
									<td><?php echo $user['User']['firstname']?> </td>
									<td><?php echo $user['User']['lastname']?> </td>
									<td><?php echo $user['User']['email_address'];?> </td>
								
								
									<td><?php echo $user['Group']['name']; ?></td>
									<td><?php echo $this->Time->format('M j, Y',$user['User']['modified']); ?></td>
									<td><?php echo $this->Html->link('View',array('controller'=>'users','action'=>'view/'.$user['User']['id'],'admin'=>true),array('class'=>'badge badge-success')); ?> 
									<?php echo $this->Html->link('Edit',array('controller'=>'users','action'=>'edit/'.$user['User']['id'],'admin'=>true),array('class'=>'badge badge-info')); ?> 
									<?php echo $this->Html->link('Delete',array('controller'=>'users','action'=>'delete/'.$user['User']['id'],'admin'=>true),array('class'=>'badge badge-danger')); ?></td>
								</tr>
								<?php } ?>					
							</tbody>
						</table>
						
						<p>
						<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
						));
						?>	</p>
						
						<ul class="pagination">
							<?php
								echo $this->Paginator->prev(__('Prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
								echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
								echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
							?>
						</ul>
					</div>
				</div><!-- panel -->
			</div><!--/col-lg-12-->
		</div>
	
	</section>
</section>		