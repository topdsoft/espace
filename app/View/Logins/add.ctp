<div class="logins form">
<?php echo $this->Form->create('Login'); ?>
	<fieldset>
		<legend><?php echo __('Login'); ?></legend>
		
	<?php
		//branch depending on if this is a first scan or if the member in confirming
		if(isset($member)) {
			//member is confirming scan
			$loggingIn=false;
			if(empty($lastLogin) || $lastLogin['Login']['time_out']!=null) $loggingIn=true;
//debug($member);debug($lastLogin);
			echo "<p>Thank You ";
			echo $member['Member']['first_name']." ".$member['Member']['last_name'];
			echo "</p>";
			if(!$lastLogin) {
				//member's first ever login
				echo "<p>Welcome to Espace</p>";
			}//endif
			echo "<p>You have <strong>".$member['Member']['mins_left_monthly']."</strong> minutes left to use this month.</p>";
			if($loggingIn) {
				//logging In
				echo "Scan your member card to confirm you're logging in:";
			} else {
				//logging out
				echo 'You have been logged in since: ';
				echo $lastLogin['Login']['time_in'];
				echo "<br>Scan your member card to confirm you're logging out:";
			}//endif
			echo $this->Form->input('confirm',array('label'=>""));
			echo $this->Form->input('scan',array('hidden'=>true,'label'=>""));
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
<?php if(isset($member)):?>
<script type='text/javascript'>document.getElementById('LoginConfirm').focus();</script>
<?php else:?>
<script type='text/javascript'>document.getElementById('LoginScan').focus();</script>
<?php endif; ?>