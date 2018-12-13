<!---Service Section Start-->
<div class="service">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading-col">
					<h2>Featured Services</h2>
					<div class="border"></div>
					<p class="down mb-3">Our expert staffs always provide premium quality service</p>
					
				</div>
			</div>
		</div>

		<div class="row">
			<?php foreach($appfcategories as $key=>$service) { ?>
			<div class="col-md-4">
				<div class="card">
					
					<div class="card-body">
					<h4 class="card-title"><?php echo ucfirst($service); ?></h4>
					<?php echo $this->Html->image("service/".$service.".jpg",array("class"=>"img-fluid")); ?>	
						
						<p><?php //echo $service[''][''];?></p>
					</div>
				</div>
			</div>
			<?php } ?>	
		</div>
	</div>
</div>
<!---Service Section Ends-->