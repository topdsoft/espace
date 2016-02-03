<div class="courses view">
<h2><?php echo __('Course: ').$course['Course']['name']; ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Completed'); ?></dt>
		<dd>
			<?php if($course['Course']['completed']) echo "Y";else echo"N"; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instructor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($course['Instructor']['full_name'], array('controller' => 'members', 'action' => 'view', $course['Instructor']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($course['Course']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Time'); ?></dt>
		<dd>
			<?php echo h($course['Course']['start_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($course['Course']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo nl2br($course['Course']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cost'); ?></dt>
		<dd>
			<?php echo h($course['Course']['cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Students'); ?></dt>
		<dd>
			<?php echo h($course['Course']['max_students']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Students'); ?></dt>
		<dd>
			<?php echo h($course['Course']['min_students']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Textbook'); ?></dt>
		<dd>
			<?php echo h($course['Course']['textbook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php if(!empty($course['Course']['website'])) echo $this->Html->link($course['Course']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Materials'); ?></dt>
		<dd>
			<?php echo h($course['Course']['materials']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Session Length'); ?></dt>
		<dd>
			<?php echo h($course['Course']['session_duration']).' hrs.'; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Students Signed Up'); ?></dt>
		<dd>
			<?php echo h($course['Course']['signedup']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Hours'); ?></dt>
		<dd>
			<?php 
			$totalHours=$course['Course']['session_duration']*$course['Course']['course_sessions'];
			echo $totalHours.' hrs.'; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Income'); ?></dt>
		<dd>
			<?php echo '$'.$course['Course']['signedup']*$course['Course']['cost']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instructor Income'); ?></dt>
		<dd>
			<?php 
			$instructorIncome=$course['Course']['signedup']*$course['Course']['cost']/2;
			echo '$'.$instructorIncome; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Income / Hour'); ?></dt>
		<dd>
			<?php 
			echo '$'.number_format($instructorIncome/$totalHours,2); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('menu'); ?>
<div class="actions">
	<h3><?php echo __('Course Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Session Date-Time'), array('controller' => 'courseSessions', 'action' => 'add','course_id'=>$course['Course']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), array(), __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Upcoming Courses'), array('action' => 'upcoming')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Course Sessions'); ?></h3>
	<?php if (!empty($course['CourseSession'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<thead>
	<tr>
		<th><?php echo __('Time'); ?></th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($course['CourseSession'] as $session): ?>
		<tr>
			<td><?php 
				$new_time = date("Y-m-d H:i:s", strtotime('+'.$course['Course']['session_duration'].' hours', strtotime($session['time'])));
			echo $this->Time->format($session['time'],'%a %b %e, %Y %l:%M %P').' - '.$this->Time->format($new_time,'%l:%M %P'); ?></td>
			<td class="actions">
				<?php //echo $this->Html->link(__('View'), array('controller' => 'sessions', 'action' => 'view', $session['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'courseSessions', 'action' => 'edit', $session['id'],
					'redirect'=>array('controller'=>'courses','action'=>'view',$course['Course']['id']))); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'courseSessions', 'action' => 'delete', $session['id']), array(), __('Are you sure you want to delete # %s?', $session['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Session Date-Time'), array('controller' => 'courseSessions', 'action' => 'add','course_id'=>$course['Course']['id'])); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Enrolled Students'); ?></h3>
	<?php if (!empty($course['Member'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<thead>
	<tr>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($course['Member'] as $member): ?>
		<tr>
			<td><?php echo $member['first_name']; ?></td>
			<td><?php echo $member['last_name']; ?></td>
			<td><?php echo $member['email']; ?></td>
			<td><?php echo $member['phone']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View Student'), array('controller' => 'members', 'action' => 'view', $member['id'])); ?>
				<?php echo $this->Form->postLink(__('Remove Student'), array('action' => 'removestudent', $member['CoursesMember']['id']), 
					array('confirm' => __('Are you sure you want to remove student %s?', $member['full_name']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Signup Member'), array('controller' => 'courses', 'action' => 'signup',$course['Course']['id'])); ?> </li>
		</ul>
	</div>
</div>

<div class="related">
	<?php if (!empty($course['Payment'])): ?>
	<h3><?php echo __('Payments'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Payment Type'); ?></th>
		<th><?php echo __('Payment Group'); ?></th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($course['Payment'] as $payment): ?>
		<tr>
			<td><?php echo $payment['id']; ?></td>
			<td><?php echo $this->html->link($payment['Member']['full_name'],array('controller'=>'members','action'=>'view',$payment['Member']['id'])) ; ?></td>
			<td><?php echo $payment['amount']; ?></td>
			<td><?php echo $PAYMENT_TYPES[$payment['payment_type']]; ?></td>
			<td><?php echo $this->html->link($paymentGroups[$payment['paymentGroup_id']],array('controller'=>'paymentGroups','action'=>'view',$payment['paymentGroup_id'])) ; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View Payment'), array('controller' => 'payments', 'action' => 'view', $payment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>
</div>