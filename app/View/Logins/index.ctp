<div class="logins index">
	<h2><?php echo __('Logins'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('time_in'); ?></th>
			<th><?php echo $this->Paginator->sort('time_out'); ?></th>
			<th><?php echo $this->Paginator->sort('member_id'); ?></th>
			<th></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($logins as $login): ?>
	<tr>
		<td><?php echo h($login['Login']['time_in']); ?>&nbsp;</td>
		<td><?php echo h($login['Login']['time_out']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($login['Member']['username'], array('controller' => 'members', 'action' => 'view', $login['Member']['id'])); ?>
		</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $login['Login']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $login['Login']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $login['Login']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $login['Login']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Login'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
