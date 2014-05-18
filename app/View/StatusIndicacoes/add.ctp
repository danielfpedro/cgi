<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Status de indicações', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Adicionar status de indicação
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->Form->create('StatusIndicacao'); ?>
				<?php echo $this->element('StatusIndicacoes/form'); ?>
			<?php echo $this->Form->end(); ?>	
		</div>
	</div>
</div>