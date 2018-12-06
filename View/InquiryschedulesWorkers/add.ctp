<div class="inquiryschedulesWorkers form">
<?php echo $this->Form->create('InquiryschedulesWorker'); ?>
	<fieldset>
		<legend><?php echo __('Add Inquiryschedules Worker'); ?></legend>
	<?php
		echo $this->Form->input('inquiryschedule_id');
		echo $this->Form->input('worker_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Inquiryschedules Workers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Inquiryschedules'), array('controller' => 'inquiryschedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inquiryschedule'), array('controller' => 'inquiryschedules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
	</ul>
</div>
