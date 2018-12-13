<!---Service Section Start-->
<div class="service bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading-col">
					<h2>Featured Services</h2>
					<div class="border"></div>
					<p class="down">Our expert staffs always provide premium quality service</p>
					<div class="gap-30"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<?php foreach($appfcategories as $key=>$service) { ?>
			<div class="col-md-4 col-sm-6">
				<div class="media">
					<!--div class="media-left media-middle">
					  <p><i class="fa fa-heart"></i></p>
					</div -->
					<div class="media-body">
						<h4 class="media-heading"><?php echo ucfirst($service); ?></h4>
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