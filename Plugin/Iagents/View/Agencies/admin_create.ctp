<?php echo $this->element("admins/sidebar"); ?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><h6>Create New Agency<?php echo $this->Html->link("Back to list", array("controller"=>"agencies","action"=>"index","admin"=>true),array("class"=>"btn btn-sm btn-outline-info float-right")); ?></h6>
					</div>
					<div class="row">
						<div class="col-md-6">						
							<div class="card-body">
								<?php echo $this->Form->create('Agency', array("url"=>array("plugin"=>"iagents","controller"=>"agencies","action"=>"create","admin"=>true),"role"=>"form","class"=>""));?>
								<div class="row">
									<div class="col-md-12 form-group">
										<?php echo $this->Form->text('Agency.name',array("type"=>"text","class"=>"form-control ie7-margin","placeholder"=>"Agency name")); ?>
										<?php echo $this->Form->error('Agency.name'); ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<?php echo $this->Form->textarea('Agency.description',array("rows"=>"4","class"=>"form-control ie7-margin","placeholder"=>"Something about agency")); ?>
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 form-group">
										<?php echo $this->Form->text('Agency.phone',array("type"=>"text","class"=>"form-control ie7-margin","placeholder"=>"Work phone")); ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 form-group">
										<?php echo $this->Form->text('Agency.city',array("type"=>"text","class"=>"form-control ie7-margin","placeholder"=>"City")); ?>
									</div>
									<div class="col-md-6 form-group">
										<?php echo $this->Form->text('Agency.region',array("type"=>"text","class"=>"form-control ie7-margin","placeholder"=>"State")); ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 form-group">
										<?php echo $this->Form->select('Agency.country_id',$appcountries,array("class"=>"form-control ie7-margin","empty"=>"Select country"));?>
										<?php echo $this->Form->error('Agency.country_id'); ?>
									</div>
									<div class="col-md-6 form-group">
										<?php echo $this->Form->text('Agency.zipcode',array("type"=>"text","class"=>"form-control ie7-margin","placeholder"=>"Zipcode"));?>
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
									<label>
									<?php echo $this->Form->checkbox('Agency.active',array()); ?>&nbsp;Make it active</label>
									</div>
									<div class="col-md-6">
										<button type="submit" class="btn btn-primary">Create New Agency</button>
									</div>
								</div>
								<?php echo $this->Form->end(); ?>
							</div>
						</div>
						<div class="col-md-6"> YET TO DECIDE FOR CONTENT</div>
					</div>
                </div>	
		
			</div><!-- end of id welcome -->
		</div><!--/#content.span10-->
	</section>
</section>
<script>
$("select#UserCountryId").change(function()
	  {
		  $("select#UserRegionId").html("<option value=''>Loading...</option>");
		  
		    $.getJSON("http://<?php echo $_SERVER['SERVER_NAME']; ?>/acldemo/"+"regions/getregions/"+$(this).val(),{ajax: 'true'}, function(objData){
		      var options = '<option value="">--- Choose Region ---</option>';
		      if(objData!=null)
		      {
			      $.each(objData, function(i,item){
			    	  
			          options += '<option value="' +i+ '">' +item + '</option>';
			          
			        });
		      }
		      $("select#UserRegionId").html(options);
		    });
	  });
</script>