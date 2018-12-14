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
						<li class="breadcrumb-item"><a href="#">Countries</a></li>
						<li class="breadcrumb-item">List</li>
					</ol>
				</nav>
				<!--breadcrumbs end -->
				<ul class="pagination">
				<?php
					echo $this->Paginator->prev(__('Prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
					echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
				?>
				</ul>
				<div class="card">
					<div class="card-header"><h6>List of Countries<?php echo $this->Html->link("Add New", array("plugin"=>"","controller"=>"countries","action"=>"create","admin"=>true),array("class"=>"btn btn-outline-info float-right btn-sm")); ?></h6></div>
					<div class="card-body">

							
							<table class="table table-bordered table-striped table-condensed">
								<thead>
								<tr>
									<th width="20%">Name</th>
									<th width="8%">ISO-2</th>
									<th width="8%">ISO-3</th>									
									<th width="8%">ISO-#</th>
									<th width="8%">PhCode</th>
									<th width="10%">Latitude</th>
									<th width="10%">Longitude</th>
									<th width="5%">Active</th>									
									<th width="15%">Action</th>								  
								</tr>
								</thead>							
								<tbody>
									<?php //pr($countries);exit;
										foreach($countries as $country){	?>
										<tr>
										
										
										<td><?php echo h($country['Country']['name']); ?>&nbsp;</td>
										<td><?php echo h($country['Country']['iso_2']); ?>&nbsp;</td>
										<td><?php echo h($country['Country']['iso_3']); ?>&nbsp;</td>
										<td><?php echo h($country['Country']['isonumeric']); ?>&nbsp;</td>
										<td><?php echo h($country['Country']['phonecode']); ?>&nbsp;</td>
										<td><?php echo h($country['Country']['lat']); ?>&nbsp;</td>
										<td><?php echo h($country['Country']['long']); ?>&nbsp; </td>
										<td><?php echo ($country['Country']['active']?"Yes":"No"); ?>&nbsp;</td>
										
										<td class="actions">
											<?php echo $this->Html->link(__('View'), array('action' => 'view', $country['Country']['id']),array('class'=>'badge badge-success')); ?>
											<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $country['Country']['id']),array('class'=>'badge badge-info')); ?>
											<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $country['Country']['id']), array('class'=>'badge badge-danger'), __('Are you sure you want to delete # %s?', $country['Country']['id'])); ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>

						<p>
						<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
						));
						?></p>
						<ul class="pagination">
							<?php
								echo $this->Paginator->prev(__('Prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
								echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
								echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
							?>
						</ul>
					</div><!--/#content-->
				</div><!-- panel -->
			</div><!--/col-lg-12-->
		</div>
	</section>
</section>