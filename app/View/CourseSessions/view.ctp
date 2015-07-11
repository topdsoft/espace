<div class="courseSessions view">
<h2><?php echo __('Course Session'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($courseSession['CourseSession']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($courseSession['CourseSession']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseSession['Course']['name'], array('controller' => 'courses', 'action' => 'view', $courseSession['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($courseSession['CourseSession']['time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Course Session'), array('action' => 'edit', $courseSession['CourseSession']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course Session'), array('action' => 'delete', $courseSession['CourseSession']['id']), array(), __('Are you sure you want to delete # %s?', $courseSession['CourseSession']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Course Sessions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course Session'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
