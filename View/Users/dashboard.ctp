<?php echo $this->Html->script('bootstrap-filestyle.min',false); ?>

<div class="container">
    <div class="row mb-3">
    <div class="col-md-4"> 
		<div id="Userprofile" class="card">
			<?php echo $this->Html->image($currentuser['Userprofile']['userimage'],array("alt"=>"","class"=>"img-fluid mb-2")); ?>
			<div class="card-body">
			<?php if($currentuser['User']['id'] == $this->Session->read('Auth.User.id')){ ?>
			<?php echo $this->Form->create('Userprofile',array('id'=>'imgForm','type' => 'file')); ?>
			<div class="card-title"><?php echo $currentuser['User']['firstname']." ".$currentuser['User']['lastname'];?></div>
			<?php echo $this->Form->input("Userprofile.image", array('type'=>'file',"label"=>false));
			echo $this->Form->error('name',array('style'=>'color:red;'));				 
			echo $this->Form->hidden('Userprofile.user_id', array('value'=>$this->Session->read("Auth.User.id")));
			echo $this->Form->hidden('Userprofile.id', array('value'=>$currentuser['Userprofile']['id']));
			echo $this->Form->end();?>
		
			<div id="reviewloader1" style="display:none; " class="btn btn-primary">Image is being uploaded...</div>
			<div id='uploadError'>
				<?php if ($this->Session->check('Message.flash')):echo $this->Session->flash(); endif;  ?>
			</div>
			<?php } ?>
		
	</div><!-- card-body -->

			
			<ul class="list-group list-group-flush">	
				<li class="list-group-item">Founder & CEO</li>
				<li class="list-group-item"><?php echo $this->Time->format($currentuser['Userprofile']['birthdate'], '%B %e, %Y'); ?></li> 
				<?php $msgtype=null;
					if (isset($currentuser['Userprofile']['msgtype']) && (!empty($currentuser['Userprofile']['msgtype']))){
						switch($currentuser['Userprofile']['msgtype']){
							case 'HOT':		$msgtype = 'Hotmail';break;
							case 'YAH':		$msgtype = 'Yahoo';break;
							case 'SKY':		$msgtype = 'Skype';break;
							default : $msgtype = 'Messanger';
						}
					}
				?>
				<li class="list-group-item"><?php echo $msgtype.":&nbsp;".$currentuser['Userprofile']['messanger']; ?></li>
				<li class="list-group-item"> <strong class="color-dark">Expertise:</strong> <a href="">Digital & Strategy</a> </li>
			</ul>
			  
			
		</div><!--card -->
	</div>

    <div class="col-md-8">
		<div class="border-bottom pb-2 w-100 text-right">
		<?php echo $this->Html->link("Update profile",array("plugin"=>false,"controller"=>"userprofiles","action"=>"edit",$currentuser['Userprofile']['id']),array("class"=>"btn btn-info"));?></div>
		
        <p><?php echo $currentuser['Userprofile']['aboutme']; ?></p><hr/>
		<p><?php echo $currentuser['Userprofile']['quotes']; ?></p>
        </div>
      </div>
    </div><!--row  -->
</div><!--container -->


<script type="text/javascript">
	$('#UserprofileImage').on('change',(function(e) { 
        if($.trim($('#UserprofileImage').val()) == ''){
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
	            url: '<?php echo Router::url('/');?>' + 'userprofiles/uploadimage/',
				data:formData,
	            cache:false,
	            contentType: false,
	            processData: false,
	            success:function(data){
	            	$('#Userprofile').html(data);
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
<script>$(":file").filestyle({buttonName: "btn-info",buttonText: "Change image"});</script>