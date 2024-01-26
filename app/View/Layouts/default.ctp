<?php
/**
 *
 * PHP 5
 *
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

$cakeDescription = __d('cake_dev', 'Devx Cakephp Test');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('font-awesome.min.css');
		echo $this->Html->css('AdminLTE.css');
		echo $this->Html->css('common.css');
		echo $this->Html->css('dataTables.bootstrap.css');
		
		echo $this->Html->script('jquery.2.0.2.min.js');
		echo $this->Html->script('jquery-ui-1.10.3.min.js');
		echo $this->Html->script('bootstrap.min.js');
		echo $this->Html->script('jquery.knob.js');
		echo $this->Html->script('jquery.dataTables.js');
		echo $this->Html->script('dataTables.bootstrap.js');
		echo $this->Html->script('common.js');
	?>
	
</head>
<body>
	<div id="container">
		<div id="header" align="center">
			<?php 
			if($this->Session->check('Auth.User')){
				if($this->request->params['controller']=='users' && $this->request->params['action']=='edit') {
					echo $this->Html->link( "Return to Dashboard",   array('action'=>'users') ); 
					echo ' | ';
				}	
				echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
			}
			else{
				if($this->request->params['controller']=='users' && $this->request->params['action']=='add')
					echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
				else
					 echo $this->Html->link( "Add A New User",   array('action'=>'signup') ); 
			}
			?>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" align="center">
			<?php /*echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);*/

			?>
			<?php 
			if($this->Session->check('Auth.User')){
				if($this->request->params['controller']=='users' && $this->request->params['action']=='edit') {
					echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') ); 
					echo ' | ';
				}	
				echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
			}
			else{
				if($this->request->params['controller']=='users' && $this->request->params['action']=='add')
					echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
				else
					 echo $this->Html->link( "Add A New User",   array('action'=>'add') ); 
			}
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
