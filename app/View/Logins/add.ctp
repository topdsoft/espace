<div class="logins form">
<?php echo $this->Form->create('Login'); ?>
	<fieldset>
		<legend><?php echo __('Login'); ?></legend>
		
	<?php
		//branch depending on if this is a first scan or if the member in confirming
		if(isset($member)) {
			//member is confirming scan
debug($member);
			echo "<p>Thank You ";
			echo $member['Member']['first_name']." ".$member['Member']['last_name'];
			echo "</p>";
			echo "<p>You have <strong>".$member['Member']['hrs_left_monthly']."</strong> left to use this month.</p>";
			echo "Scan your member card to confirm";
			echo $this->Form->input('scan',array('label'=>""));
		} else {
			//waiting for new member to scan
			echo "Scan your member card to log in or out";
			echo $this->Form->input('scan',array('label'=>""));
		}//endif
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Logins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script type='text/javascript'>document.getElementById('LoginScan').focus();</script>