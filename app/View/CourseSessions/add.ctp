<div class="courseSessions form">
<?php echo $this->Form->create('CourseSession'); ?>
	<fieldset>
		<legend><?php 
			echo __('Add Course Session'); 
			if(isset($course)) echo ' to '.$course['Course']['name'];
		?></legend>
	<?php
		if($this->data['CourseSession']['course_id']) {
			//course_id is passed in
			echo '<p><strong>Current Sessions</strong>';
			foreach($course['CourseSession'] as $session) {
				//loop for all sessions
				echo '<br>'.$session['time'];
			}//end foreach
			
			echo '</p>';
//			echo $this->Form->input('course_id',array('label'=>'','hidden'=>true));
		} else {
			//let user select course
			echo $this->Form->input('course_id');
		}//endif
//debug($course);
		echo $this->Form->input('time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Course Sessions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
