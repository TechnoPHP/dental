<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<style>
ul, li {
	list-style: none;
	margin: 0px;
	padding: 0px;
}
.team-profile .team-details h4 {
 margin-bottom:.66667rem;
	font-weight: 600;
	color: #007bff;
}
.team-profile .team-details span {
	display: block
}
.social-basic ul {
	width: 100%;
	display: inline-block;
	margin : 15px 0px;
}
.social-basic ul li {
	margin-right: 1.66667rem;
	float: left;
}
.social-basic ul li:last-child {
	margin-right: 0
}
.social-basic ul li a {
	color: #202428;
	-webkit-transition: all .3s ease;
	-o-transition: all .3s ease;
	text-decoration: none;
	transition: all .3s ease
}
.social-basic ul li a:hover {
	color: #4d6de6
}
@media (max-width: 767px) {
.team-profile {
	text-align: center;
}
.team-profile img {
	margin-bottom: 15px;
}
.social-basic ul {
	text-align: center;
}
.social-basic ul li {
	float: none;
	display: inline-block;
}
}
</style>
<?php echo $this->Html->script('bootstrap-filestyle.min',false); ?>
<section class="team-profile pt-5 pb-5">
  <div class="container">
    <div class="row">
    <div class="col-lg-4 col-md-4  col-sm-12"> 
		<div id="Userprofile" class="thumbnail">
			<?php echo $this->Html->image($currentuser['Userprofile']['userimage'],array("alt"=>"","class"=>"img-responsive")); ?>
		</div>
		<?php if($currentuser['User']['id'] == $this->Session->read('Auth.User.id')){ ?>
		<?php echo $this->Form->create('Userprofile',array('id'=>'imgForm','type' => 'file')); ?>
		<div class="form-group">
		<?php echo $this->Form->input("Userprofile.image", array('type'=>'file',"class"=>"filestyle","data-buttonName"=>"btn-default","label"=>false));
		echo $this->Form->error('name',array('style'=>'color:red;'));				 
		echo $this->Form->hidden('Userprofile.user_id', array('value'=>$this->Session->read("Auth.User.id")));
		echo $this->Form->hidden('Userprofile.id', array('value'=>$currentuser['Userprofile']['id']));
		echo $this->Form->end();?>
		</div>
		<div id="reviewloader1" style="display:none; " class="btn btn-primary">Image is being uploaded...</div>
		<div id='uploadError'>
			<?php if ($this->Session->check('Message.flash')):echo $this->Session->flash(); endif;  ?>
		</div>
		<?php } ?>
	</div>
    <div class="col-lg-8  col-md-8  col-sm-12">
        <div class="team-details">
            <h4 class="color-primary"><?php echo $currentuser['User']['firstname']." ".$currentuser['User']['lastname'];?></h4>
            <?php echo $this->Html->link("Update profile",array("plugin"=>false,"controller"=>"userprofiles","action"=>"edit",$currentuser['Userprofile']['id']));?>
		    <span>Founder & CEO</span> 
		    <span><?php echo $this->Time->format($currentuser['Userprofile']['birthdate'], '%B %e, %Y'); ?></span> 
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
			<span><?php echo $msgtype.":&nbsp;".$currentuser['Userprofile']['messanger']; ?></span>
		  <span class="mt-3"> <strong class="color-dark">Expertise:</strong> <a href="">Digital & Strategy</a> </span>
          <div class="social-basic mt-4 mb-4">
            <ul class="list-inline">
              <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
              <li><a href="#"><span class="fab fa-twitter"></span></a></li>
              <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
              <li><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
            </ul>
          </div>
          <p><?php echo $currentuser['Userprofile']['aboutme']; ?></p><hr/>
		   <p><?php echo $currentuser['Userprofile']['quotes']; ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

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
<script>$(":file").filestyle({buttonName: "btn-default",buttonText: "Change image"});</script>