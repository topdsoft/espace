<div class="courses index">
	<h2><?php echo __('E::SPACE Upcoming Courses'); ?></h2>
	<?php foreach ($courses as $course):?>
		<?php
			//loop for all courses
			echo '<h3>'.$course['Course']['name'].' Starts '.$this->Time->format($course['CourseSession'][0]['time'],"%a %b %e, %Y %l:%M %P").'</h3>';
			echo nl2br($course['Course']['description']);
//			echo '<br>';
			
			echo '<br><br>';
// debug($course);
		?>
	<dl>
		<dt><?php echo __('Course Title'); ?></dt>
		<dd>
			<?php echo h($course['Course']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instructor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($course['Instructor']['full_name'], array('controller' => 'members', 'action' => 'view', $course['Instructor']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Dates'); ?></dt>
		<dd>
			<?php
				foreach($course['CourseSession'] as $session) {
					//loop for each session
					$new_time = date("Y-m-d H:i:s", strtotime('+'.$course['Course']['session_duration'].' hours', strtotime($session['time'])));
					echo $this->Time->format($session['time'],'%a %b %e, %Y %l:%M %P').' - '.$this->Time->format($new_time,'%l:%M %P');
					echo '<br>';
				}//endforeach
			?>
		</dd>
		<dt><?php echo __('Textbook'); ?></dt>
		<dd>
			<?php echo h($course['Course']['textbook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Materials'); ?></dt>
		<dd>
			<?php echo h($course['Course']['materials']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>E::SPACE Labs, 48 SE Bridgeford Blvd, Suite 180, Bend OR 97702</dd>
		<dt><?php echo __('Course Fee'); ?></dt>
		<dd>
			<?php echo '$'.h($course['Course']['cost']); ?>
			&nbsp;
		</dd>
		</dl>
	</dl>
	<br>
	<hr>
	<br><br>
	<?php endforeach; ?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<?php echo $this->element('menu'); ?>