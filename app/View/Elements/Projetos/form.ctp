<?php  echo $this->Html->css('../lib/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.min', array('inline'=> false));?>
<?php  echo $this->Html->script('../lib/jquery-ui/js/jquery-ui-1.10.4.custom.min', array('inline'=> false));?>

<?php  echo $this->Html->script('Projetos/form', array('inline'=> false));?>

<?php echo $this->Form->input('indicacao_id', array('type'=> 'hidden','class'=> 'form-control')); ?>
<div class="form-group">
	<label>Adicionar indicação</label>
	<div class="row">
		<div class="col-md-2">
			<input type="text" id="indicacaoAutocomplete" class="form-control">
		</div>
	</div>
</div>
<div class="form-group">
	<div id="wrap-tag">Indicação: <em id="tag">Indicação não adicionada</em></div>
</div>
<div class="form-group">
	<div class="alert alert-info">
		<strong><span class="glyphicon glyphicon-info-sign"></span> Atenção</strong>
		<p>
			Somente indicações que tenham uma secretaria atribuída poderão ser adicionadas ao projeto.
		</p>
	</div>
</div>
<div class="form-group">
	<?php echo $this->Form->input('titulo', array('class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('descricao', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-3">
			<?php echo $this->Form->input('bairro_id', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>		
		</div>
	</div>
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
	<div class="row">
		<div class="col-md-2">
			<?php echo $this->Form->input('valor', array('type'=> 'text','class'=> 'form-control')); ?>	
		</div>
	</div>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-ok"></span> Salvar
	</button>
</div>