<div class="userprofiles form">
<?php echo $this->Form->create('Userprofile'); ?>
	<fieldset>
		<legend><?php echo __('Add Userprofile'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('gender');
		echo $this->Form->input('userimage');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('messanger');
		echo $this->Form->input('msgtype');
		echo $this->Form->input('aboutme');
		echo $this->Form->input('quotes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Userprofiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
