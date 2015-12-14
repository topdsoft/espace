<div class="paymentGroups form">
<?php echo $this->Form->create('PaymentGroup'); ?>
	<fieldset>
		<legend><?php echo __('Add Payment Group'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('menu'); ?>
<script type='text/javascript'>document.getElementById('PaymentGroupName').focus();</script>