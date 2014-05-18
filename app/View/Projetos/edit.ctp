<ul class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Projetos', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Editar projeto "<?php echo $this->request->data['Projeto']['titulo']; ?>"
	</li>
</ul>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->Form->create('Projeto'); ?>
				<?php echo $this->Form->input('id'); ?>
				<?php echo $this->element('Projetos/form'); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>