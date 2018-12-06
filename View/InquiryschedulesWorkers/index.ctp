<div class="inquiryschedulesWorkers index">
	<h2><?php echo __('Inquiryschedules Workers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('inquiryschedule_id'); ?></th>
			<th><?php echo $this->Paginator->sort('worker_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($inquiryschedulesWorkers as $inquiryschedulesWorker): ?>
	<tr>
		<td><?php echo h($inquiryschedulesWorker['InquiryschedulesWorker']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($inquiryschedulesWorker['Inquiryschedule']['id'], array('controller' => 'inquiryschedules', 'action' => 'view', $inquiryschedulesWorker['Inquiryschedule']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inquiryschedulesWorker['Worker']['id'], array('controller' => 'workers', 'action' => 'view', $inquiryschedulesWorker['Worker']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $inquiryschedulesWorker['InquiryschedulesWorker']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $inquiryschedulesWorker['InquiryschedulesWorker']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $inquiryschedulesWorker['InquiryschedulesWorker']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $inquiryschedulesWorker['InquiryschedulesWorker']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Inquiryschedules Worker'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Inquiryschedules'), array('controller' => 'inquiryschedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inquiryschedule'), array('controller' => 'inquiryschedules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
	</ul>
</div>
