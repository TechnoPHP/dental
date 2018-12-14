<div class="container">
	<h2><?php echo __('Inquiries'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('task_id'); ?></th>
			<th><?php echo $this->Paginator->sort('inquirytitle'); ?></th>
			
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($inquiries as $inquiry): ?>
	<tr>
		<td><?php echo h($inquiry['Inquiry']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($inquiry['User']['firstname'], array('controller' => 'users', 'action' => 'view', $inquiry['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inquiry['Task']['title'], array('controller' => 'tasks', 'action' => 'view', $inquiry['Task']['id'])); ?>
		</td>
		<td><?php echo h($inquiry['Inquiry']['inquirytitle']); ?>&nbsp;</td>
		
		<td><?php echo h($inquiry['Inquiry']['status']); ?>&nbsp;</td>
		
		<td><?php echo $this->Time->format('M j, Y',$inquiry['Inquiry']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $inquiry['Inquiry']['id']),array("class"=>"badge badge-success")); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $inquiry['Inquiry']['id']),array("class"=>"badge badge-info")); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $inquiry['Inquiry']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $inquiry['Inquiry']['id']),"class"=>"badge badge-danger")); ?>
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
		<li><?php echo $this->Html->link(__('New Inquiry'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inquiryschedules'), array('controller' => 'inquiryschedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inquiryschedule'), array('controller' => 'inquiryschedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
