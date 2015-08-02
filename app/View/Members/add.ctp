<div class="members form">
<?php echo $this->Form->create('Member'); ?>
	<fieldset>
		<legend><?php echo __('Add Member'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('paid_until');
		echo $this->Form->input('access_level',array('options'=>$ACCESS_TYPES));
		echo $this->Form->input('membership_type',array('options'=>$MEMBERSHIP_TYPES));
		echo $this->Form->input('barcode_hash',array('label'=>'Barcode Number'));
		echo $this->Form->input('company');
		echo $this->Form->input('mins_left',array('label'=>'Mins Left (Hourly Member/Extra Minutes)'));
		echo $this->Form->input('mins_left_monthly');
		echo $this->Form->input('mailing_address');
		echo $this->Form->input('emergency_contact_name');
		echo $this->Form->input('emergency_contact_phone');
		echo $this->Form->input('notes');
		//echo $this->Form->input('membership_agreement');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php
echo $this->element("menu");
/*

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Members'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Logins'), array('controller' => 'logins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Login'), array('controller' => 'logins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/?>
<script type='text/javascript'>document.getElementById('MemberUsername').focus();</script>
<script type='text/javascript'>
	$('#MemberMembershipType').change(function(){
		var selected_item = $(this).val()
//alert(selected_item);
		$('#MemberMinsLeft').val(0);
		if(selected_item == 1) $('#MemberMinsLeft').val(0);
		if(selected_item == 2) $('#MemberMinsLeft').val(180);
		if(selected_item == 3) $('#MemberMinsLeft').val(320);
		if(selected_item == 4) $('#MemberMinsLeft').val(500);
		if(selected_item == 5) $('#MemberMinsLeft').val(180);
		if(selected_item == 6) $('#MemberMinsLeft').val(320);
		if(selected_item == 7) $('#MemberMinsLeft').val(500);
		if(selected_item == 8) $('#MemberMinsLeft').val(180);
		if(selected_item == 9) $('#MemberMinsLeft').val(320);
		if(selected_item == 10) $('#MemberMinsLeft').val(500);
		if(selected_item == 0) $('#MemberMinsLeft').val(0);
		if(selected_item == "other"){
			$('#other').val("").removeClass('hidden');
		}else{
			$('#other').val(selected_item).addClass('hidden');
		}
	});
</script>