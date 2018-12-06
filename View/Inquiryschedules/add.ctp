<div class="inquiryschedules form">
<?php echo $this->Form->create('Inquiryschedule'); ?>
	<fieldset>
		<legend><?php echo __('Add Inquiryschedule'); ?></legend>
	<?php
		echo $this->Form->input('inquiry_id');
		echo $this->Form->input('datetimefrom');
		echo $this->Form->input('datetimeto');
		echo $this->Form->input('Worker');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Inquiryschedules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Inquiries'), array('controller' => 'inquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inquiry'), array('controller' => 'inquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
	</ul>
</div>
