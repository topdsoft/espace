<div class="actions">
	<h3><?php echo __('Global Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Members'), array('controller'=>'members','action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller'=>'members','action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Logins'), array('controller' => 'logins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
