
<?php  echo $this->Html->script('mask/jquery.mask.min', array('inline'=> false));?>

<?php  echo $this->Html->script('indicacoes/form', array('inline'=> false));?>

<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Indicações', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Adicionar indicação
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->Form->create('Indicacao', array('inputDefaults'=> array('div'=> false))); ?>
				<?php echo $this->element('Indicacoes/form'); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>