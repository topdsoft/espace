<div class="courses view">
<h2><?php echo __('Course'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instructor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($course['Instructor']['username'], array('controller' => 'members', 'action' => 'view', $course['Instructor']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($course['Course']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($course['Course']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($course['Course']['description']); ?>
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
		<dt><?php echo __('Materials'); ?></dt>
		<dd>
			<?php echo h($course['Course']['materials']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), array(), __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Course Sessions'); ?></h3>
	<?php if (!empty($course['CourseSession'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Time'); ?></th>
		<th></th>
	</tr>
	<?php foreach ($course['CourseSession'] as $session): ?>
		<tr>
			<td><?php echo $session['time']; ?></td>
			<td class="actions">
				<?php //echo $this->Html->link(__('View'), array('controller' => 'sessions', 'action' => 'view', $session['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sessions', 'action' => 'edit', $session['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sessions', 'action' => 'delete', $session['id']), array(), __('Are you sure you want to delete # %s?', $session['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Session'), array('controller' => 'courseSessions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Members'); ?></h3>
	<?php if (!empty($course['Member'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th></th>
	</tr>
	<?php foreach ($course['Member'] as $member): ?>
		<tr>
			<td><?php echo $member['username']; ?></td>
			<td><?php echo $member['email']; ?></td>
			<td><?php echo $member['phone']; ?></td>
			<td><?php echo $member['first_name']; ?></td>
			<td><?php echo $member['last_name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'members', 'action' => 'view', $member['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
