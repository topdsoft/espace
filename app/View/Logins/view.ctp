<div class="logins view">
<h2><?php echo __('Login'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($login['Login']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time In'); ?></dt>
		<dd>
			<?php echo h($login['Login']['time_in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Out'); ?></dt>
		<dd>
			<?php echo h($login['Login']['time_out']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Member'); ?></dt>
		<dd>
			<?php echo $this->Html->link($login['Member']['id'], array('controller' => 'members', 'action' => 'view', $login['Member']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Login'), array('action' => 'edit', $login['Login']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Login'), array('action' => 'delete', $login['Login']['id']), array(), __('Are you sure you want to delete # %s?', $login['Login']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Logins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Login'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
