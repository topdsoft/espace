<div class="payments form">
<?php echo $this->Form->create('Payment'); ?>
	<fieldset>
		<legend><?php echo __('Add Payment'); 
			if(isset($member)) {
				//payment for a specific member
				echo ' by '.$member['Member']['first_name'].' '.$member['Member']['last_name'];
			}//endif
			if(isset($course)){
				//payment for a specific course
				echo ' for course '.$course['Course']['name'];
			}//endif
		?></legend>
	<?php
		if(!isset($member)) echo $this->Form->input('member_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('payment_type',array('options'=>$PAYMENT_TYPES));
		echo $this->Form->input('paymentGroup_id');
		if(!isset($course)) echo $this->Form->input('course_id');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('menu'); ?>
<script type='text/javascript'>document.getElementById('PaymentAmount').focus();</script>