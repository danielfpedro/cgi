<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Secretarias', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Editar secretaria
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->Form->create('Secretaria'); ?>
				<?php echo $this->Form->input('id'); ?>
				<?php echo $this->element('Secretarias/form'); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>