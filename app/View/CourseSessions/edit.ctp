<div class="courseSessions form">
<?php echo $this->Form->create('CourseSession'); ?>
	<fieldset>
		<legend><?php echo __('Edit Course Session'); ?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('course_id');
		echo $this->Form->input('time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('menu'); ?>
