<?php echo $this->element('admins/sidebar');?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<!--breadcrumbs start -->
				<div class=""><?php echo $this->Session->flash(); ?> </div>
				<ul class="breadcrumb">
					<li><?php echo $this->Html->link("<i class='fa fa-home'></i> Home",array("controller"=>"admins","action"=>"dashboard","admin"=>true),array("escape"=>false)); ?></li>
					<li><a href="#">Users</a></li>
					<li class="active">List</li>
				</ul>
				<!--breadcrumbs end -->
				<div class="row">
			<div class="panel-body">
				<section class="panel">
				<?php echo $this->Form->create("Admin",array("url"=>array("plugin"=>false,"controller"=>"admins","action"=>"index","admin"=>true))); ?>
					<div class="col-md-3">
					

					</div>
					<div class="col-md-3">
					Group<br>
					<?php echo $this->Form->select('Admin.admingroup_id', $admingroups, array("empty"=>"--Select Group--","class"=>"form-control"), false);?>
					<?php echo $this->Form->error('Admingroup.name');?>
					</div>
					<div class="col-md-6">
						<?php echo $this->Form->submit("Filter",array("class"=>"btn btn-primary")); ?>
					</div>
				<?php	echo $this->Form->end();?>
				</section>
				</div>
				</div>
				<section class="panel">
					<header class="panel-heading">
					List of Users
					<div class="pull-right">
						<?php echo $this->Html->link("Add New", array("controller"=>"admins","action"=>"create","admin"=>true)); ?>
					</div>
					</header>
			
					<div><?php echo $this->Session->flash(); ?> </div>
					
					<div class="panel-body">
						<section id="unseen">								
							<table class="table table-bordered table-striped table-condensed">
								<thead>
									<tr>
										<th width="10%">First Name</th>
										<th width="10%">Last Name</th>
										<th width="34%">Email</th>
										
										<th width="7%">Group</th>
										<th width="10%">Modified</th>
										<th width="14%" style="text-align:right">Action</th>									
									</tr>							
								</thead>
								<tbody>
									<?php 
									foreach($admins as $admin){	?>
									<tr>
										<td><?php echo $admin['Admin']['firstname']?> </td>
										<td><?php echo $admin['Admin']['lastname']?> </td>
										<td><?php echo $admin['Admin']['email_address'];?> </td>
									
									
										<td><?php echo $admin['Admingroup']['name']; ?></td>
										<td><?php echo $this->Time->format($admin['Admin']['modified'], '%B %e, %Y'); ?></td>
										<td style="text-align:right"><?php echo $this->Html->link('View',array('controller'=>'admins','action'=>'view/'.$admin['Admin']['id'],'admin'=>true),array('class'=>'btn btn-success btn-xs')); ?> 
										<?php echo $this->Html->link('Edit',array('controller'=>'admins','action'=>'edit/'.$admin['Admin']['id'],'admin'=>true),array('class'=>'btn btn-info btn-xs')); ?> 
										<?php echo $this->Html->link('Delete',array('controller'=>'admins','action'=>'delete/'.$admin['Admin']['id'],'admin'=>true),array('class'=>'btn btn-danger btn-xs')); ?></td>
									</tr>
									<?php } ?>					
								</tbody>
							</table>
						</section><!-- unseen -->
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
				</section><!-- panel -->
			</div><!--/col-lg-12-->
		</div>
	</div>
	</section>
</section>		