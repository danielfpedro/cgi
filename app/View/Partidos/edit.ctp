<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Partidos', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Editar partido
	</li>
</div>

<div class="wrap-internal-page">
	<div class="col-md-12">
		<?php echo $this->Form->create('Partido'); ?>
			<?php echo $this->Form->input('id'); ?>
			<?php echo $this->element('Partidos/form'); ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>