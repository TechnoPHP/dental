<div class="faqs form">
<?php echo $this->Form->create('Faq'); ?>
	<fieldset>
		<legend><?php echo __('Add Faq'); ?></legend>
	<?php
		echo $this->Form->input('faqcategory_id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Faqs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Faqcategories'), array('controller' => 'faqcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faqcategory'), array('controller' => 'faqcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
