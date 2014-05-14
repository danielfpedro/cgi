<?php echo $this->Form->create('Projeto'); ?>
	<div class="form-group">
		<?php echo $this->Form->input('indicacao_id', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('titulo', array('class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('descricao', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('bairro_id', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('endereco', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('mapa_zoom', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('mapa_latlng', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('valor', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-ok"></span> Salvar
		</button>
	</div>
<?php echo $this->Form->end(); ?>