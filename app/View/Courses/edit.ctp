<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Edit Course'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('instructor_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('cost');
		echo $this->Form->input('max_students');
		echo $this->Form->input('min_students');
		echo $this->Form->input('textbook');
		echo $this->Form->input('materials');
		echo $this->Form->input('session_duration',array('label'=>'Session Length in Hrs'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('menu'); ?>
<div class="actions">
	<h3><?php echo __('Course Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Course.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Course.id'))); ?></li>
		<li><?php echo $this->Html->link(__('New Session'), array('controller' => 'courseSessions', 'action' => 'add', $this->Form->value('Course.id'))); ?> </li>
	</ul>
</div>
