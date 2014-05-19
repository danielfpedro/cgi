<ul class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Projetos', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Adicionar projeto
	</li>
</ul>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->Form->create('Projeto', array('inputDefaults'=> array('div'=> false))); ?>
				<?php echo $this->element('Projetos/form'); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
