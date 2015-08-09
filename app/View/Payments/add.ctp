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
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('menu'); ?>
<script type='text/javascript'>document.getElementById('PaymentAmount').focus();</script>