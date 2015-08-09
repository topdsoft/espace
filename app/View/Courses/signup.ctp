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
<?php echo $this->element('menu'); ?>