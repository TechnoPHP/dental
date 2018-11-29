<section>
	<address>
	<?php echo $this->Html->script('bootstrap-filestyle.min',false); ?>
		<div class="row">
			<div class="col-md-12">
			<h4><?php echo $currentuser['Aagent']['firstname'].'&nbsp;'.$currentuser['Aagent']['lastname']; ?></strong></h4><hr>
			
			
				<div id="Agentprofile" class="thumbnail">
					<?php echo $this->Html->image($currentuser['Agentprofile']['userimage'],array("alt"=>"","class"=>"img-responsive")); ?>
				</div>
				<?php if($currentuser['Aagent']['id'] == $this->Session->read('Auth.Agent.id')){ ?>
				<?php echo $this->Form->create('Agentprofile',array('id'=>'imgForm','type' => 'file')); ?>
				<div class="form-group">
				<?php echo $this->Form->input("Agentprofile.image", array('type'=>'file',"class"=>"filestyle","data-buttonName"=>"btn-default","label"=>false));
				echo $this->Form->error('name',array('style'=>'color:red;'));				 
				echo $this->Form->hidden('Agentprofile.aagent_id', array('value'=>$this->Session->read("Auth.Agent.id")));
				echo $this->Form->hidden('Agentprofile.id', array('value'=>$currentuser['Agentprofile']['id']));
				echo $this->Form->end();?>
				</div>
				<div id="reviewloader1" style="display:none; " class="btn btn-primary">Image is being uploaded...</div>
				<div id='uploadError'>
					<?php if ($this->Session->check('Message.flash')):echo $this->Session->flash(); endif;  ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h5><i class="glyphicon glyphicon-earphone"></i>&nbsp;<?php echo $currentuser['Aagent']['phone']; ?></h5>
				<h5><i class="glyphicon glyphicon-envelope"></i>&nbsp;<?php echo $currentuser['Aagent']['email_address']; ?></h5>
				
				<?php $msgtype=null;
				if (isset($currentuser['Agentprofile']['msgtype']) && (!empty($currentuser['Agentprofile']['msgtype']))){
					switch($currentuser['Agentprofile']['msgtype']){
						case 'HOT':		$msgtype = 'Hotmail';break;
						case 'YAH':		$msgtype = 'Yahoo';break;
						case 'SKY':		$msgtype = 'Skype';break;
						default : $msgtype = 'Messanger';
					}
				}
				?>
				<h5><i class="glyphicon glyphicon-comment"></i>&nbsp;<?php echo $msgtype.":&nbsp;".$currentuser['Agentprofile']['messanger']; ?></h5>
				<h5><i class="glyphicon glyphicon-map-marker"></i>&nbsp;</h5>
			</div>
		</div>
	</address>
</section><!-- /section -->
<script type="text/javascript">
	$('#AgentprofileImage').on('change',(function(e) { 
        if($.trim($('#AgentprofileImage').val()) == ''){
			document.getElementById('uploadError').innerHTML = 'Please select file';
			document.getElementById('uploadError').style.display = 'block';
			return false;
		}else{
			document.getElementById('uploadError').style.display = 'none';
			document.getElementById('reviewloader1').style.display = 'block';
	        e.preventDefault();
	        
			var formData = new FormData($('#imgForm')[0]);
			
	        $.ajax({
	            type:'POST',
	            url: '<?php echo Router::url('/');?>' + 'iagents/agentprofiles/uploadimage/',
				data:formData,
	            cache:false,
	            contentType: false,
	            processData: false,
	            success:function(data){
	            	$('#Agentprofile').html(data);
	               	document.getElementById('reviewloader1').style.display = 'none';
	            },
	            error: function(data){
	                console.log("error");
	                console.log(data);
	            }
	        });
	     }
    }));
</script>
<script>$(":file").filestyle({buttonName: "btn-default",buttonText: "Change image"});</script>