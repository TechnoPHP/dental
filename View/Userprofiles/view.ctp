<div class="userprofiles view">
<h2><?php echo __('Userprofile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userprofile['Userprofile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userprofile['User']['id'], array('controller' => 'users', 'action' => 'view', $userprofile['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($userprofile['Userprofile']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Userimage'); ?></dt>
		<dd>
			<?php echo h($userprofile['Userprofile']['userimage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthdate'); ?></dt>
		<dd>
			<?php echo h($userprofile['Userprofile']['birthdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Messanger'); ?></dt>
		<dd>
			<?php echo h($userprofile['Userprofile']['messanger']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Msgtype'); ?></dt>
		<dd>
			<?php echo h($userprofile['Userprofile']['msgtype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aboutme'); ?></dt>
		<dd>
			<?php echo h($userprofile['Userprofile']['aboutme']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quotes'); ?></dt>
		<dd>
			<?php echo h($userprofile['Userprofile']['quotes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userprofile['Userprofile']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userprofile['Userprofile']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Userprofile'), array('action' => 'edit', $userprofile['Userprofile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Userprofile'), array('action' => 'delete', $userprofile['Userprofile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $userprofile['Userprofile']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Userprofiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Userprofile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
