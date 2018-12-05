<section>

	<?php echo $this->Html->script('bootstrap-filestyle.min',false); ?>
		<div class="card">
			<div id="Agentprofile" class="">
				<?php echo $this->Html->image($currentuser['Agentprofile']['userimage'],array("alt"=>"","class"=>"card-img-top img-responsive")); ?>
			</div>
			<div class="card-body">
				<h5 class="card-title"><?php echo $currentuser['Aagent']['firstname'].'&nbsp;'.$currentuser['Aagent']['lastname']; ?></h5>
			<?php if($currentuser['Aagent']['id'] == $this->Session->read('Auth.Aagent.id')){ ?>
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
			</div><!--card-body -->
		
			<ul class="list-group list-group-flush">
				<li class="list-group-item"><i class="glyphicon glyphicon-earphone"></i>&nbsp;<?php echo $currentuser['Aagent']['phone']; ?></li>
				<li class="list-group-item"><i class="glyphicon glyphicon-envelope"></i>&nbsp;<?php echo $currentuser['Aagent']['email_address']; ?></li>
					
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
				<li class="list-group-item"><i class="glyphicon glyphicon-comment"></i>&nbsp;<?php echo $msgtype.":&nbsp;".$currentuser['Agentprofile']['messanger']; ?></li>
				<li class="list-group-item"><i class="glyphicon glyphicon-map-marker"></i>Location</li>
			</ul>
	</div><!-- card -->
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
<script>$(":file").filestyle({buttonName: "btn btn-info",buttonText: "Change image"});</script>