<div class="courses form">
<?php echo $this->Form->create('CoursesMember'); ?>
	<fieldset>
		<legend><?php 
			echo __('Signup'); 
			if($member) echo ' '.$member['Member']['first_name'].' '.$member['Member']['last_name'];
			if($course) echo ' for course '.$course['Course']['name'];
		?></legend>
	<?php
		if(!$member) echo $this->Form->input('member_id');
		if(!$course) echo $this->Form->input('course_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instructor'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sessions'), array('controller' => 'sessions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Session'), array('controller' => 'sessions', 'action' => 'add')); ?> </li>
	</ul>
</div>
