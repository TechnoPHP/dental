<aside>	
	<?php
		echo $this->element('user_profile');	
	?>
	<hr>
	<div class="widget">
		<h4>The Quote</h4>
		<p><?php echo $currentuser['Agentprofile']['quotes']; ?></p>
	</div><!-- End widget -->
	<hr>
</aside>