<div class="container">
	<div class="well well-lg" style="background-image:url('../../img/service/<?php echo strtolower($category['Category']['name']);?>.jpg');background-size:cover;">
	<div class="">
	<?php echo $this->Html->link($category['ParentCategory']['name'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id'])); ?>
	<h2 style="color:#fff"><?php echo $category['Category']['marketingslogan'];?></h2>
		<p style="color:#fff"><?php echo $category['Category']['marketingtext'];?></p>
		<p style="color:#fff"><?php echo $category['Category']['description'];?></p>
		<p>
		  <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">Book your service now &raquo;</a>
		</p>
	</div>
	</div>
</div> <!-- /container -->