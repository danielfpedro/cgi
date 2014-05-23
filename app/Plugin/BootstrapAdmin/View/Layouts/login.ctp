<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?> - Painel administrativo
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('/BootstrapAdmin/css/bootstrap.min');

		echo $this->Html->css('/BootstrapAdmin/css/style');
		echo $this->Html->css('style');

		echo $this->Html->script('/BootstrapAdmin/js/jquery.min');

		echo $this->Html->script('/BootstrapAdmin/js/bootstrap.min');
	?>
	<script type="text/javascript">
		$(function(){
			$('.tt').tooltip();
		});
		var webroot = '<?php echo $this->webroot;?>';
	</script>

	<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	
	<?php echo $this->element('BootstrapAdmin.navbar_simple') ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>
	<div class="container-flash">
		<?php echo $this->Session->flash(); ?>	
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
