<div class="logins form">
<?php echo $this->Form->create('Login'); ?>
	<fieldset>
		<legend><?php echo __('Edit Login'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('time_in');
		echo $this->Form->input('time_out');
		echo $this->Form->input('member_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Login.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Login.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Logins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
