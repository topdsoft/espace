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
				echo ''.$day['outputDate'].'<br>';
				if(isset($course)) echo '<br>'.$this->Html->link(__('+Add: ').$course['Course']['name'].'+',
					array('controller'=>'courseSessions','action'=>'add','time'=>$day['sqlDate'],'course_id'=>$course['Course']['id']));
				else echo '<br>'.$this->Html->link(__('+Add Session+'),array('controller'=>'courseSessions','action'=>'add','time'=>$day['sqlDate']));
				if($day['Courses']) echo '<br><br><strong>Exsisting Courses:</strong>';
				foreach($day['Courses'] as $c) {
					//loop for each course on this day
					echo '<br>'.$this->Html->link($c['Course']['name'],array('controller'=>'courses','action'=>'view',$c['Course']['id']));
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
<?php echo $this->element('menu'); ?>