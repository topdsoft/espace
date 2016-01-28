<div class="members index">
	<h2><?php echo __('Members'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php //echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php //echo $this->Paginator->sort('phone'); ?></th>
			<th><?php //echo $this->Paginator->sort('paid_until'); ?></th>
			<th><?php //echo $this->Paginator->sort('mins_left'); ?></th>
			<th><?php //echo $this->Paginator->sort('mins_left_monthly'); ?></th>
			<th><?php //echo $this->Paginator->sort('access_level'); ?></th>
			<th><?php //echo $this->Paginator->sort('company'); ?></th>
			<th class="actions"></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($members as $member): ?>
	<tr>
		<td><?php echo h($member['Member']['id']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['last_name']); ?>&nbsp;</td>
		<td><?php //echo h($member['Member']['username']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['email']); ?>&nbsp;</td>
		<td><?php //echo h($member['Member']['phone']); ?>&nbsp;</td>
		<td><?php //echo h($member['Member']['paid_until']); ?>&nbsp;</td>
		<td><?php //echo h($member['Member']['mins_left']); ?>&nbsp;</td>
		<td><?php //echo h($member['Member']['mins_left_monthly']); ?>&nbsp;</td>
		<td><?php //echo h($ACCESS_TYPES[$member['Member']['access_level']]); ?>&nbsp;</td>
		<td><?php //echo h($member['Member']['company']); ?>&nbsp;</td>
			<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $member['Member']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $member['Member']['id'])); ?>
			<?php echo $this->Html->link(__('Payment'), array('controller'=>'payments' ,'action' => 'add', 'member_id'=>$member['Member']['id'])); ?>
			<?php echo $this->Html->link(__('Class Signup'), array('controller'=>'courses','action' => 'signup', 'member_id'=>$member['Member']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $member['Member']['id']), array('confirm' => __('Are you sure you want to delete member: %s?', $member['Member']['username']))); ?>
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
<?php  echo $this->element("menu");  ?>
<div class="actions">
	<h3><?php echo __('Member Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Export CSV List'), array('controller'=>'members','action' => 'exportcsv')); ?> </li>
	</ul>
</div>
