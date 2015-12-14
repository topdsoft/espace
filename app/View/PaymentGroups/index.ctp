<div class="paymentGroups index">
	<h2><?php echo __('Payment Groups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($paymentGroups as $paymentGroup): ?>
	<tr>
		<td><?php echo h($paymentGroup['PaymentGroup']['id']); ?>&nbsp;</td>
		<td><?php echo h($paymentGroup['PaymentGroup']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $paymentGroup['PaymentGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $paymentGroup['PaymentGroup']['id'])); ?>
			<?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $paymentGroup['PaymentGroup']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $paymentGroup['PaymentGroup']['id']))); ?>
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
	<h3><?php echo __('Payment Group Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Payment Group'), array('action' => 'add')); ?></li>
	</ul>
</div>
