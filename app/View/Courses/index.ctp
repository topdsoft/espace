<div class="courses index">
	<h2><?php echo __('Courses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('instructor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_sessions'); ?></th>
			<th><?php echo $this->Paginator->sort('cost'); ?></th>
			<th><?php echo $this->Paginator->sort('signedup'); ?></th>
			<th><?php echo $this->Paginator->sort('max_students'); ?></th>
			<th><?php echo $this->Paginator->sort('min_students'); ?></th>
			<th class="actions"></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($courses as $course): ?>
	<tr>
		<td><?php echo h($course['Course']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($course['Instructor']['full_name'], array('controller' => 'members', 'action' => 'view', $course['Instructor']['id'])); ?>
		</td>
		<td><?php echo h($course['Course']['course_sessions']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['cost']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['signedup']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['max_students']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['min_students']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $course['Course']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $course['Course']['id'])); ?>
			<?php echo $this->Html->link(__('Signup'), array('action' => 'signup', $course['Course']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $course['Course']['id']), array('confirm' => __('Are you sure you want to delete course: %s?', $course['Course']['name']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
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
<div class="actions">
	<h3><?php echo __('Course Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Upcoming Courses'), array('action' => 'upcoming')); ?> </li>
	</ul>
</div>
