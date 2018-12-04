<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6">
				<?php echo $this->Form->create('Worker', array("url"=>array("controller"=>"workers",'action'=>'create','admin'=>false)));	?>
				<section class="panel">
					<span class="panel-heading">Worker's personal information</span>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label for="parentcategoryname">Category</label>
									<?php echo $this->Form->select('Worker.category_id',$categories,array("class"=>"form-control","empty"=>"Select Category")); ?>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">First Name</label>
									<?php echo $this->Form->text('Worker.firstname',array("class"=>"form-control","placeholder"=>"First Name"));?>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Last Name</label>
									<?php echo $this->Form->text('Worker.lastname',array("class"=>"form-control","placeholder"=>"Last Name")); ?>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Date of birth</label>
									<?php echo $this->Form->text('Worker.dateofbirth',array("class"=>"form-control","placeholder"=>"First Name"));?>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Gender</label><br>
									<?php  $options = array('M'=>'Male','F'=>'Female');
									echo $this->Form->radio('Worker.gender',$options,array("legend"=>false,"before"=>"&nbsp;&nbsp;&nbsp;","separator"=>"&nbsp;&nbsp;&nbsp;&nbsp;")); ?>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Phone</label>
									<?php echo $this->Form->text('Worker.phone',array("class"=>"form-control","placeholder"=>"Phone"));?>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Any field now</label>
									<?php echo $this->Form->text('Worker.anyfieldnow',array("class"=>"form-control","placeholder"=>"Any field now")); ?>
								</div>
							</div>
						</div>
					</div> <!--panel-body -->
				</section>
				
					
				<section class="panel">
					<span class="panel-heading">Worker's Current Address</span>
					<div class="panel-body">				
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Street address</label>
									<?php echo $this->Form->text('Worker.ctaddress',array("class"=>"form-control","placeholder"=>"Street address"));?>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Nearby landmark</label>
									<?php echo $this->Form->text('Worker.ctlandmark',array("class"=>"form-control","placeholder"=>"Nearby landmark")); ?>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Area/Locality</label>
									<?php echo $this->Form->text('Worker.ctarea',array("class"=>"form-control","placeholder"=>"Area or locality"));?>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">City</label>
									<?php echo $this->Form->text('Worker.ctcity',array("class"=>"form-control","placeholder"=>"City name")); ?>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">State</label>
									<?php echo $this->Form->text('Worker.ctstate',array("class"=>"form-control","placeholder"=>"State"));?>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Pincode</label>
									<?php echo $this->Form->text('Worker.ctpincode',array("class"=>"form-control","placeholder"=>"Pincode")); ?>
								</div>
							</div>
						</div>
					</div> <!--pannel-body -->
				</section>
					
				<section class="panel">
					<span class="panel-heading">Worker's Permenent Address<span class="pull-right"><?php echo $this->Form->checkbox("Worker.sameasct"); ?>&nbsp;Same as current address</span></span>
					<div class="panel-body">
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Street address</label>
									<?php echo $this->Form->text('Worker.ptaddress',array("class"=>"form-control","placeholder"=>"Street address"));?>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Nearby landmark</label>
									<?php echo $this->Form->text('Worker.ptlandmark',array("class"=>"form-control","placeholder"=>"Nearby landmark")); ?>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Area/Locality</label>
									<?php echo $this->Form->text('Worker.ptarea',array("class"=>"form-control","placeholder"=>"Area or locality"));?>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">City</label>
									<?php echo $this->Form->text('Worker.ptcity',array("class"=>"form-control","placeholder"=>"City name")); ?>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">State</label>
									<?php echo $this->Form->text('Worker.ptstate',array("class"=>"form-control","placeholder"=>"State"));?>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<label for="categoryname">Pincode</label>
									<?php echo $this->Form->text('Worker.ptpincode',array("class"=>"form-control","placeholder"=>"Pincode")); ?>
								</div>
							</div>
						</div>
					</div> <!--pannel-body -->
				</section>
				<section class="panel">
					<span class="panel-heading">Remarks</span>
					<div class="panel-body">
						<div class="row">	
							<div class="col-md-12">
								<div class="form-group">
								<label for="categoryname">Agent`s Remark</label>
									<?php echo $this->Form->textarea('Worker.agentremark',array("class"=>"form-control","placeholder"=>"agent remark","rows"=>"3")); ?>
								</div>
							</div>
						</div>
					</div><!--pannel-body -->
				</section>
					<div class="row">
						<div class="col-md-3">
							<div class="checkbox">
								<label>
								<?php echo $this->Form->checkbox('Worker.active',array()); ?>&nbsp;Make it active</label>
							</div>
						</div>
					
						<div class="col-md-3">
							<div class="form-group">
							<input name="" type="submit" value="Create worker profile" class="btn btn-success" />
						</div>
					</div>
					
				<?php echo $this->Form->end(); ?>
				</div>
			</div><!--col-md-6 -->
			<div class="col-md-6">	
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
    $("#WorkerSameasct").on("click", function(){
        if (this.checked) { 
                $("#WorkerPtaddress").val($("#WorkerCtaddress").val());$("#WorkerPtlandmark").val($("#WorkerCtlandmark").val());
				$("#WorkerPtarea").val($("#WorkerCtarea").val());$("#WorkerPtcity").val($("#WorkerCtcity").val());
                $("#WorkerPtstate").val($("#WorkerCtstate").val());$("#WorkerPtpincode").val($("#WorkerCtpincode").val());
		}
		else {
			$("#WorkerPtaddress").val('');$("#WorkerPtlandmark").val('');
			$("#WorkerPtarea").val('');$("#WorkerPtcity").val('');
			$("#WorkerPtstate").val('');$("#WorkerPtpincode").val('');
		}
    });
});
</script>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Workers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Aagents'), array('controller' => 'aagents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aagent'), array('controller' => 'aagents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Admins'), array('controller' => 'admins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Admin'), array('controller' => 'admins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workerprofiles'), array('controller' => 'workerprofiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workerprofile'), array('controller' => 'workerprofiles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workerreferences'), array('controller' => 'workerreferences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workerreference'), array('controller' => 'workerreferences', 'action' => 'add')); ?> </li>
	</ul>
</div>
