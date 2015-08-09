<div class="payments view">
<h2><?php //echo __('Payment'); ?></h2>
	<dl>
		<dt><?php echo __('Invoice Id'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Date'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Member'); ?></dt>
		<dd>
			<?php echo $this->Html->link($payment['Member']['last_name'].', '.$payment['Member']['first_name']
			, array('controller' => 'members', 'action' => 'view', $payment['Member']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo '$'. h($payment['Payment']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Method'); ?></dt>
		<dd>
			<?php echo h($PAYMENT_TYPES[$payment['Payment']['payment_type']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo nl2br($payment['Payment']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('menu'); ?>