<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Vereadores', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Editar vereador
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-11">
			<?php echo $this->Form->create('Vereador'); ?>
				<?php echo $this->Form->input('id'); ?>
				<?php echo $this->element('Vereadores/form'); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>