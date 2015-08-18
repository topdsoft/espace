<div class="members form">
<?php echo $this->Form->create('Member'); ?>
	<fieldset>
		<legend><?php echo __('Edit Member'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('paid_until');
		echo $this->Form->input('access_level',array('options'=>$ACCESS_TYPES));
		echo $this->Form->input('membership_type',array('options'=>$MEMBERSHIP_TYPES));
		echo $this->Form->input('barcode_hash');
		echo $this->Form->input('company');
		echo $this->Form->input('mins_left');
		echo $this->Form->input('mins_left_monthly');
		echo $this->Form->input('mailing_address');
		echo $this->Form->input('emergency_contact_name');
		echo $this->Form->input('emergency_contact_phone');
		echo $this->Form->input('notes');
		echo $this->Form->input('membership_agreement');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('menu'); ?>
<div class="actions">
	<h3><?php echo __('Member Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Member.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Member.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Edit Password'), array('controller'=>'members','action' => 'editpw', $this->Form->value('Member.id'))); ?> </li>
	</ul>
</div>
