<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('PropostaProjetos', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Proposta Projeto
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-11">
			<?php echo $this->Form->create('PropostaProjeto'); ?>
				
		<div class="form-group">
			<?php echo $this->Form->input('id_proposta', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('id_projeto', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-ok"></span> Salvar
			</button>
		</div>		</div>
		

	<?php echo $this->Form->end(); ?>
	</div>
</div>