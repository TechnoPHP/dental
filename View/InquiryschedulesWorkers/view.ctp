<div class="inquiryschedulesWorkers view">
<h2><?php echo __('Inquiryschedules Worker'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($inquiryschedulesWorker['InquiryschedulesWorker']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inquiryschedule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($inquiryschedulesWorker['Inquiryschedule']['id'], array('controller' => 'inquiryschedules', 'action' => 'view', $inquiryschedulesWorker['Inquiryschedule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Worker'); ?></dt>
		<dd>
			<?php echo $this->Html->link($inquiryschedulesWorker['Worker']['id'], array('controller' => 'workers', 'action' => 'view', $inquiryschedulesWorker['Worker']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Inquiryschedules Worker'), array('action' => 'edit', $inquiryschedulesWorker['InquiryschedulesWorker']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Inquiryschedules Worker'), array('action' => 'delete', $inquiryschedulesWorker['InquiryschedulesWorker']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $inquiryschedulesWorker['InquiryschedulesWorker']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Inquiryschedules Workers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inquiryschedules Worker'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inquiryschedules'), array('controller' => 'inquiryschedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inquiryschedule'), array('controller' => 'inquiryschedules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
	</ul>
</div>
