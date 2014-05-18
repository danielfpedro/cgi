<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Status de projetos', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Adicionar status de projeto
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->Form->create('StatusProjeto'); ?>
				<?php echo $this->element('StatusProjetos/form'); ?>
			<?php echo $this->Form->end(); ?>	
		</div>
	</div>
</div>