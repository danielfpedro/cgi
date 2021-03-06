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
		echo $this->Html->script('/BootstrapAdmin/js/comum');
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

	<?php echo $this->element('BootstrapAdmin.navbar'); ?>

	<div class="page-wrap">
		<div class="container-fluid" style="margin-top: 50px;">
			<div class="row">
				<div class="col-md-2 col-sm-2 hidden-xs side-menu" style="">
					<?php echo $this->element('BootstrapAdmin.side_menu'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-10 col-sm-10 col-sm-offset-2 col-md-offset-2">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="container-flash">
		<?php echo $this->Session->flash(); ?>	
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
