<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Dental site');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
/*'slicknav',*/
		echo $this->Html->css(array('bootstrap.min','superfish','animate','magnific-popup','font-awesome.min','style'));
		//echo $this->Html->script();
		echo $this->Html->script(array('jquery-2.2.4.min','popper.min','bootstrap.min'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	
	<div id="preloader">
		<div id="status"></div>
	</div>
	
	<div id="">
		<?php echo $this->element('header'); ?>
	</div>
	<div id="">

		<?php //echo $this->Flash->render(); ?>
<?php echo $this->Flash->render('auth');?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<div id="">
		<?php echo $this->element('footer'); ?>
	</div>
	
	<?php echo $this->element('sql_dump'); ?>
	
	<?php /**/ echo $this->Html->script(array('superfish','jquery.mixitup.min','jquery.magnific-popup.min','jquery.slicknav','jquery.counterup','waypoints.min','custom')); ?>
	<script>if($('#flashMessage').hasClass('alert')){setInterval("$('.alert').hide('slow')","10000");}if($('#authMessage').hasClass('alert')){setInterval("$('.alert').hide('slow')","10000");}</script><script>if($('#flashMessage').hasClass('alert')){setInterval("$('.alert').hide('slow')","10000");}if($('#authMessage').hasClass('alert')){setInterval("$('.alert').hide('slow')","10000");}</script>
</body>
</html>