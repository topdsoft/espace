<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Espace Labs');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script(array('jquery-1.6.4.min'));
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->image('logo2.png') ?></h1>
		</div>
		<div id="loginblock">
			<?php
// debug($this->Session->read('Auth'));
				if($this->Session->read('Auth.User')) {
					//a member is logged in
					echo 'Member= '.$this->Session->read('Auth.User.username').'<br>';
					echo $this->Html->link('Logout', array('controller'=>'members','action'=>'logout')).'<br>';
				}//endif
			?>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php //echo $cakeVersion; ?>
			</p>
		</div>
		<div id="footer2">
			Copyright &copy <?php echo date('Y').' '.$this->Html->link('Espace Labs LLC','http://www.espacelabs.com');?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
