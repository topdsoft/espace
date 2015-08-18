<div class="members form">
<?php echo $this->Form->create('Member'); ?>
	<fieldset>
		<legend><?php echo __('Edit Password for Member: ').$this->Form->value('Member.username'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('menu'); ?>
<script type='text/javascript'>document.getElementById('MemberPassword').focus();</script>