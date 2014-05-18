<?php  echo $this->Html->script('mask/jquery.mask.min', array('inline'=> false));?>

<?php  echo $this->Html->script('indicacoes/form', array('inline'=> false));?>

<ul class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Indicações', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Editar indicação
	</li>
</ul>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->Form->create('Indicacao'); ?>
				<?php echo $this->Form->input('id'); ?>
				<?php echo $this->element('Indicacoes/form'); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>