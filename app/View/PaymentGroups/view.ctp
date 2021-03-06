<div class="paymentGroups view">
<h2><?php echo __('Payment Group: ').$paymentGroup['PaymentGroup']['name']; ?></h2>
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
<?php echo $this->element('menu'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Payment Group'), array('action' => 'edit', $paymentGroup['PaymentGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Payment Group'), array('action' => 'delete', $paymentGroup['PaymentGroup']['id']), array(), __('Are you sure you want to delete # %s?', $paymentGroup['PaymentGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Payment Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment Group'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($paymentGroup['Payment'])): ?>
	<h3><?php echo __('Related Payments'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Member '); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Payment Type'); ?></th>
		<th><?php echo __('Course'); ?></th>
		<th></th>
	</tr>
	<?php foreach ($paymentGroup['Payment'] as $payment): ?>
		<tr>
			<td><?php echo $payment['id']; ?></td>
			<td><?php echo $payment['created']; ?></td>
			<td><?php echo $this->Html->link($payment['Member']['full_name'],array('action'=>'view','controller'=>'members',$payment['member_id'])); ?></td>
			<td><?php echo $payment['amount']; ?></td>
			<td><?php echo $PAYMENT_TYPES[$payment['payment_type']]; ?></td>
			<td><?php if($payment['course_id']) echo $this->Html->link($payment['Course']['name'],array('action'=>'view','controller'=>'courses',$payment['course_id'])); ?></td>
			<td class="actions">
				<?php //echo $this->Html->link(__('View'), array('controller' => 'payments', 'action' => 'view', $payment['id'])); ?>
				<?php //echo $this->Html->link(__('Edit'), array('controller' => 'payments', 'action' => 'edit', $payment['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'payments', 'action' => 'delete', $payment['id']), array(), __('Are you sure you want to delete # %s?', $payment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
