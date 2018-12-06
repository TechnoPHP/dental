<div class="inquiryschedules view">
<h2><?php echo __('Inquiryschedule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($inquiryschedule['Inquiryschedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inquiry'); ?></dt>
		<dd>
			<?php echo $this->Html->link($inquiryschedule['Inquiry']['id'], array('controller' => 'inquiries', 'action' => 'view', $inquiryschedule['Inquiry']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datetimefrom'); ?></dt>
		<dd>
			<?php echo h($inquiryschedule['Inquiryschedule']['datetimefrom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datetimeto'); ?></dt>
		<dd>
			<?php echo h($inquiryschedule['Inquiryschedule']['datetimeto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($inquiryschedule['Inquiryschedule']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($inquiryschedule['Inquiryschedule']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Inquiryschedule'), array('action' => 'edit', $inquiryschedule['Inquiryschedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Inquiryschedule'), array('action' => 'delete', $inquiryschedule['Inquiryschedule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $inquiryschedule['Inquiryschedule']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Inquiryschedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inquiryschedule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inquiries'), array('controller' => 'inquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inquiry'), array('controller' => 'inquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workers'), array('controller' => 'workers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Workers'); ?></h3>
	<?php if (!empty($inquiryschedule['Worker'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Aagent Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Dateofbirth'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Photo'); ?></th>
		<th><?php echo __('Ctaddress'); ?></th>
		<th><?php echo __('Ctlandmark'); ?></th>
		<th><?php echo __('Ctarea'); ?></th>
		<th><?php echo __('Ctcity'); ?></th>
		<th><?php echo __('Ctpincode'); ?></th>
		<th><?php echo __('Ptaddress'); ?></th>
		<th><?php echo __('Ptlandmark'); ?></th>
		<th><?php echo __('Ptarea'); ?></th>
		<th><?php echo __('Ptcity'); ?></th>
		<th><?php echo __('Ptpincode'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Approved'); ?></th>
		<th><?php echo __('Admin Id'); ?></th>
		<th><?php echo __('Agentremark'); ?></th>
		<th><?php echo __('Adminremark'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($inquiryschedule['Worker'] as $worker): ?>
		<tr>
			<td><?php echo $worker['id']; ?></td>
			<td><?php echo $worker['aagent_id']; ?></td>
			<td><?php echo $worker['category_id']; ?></td>
			<td><?php echo $worker['firstname']; ?></td>
			<td><?php echo $worker['lastname']; ?></td>
			<td><?php echo $worker['dateofbirth']; ?></td>
			<td><?php echo $worker['gender']; ?></td>
			<td><?php echo $worker['phone']; ?></td>
			<td><?php echo $worker['photo']; ?></td>
			<td><?php echo $worker['ctaddress']; ?></td>
			<td><?php echo $worker['ctlandmark']; ?></td>
			<td><?php echo $worker['ctarea']; ?></td>
			<td><?php echo $worker['ctcity']; ?></td>
			<td><?php echo $worker['ctpincode']; ?></td>
			<td><?php echo $worker['ptaddress']; ?></td>
			<td><?php echo $worker['ptlandmark']; ?></td>
			<td><?php echo $worker['ptarea']; ?></td>
			<td><?php echo $worker['ptcity']; ?></td>
			<td><?php echo $worker['ptpincode']; ?></td>
			<td><?php echo $worker['active']; ?></td>
			<td><?php echo $worker['approved']; ?></td>
			<td><?php echo $worker['admin_id']; ?></td>
			<td><?php echo $worker['agentremark']; ?></td>
			<td><?php echo $worker['adminremark']; ?></td>
			<td><?php echo $worker['created']; ?></td>
			<td><?php echo $worker['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'workers', 'action' => 'view', $worker['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'workers', 'action' => 'edit', $worker['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'workers', 'action' => 'delete', $worker['id']), array('confirm' => __('Are you sure you want to delete # %s?', $worker['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Worker'), array('controller' => 'workers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
