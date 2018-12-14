<?php echo $this->element('admins/sidebar');?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<!--breadcrumbs start -->
				<div class=""> <?php echo $this->Flash->render(); ?></div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					<li class="breadcrumb-item"><?php echo $this->Html->link("<i class='fa fa-home'></i> Home",array("controller"=>"users","action"=>"dashboard","admin"=>true),array("escape"=>false)); ?></li>
					<li class="breadcrumb-item"><a href="#">Agencies</a></li>
					<li class="breadcrumb-item">List</li>
					</ol>
				</nav>
				<!--breadcrumbs end -->
			
				<div class="card">
					<div class="card-header"><h6>List of Agencies<?php echo $this->Html->link("Add New", array("plugin"=>"iagents","controller"=>"agencies","action"=>"create","admin"=>true),array("class"=>"btn btn-sm btn-outline-info float-right")); ?></h6>
					</div>
			
					<div><?php echo $this->Session->flash(); ?> </div>
					
					<div class="card-body">
						
						<table class="table table-bordered table-striped table-condensed">
							<thead>
								<tr>
									<th width="34%">Name</th>
									<th width="10%">City</th>
									<th width="10%">Phone</th>
									<th width="12%">Contact</th>
									<th width="10%">Modified</th>
									<th width="14%">Action</th>									
								</tr>							
							</thead>
							<tbody>
								<?php 
								foreach($agencies as $agency){	?>
								<tr>
									<td><?php echo $agency['Agency']['name']?> </td>
									<td><?php echo $agency['Agency']['city']?> </td>
									<td><?php echo $agency['Agency']['phone'];?> </td>
									<td>
									<?php foreach($agency['Aagent'] as $agent){
									echo $agent['firstname'];
									}?> </td>
									<td><?php echo $this->Time->format('M jS, Y',$agency['Agency']['modified']); ?></td>
									<td><?php echo $this->Html->link('View',array('controller'=>'agencies','action'=>'view/'.$agency['Agency']['id'],'admin'=>true),array('class'=>'badge badge-success')); ?> 
									<?php echo $this->Html->link('Edit',array('controller'=>'agencies','action'=>'edit/'.$agency['Agency']['id'],'admin'=>true),array('class'=>'badge badge-info')); ?> 
									<?php echo $this->Html->link('Delete',array('controller'=>'agencies','action'=>'delete/'.$agency['Agency']['id'],'admin'=>true),array('class'=>'badge badge-danger')); ?></td>
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
	</div>
	</section>
</section>		