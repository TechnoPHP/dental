<div class="inquiries view">
<h2><?php echo __('Inquiry'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($inquiry['Inquiry']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($inquiry['User']['id'], array('controller' => 'users', 'action' => 'view', $inquiry['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task'); ?></dt>
		<dd>
			<?php echo $this->Html->link($inquiry['Task']['title'], array('controller' => 'tasks', 'action' => 'view', $inquiry['Task']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inquirytitle'); ?></dt>
		<dd>
			<?php echo h($inquiry['Inquiry']['inquirytitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inquiryremark'); ?></dt>
		<dd>
			<?php echo h($inquiry['Inquiry']['inquiryremark']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($inquiry['Inquiry']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($inquiry['Inquiry']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($inquiry['Inquiry']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Inquiry'), array('action' => 'edit', $inquiry['Inquiry']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Inquiry'), array('action' => 'delete', $inquiry['Inquiry']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $inquiry['Inquiry']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Inquiries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inquiry'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inquiryschedules'), array('controller' => 'inquiryschedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inquiryschedule'), array('controller' => 'inquiryschedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Inquiryschedules'); ?></h3>
	<?php if (!empty($inquiry['Inquiryschedule'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Inquiry Id'); ?></th>
		<th><?php echo __('Datetimefrom'); ?></th>
		<th><?php echo __('Datetimeto'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($inquiry['Inquiryschedule'] as $inquiryschedule): ?>
		<tr>
			<td><?php echo $inquiryschedule['id']; ?></td>
			<td><?php echo $inquiryschedule['inquiry_id']; ?></td>
			<td><?php echo $inquiryschedule['datetimefrom']; ?></td>
			<td><?php echo $inquiryschedule['datetimeto']; ?></td>
			<td><?php echo $inquiryschedule['created']; ?></td>
			<td><?php echo $inquiryschedule['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'inquiryschedules', 'action' => 'view', $inquiryschedule['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'inquiryschedules', 'action' => 'edit', $inquiryschedule['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'inquiryschedules', 'action' => 'delete', $inquiryschedule['id']), array('confirm' => __('Are you sure you want to delete # %s?', $inquiryschedule['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Inquiryschedule'), array('controller' => 'inquiryschedules', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
