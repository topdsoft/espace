<div class="members index">
	<h2><?php echo __('Members'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('paid_until'); ?></th>
			<th><?php echo $this->Paginator->sort('access_level'); ?></th>
			<th><?php echo $this->Paginator->sort('company'); ?></th>
			<th><?php echo $this->Paginator->sort('hrs_left'); ?></th>
			<th><?php echo $this->Paginator->sort('hrs_left_monthly'); ?></th>
			<th class="actions"></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($members as $member): ?>
	<tr>
		<td><?php echo h($member['Member']['username']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['email']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['phone']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['paid_until']); ?>&nbsp;</td>
		<td><?php echo h($MEMBER_TYPES[$member['Member']['access_level']]); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['company']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['hrs_left']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['hrs_left_monthly']); ?>&nbsp;</td>
			<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $member['Member']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $member['Member']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $member['Member']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $member['Member']['id']))); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Member'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Logins'), array('controller' => 'logins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Login'), array('controller' => 'logins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
