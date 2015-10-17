<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Add Course'); ?></legend>
	<?php
		echo $this->Form->input('instructor_id');
		echo $this->Form->input('name',array('label'=>'Course Name'));
		echo $this->Form->input('description');
		echo $this->Form->input('cost');
		echo $this->Form->input('max_students');
		echo $this->Form->input('min_students');
		echo $this->Form->input('website');
		echo $this->Form->input('textbook');
		echo $this->Form->input('materials');
		echo $this->Form->input('session_duration',array('label'=>'Session Length in Hrs'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('menu'); ?>