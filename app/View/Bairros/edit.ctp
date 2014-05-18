<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Bairros', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Editar bairro
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->Form->create('Bairro'); ?>
				<?php echo $this->Form->input('id'); ?>
				<?php echo $this->element('Bairros/form'); ?>
			<?php echo $this->Form->end(); ?>			
		</div>
	</div>
</div>