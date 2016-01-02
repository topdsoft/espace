<div class="courseSessions form">
<?php echo $this->Form->create('CourseSession'); ?>
	<fieldset>
		<legend><?php 
			echo __('Add Course Session'); 
			if(isset($course)) echo ' to '.$course['Course']['name'];
		?></legend>
	<table>
	<?php
		foreach($calanderArray as $week) {
			//loop for each week
			echo '<tr>';
			foreach($week as $day) {
				//loop for all days in week
				echo '<td>';
				echo ''.$day['outputDate'].'';
				foreach($day['Courses'] as $course) {
					//loop for each course on this day
					echo '<br>'.$this->Html->link($course['Course']['name'],array('controller'=>'courses','action'=>'view',$course['Course']['id']));
				}//next course
				echo '</td>';
			}//end day loop
			echo '</tr>';
		}//end week loop
	?>
	</table>
	</fieldset>
<?php debug($calanderArray); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Course Sessions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
