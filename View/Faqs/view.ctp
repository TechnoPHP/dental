<div class="faqs view">
<h2><?php echo __('Faq'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($faq['Faq']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Faqcategory'); ?></dt>
		<dd>
			<?php echo $this->Html->link($faq['Faqcategory']['name'], array('controller' => 'faqcategories', 'action' => 'view', $faq['Faqcategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($faq['Faq']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($faq['Faq']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($faq['Faq']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($faq['Faq']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Faq'), array('action' => 'edit', $faq['Faq']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Faq'), array('action' => 'delete', $faq['Faq']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $faq['Faq']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Faqs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faq'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faqcategories'), array('controller' => 'faqcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faqcategory'), array('controller' => 'faqcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>