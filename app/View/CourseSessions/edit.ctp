<div class="courseSessions form">
<?php echo $this->Form->create('CourseSession'); ?>
	<fieldset>
		<legend><?php echo __('Edit Course Session'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('course_id');
		echo $this->Form->input('time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CourseSession.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('CourseSession.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Course Sessions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
