<div class="paymentGroups view">
<h2><?php echo __('Payment Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($paymentGroup['PaymentGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($paymentGroup['PaymentGroup']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Payment Group'), array('action' => 'edit', $paymentGroup['PaymentGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Payment Group'), array('action' => 'delete', $paymentGroup['PaymentGroup']['id']), array(), __('Are you sure you want to delete # %s?', $paymentGroup['PaymentGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Payment Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Payments'); ?></h3>
	<?php if (!empty($paymentGroup['Payment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Member Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Payment Type'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('PaymentGroup Id'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($paymentGroup['Payment'] as $payment): ?>
		<tr>
			<td><?php echo $payment['id']; ?></td>
			<td><?php echo $payment['created']; ?></td>
			<td><?php echo $payment['member_id']; ?></td>
			<td><?php echo $payment['amount']; ?></td>
			<td><?php echo $payment['payment_type']; ?></td>
			<td><?php echo $payment['course_id']; ?></td>
			<td><?php echo $payment['paymentGroup_id']; ?></td>
			<td><?php echo $payment['notes']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'payments', 'action' => 'view', $payment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'payments', 'action' => 'edit', $payment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'payments', 'action' => 'delete', $payment['id']), array(), __('Are you sure you want to delete # %s?', $payment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
