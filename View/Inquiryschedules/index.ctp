<div class="inquiryschedules index">
	<h2><?php echo __('Inquiryschedules'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('inquiry_id'); ?></th>
			<th><?php echo $this->Paginator->sort('datetimefrom'); ?></th>
			<th><?php echo $this->Paginator->sort('datetimeto'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($inquiryschedules as $inquiryschedule): ?>
	<tr>
		<td><?php echo h($inquiryschedule['Inquiryschedule']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($inquiryschedule['Inquiry']['id'], array('controller' => 'inquiries', 'action' => 'view', $inquiryschedule['Inquiry']['id'])); ?>
		</td>
		<td><?php echo h($inquiryschedule['Inquiryschedule']['datetimefrom']); ?>&nbsp;</td>
		<td><?php echo h($inquiryschedule['Inquiryschedule']['datetimeto']); ?>&nbsp;</td>
		<td><?php echo h($inquiryschedule['Inquiryschedule']['created']); ?>&nbsp;</td>
		<td><?php echo h($inquiryschedule['Inquiryschedule']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $inquiryschedule['Inquiryschedule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $inquiryschedule['Inquiryschedule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $inquiryschedule['Inquiryschedule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $inquiryschedule['Inquiryschedule']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Inquiryschedule'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Inquiries'), array('controller' => 'inquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inquiry'), array('controller' => 'inquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
	</ul>
</div>
