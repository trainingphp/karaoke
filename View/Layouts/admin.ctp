<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		// echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container">
		<div class="page-header">
				<p class="navbar-text navbar-right">
					Xin chào: <?php echo $user_info['User']['username']; ?> (<?php echo $user_info['Group']['name']; ?>) | <?php echo $this->Html->link('Thoát', '/logout'); ?>
					<br>
					<?php
						$time=getdate(date("U"));
						echo "$time[weekday], $time[month] $time[mday], $time[year]";
					?>
				</p>
				<h1>Trang quản lí</h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<div class="row">
				<div class="col col-lg-2">
					<?php echo $this->element('admin/menu'); ?>
				</div>
				<div class="col col-lg-10">
					<?php if ($this->Session->check('User')): ?>
						<?php echo $this->fetch('content'); ?>
					<?php else: ?>
						Bạn phải <?php echo $this->Html->link('đăng nhập', '/login'); ?>
					<?php endif ?>					
				</div>
			</div>
		</div>
		<div id="footer">
			karaoke
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
