<div class="members view">
<h2><?php echo __('Member'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($member['Member']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($member['Member']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($member['Member']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($member['Member']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($member['Member']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($member['Member']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paid Until'); ?></dt>
		<dd>
			<?php echo h($member['Member']['paid_until']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Access Level'); ?></dt>
		<dd>
			<?php echo $ACCESS_TYPES[$member['Member']['access_level']]; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership Type'); ?></dt>
		<dd>
			<?php echo $MEMBERSHIP_TYPES[$member['Member']['membership_type']]; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Barcode Hash'); ?></dt>
		<dd>
			<?php echo h($member['Member']['barcode_hash']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($member['Member']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Minutes Left'); ?></dt>
		<dd>
			<?php echo h($member['Member']['mins_left']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Minutes Left Monthly'); ?></dt>
		<dd>
			<?php echo h($member['Member']['mins_left_monthly']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Waiver'); ?></dt>
		<dd>
			<?php echo h($member['Member']['waver']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership Agreement'); ?></dt>
		<dd>
			<?php echo h($member['Member']['membership_agreement']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('menu'); ?>
<div class="actions">
	<h3><?php echo __('Member Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Member'), array('action' => 'edit', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Member'), array('action' => 'delete', $member['Member']['id']), array(), __('Are you sure you want to delete # %s?', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Make Payment'), array('controller'=>'payments','action' => 'add','member_id'=> $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Course Signup'), array('controller'=>'courses','action' => 'signup', 'member_id'=>$member['Member']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Member Logins'); ?></h3>
	<?php if (!empty($member['Login'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Time In'); ?></th>
		<th><?php echo __('Time Out'); ?></th>
		<th><?php echo __('Duration'); ?></th>
		<th></th>
	</tr>
	<?php foreach ($member['Login'] as $login): ?>
		<tr>
			<td><?php echo $login['time_in']; ?></td>
			<td><?php echo $login['time_out']; ?></td>
			<td><?php 
				if($login['time_out']) {
					//show duration
					$timeIn=new DateTime($login['time_in']);
					$timeOut=new DateTime($login['time_out']);
					echo $timeIn->diff($timeOut)->format('%hh %im');
				}//endif
			?></td>
			<td class="actions">
				<?php //echo $this->Html->link(__('View'), array('controller' => 'logins', 'action' => 'view', $login['id'])); ?>
				<?php //echo $this->Html->link(__('Edit'), array('controller' => 'logins', 'action' => 'edit', $login['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'logins', 'action' => 'delete', $login['id']), array(), __('Are you sure you want to delete # %s?', $login['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Login'), array('controller' => 'logins', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Payments'); ?></h3>
	<?php if (!empty($member['Payment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Payment Type'); ?></th>
	</tr>
	<?php foreach ($member['Payment'] as $payment): ?>
		<tr>
			<td><?php echo $payment['created']; ?></td>
			<td><?php echo $payment['amount']; ?></td>
			<td><?php echo $PAYMENT_TYPES[$payment['payment_type']]; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add','member_id'=>$member['Member']['id'])); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Courses'); ?></h3>
	<?php if (!empty($member['Course'])): //debug($member['Course']);?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php //echo __('Instructor Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Cost'); ?></th>
	</tr>
	<?php foreach ($member['Course'] as $course): ?>
		<tr>
			<td><?php //echo $course['instructor_id']; ?></td>
			<td><?php echo $this->Html->link($course['name'],array('controller'=>'courses' ,'action'=>'view',$course['id'])); ?></td>
			<td><?php echo $course['cost']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Course Signup'), array('controller' => 'courses', 'action' => 'signup', 'member_id' => $member['Member']['id'])); ?> </li>
		</ul>
	</div>
</div>
