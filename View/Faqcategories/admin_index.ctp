<?php echo $this->element("admins/sidebar"); ?>	
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<!--breadcrumbs start -->
				<div class="info-success"><?php echo $this->Flash->render(); ?> </div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><?php echo $this->Html->link("<i class='fa fa-home'></i> Home",array("controller"=>"users","action"=>"dashboard","admin"=>true),array("escape"=>false)); ?></li>
						<li class="breadcrumb-item"><a href="#">FAQ Categories</a></li>
						<li class="breadcrumb-item">List</li>
					</ol>
				</nav>
				<!--breadcrumbs end -->
				<div class="card">
					<div class="card-header"><h6>List of FAQ Categories<?php echo $this->Html->link("Add New", array("plugin"=>"","controller"=>"faqcategories","action"=>"create","admin"=>true),array("class"=>"btn btn-outline-info btn-sm float-right")); ?></h6></div>
					<div class="card-body">

							<table class="table table-bordered table-striped table-condensed">
								<thead>
								<tr>
									<th width="30%">Name</th>
									<th width="5%">Status</th>
									<th width="11%">Created</th>
									<th width="15%">Action</th>								  
								</tr>
								</thead>							
								<tbody>
									<?php //pr($faqcategories);exit;
										foreach($faqcategories as $faqcategory){	?>
										<tr>
										
										
										<td><?php echo h($faqcategory['Faqcategory']['name']); ?>&nbsp;</td>
										
										<td><?php echo ($faqcategory['Faqcategory']['active']?"Yes":"No"); ?>&nbsp;</td>										
										<td><?php echo $this->Time->format('M j, Y',$faqcategory['Faqcategory']['created']); ?>&nbsp;</td>
										<td class="actions">
											<?php echo $this->Html->link(__('View'), array('action' => 'view', $faqcategory['Faqcategory']['id']),array('class'=>'badge badge-success')); ?>
											<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $faqcategory['Faqcategory']['id']),array('class'=>'badge badge-info')); ?>
											<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $faqcategory['Faqcategory']['id']), array('class'=>'badge badge-danger'), __('Are you sure you want to delete # %s?', $faqcategory['Faqcategory']['id'])); ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>						

					</div><!--/#content.span10-->
				</div><!-- panel -->
			</div><!--/col-lg-12-->
		</div>
	</section>
</section>