<div class="payments form">
<?php echo $this->Form->create('Payment'); ?>
	<fieldset>
		<legend><?php echo __('Add Payment'); 
			if(isset($member)) {
				//payment for a specific member
				echo ' for '.$member['Member']['first_name'].' '.$member['Member']['last_name'];
			}//endif
		?></legend>
	<?php
		if(!isset($member)) echo $this->Form->input('member_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('payment_type',array('options'=>$PAYMENT_TYPES));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Payments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script type='text/javascript'>document.getElementById('PaymentAmount').focus();</script>