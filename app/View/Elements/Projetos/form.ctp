<?php 
	echo $this->Html->script(
		'http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places',
		array('inline'=> false)
	);

	echo $this->Html->script('../lib/geocomplete/jquery.geocomplete.min', array('inline'=> false));
?>

<?php  echo $this->Html->css('../lib/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.min', array('inline'=> false));?>
<?php  echo $this->Html->script('../lib/jquery-ui/js/jquery-ui-1.10.4.custom.min', array('inline'=> false));?>

<?php  echo $this->Html->script('../lib/maskmoney/dist/jquery.maskMoney.min', array('inline'=> false));?>

<?php  echo $this->Html->script('Projetos/form', array('inline'=> false));?>


<?php echo $this->Form->input('indicacao_id', array('type'=> 'text','class'=> 'form-control')); ?>
<input type="hidden" value="<?php echo isset($indicacao_uid)? $indicacao_uid : ''; ?>" id="ProjetoIndicacaoUid">

<div class="form-group">
	<div class="alert alert-info">
		<strong><span class="glyphicon glyphicon-warning-sign"></span> Atenção</strong>
		<p>
			Somente indicações que tenham uma secretaria atribuída poderão ser adicionadas ao projeto.
		</p>
	</div>
</div>

<div class="form-group">
	<label>Adicionar indicação</label>
	<div class="row">
		<div class="col-md-2">
			<input type="text" id="indicacaoAutocomplete" class="form-control">
		</div>
	</div>
</div>

<div class="form-group">
	<div id="wrap-tag">Indicação: <em id="tag" class="text-muted">Indicação não adicionada</em></div>
</div>

<div class="form-group">
	<?php echo $this->Form->input('uid', array('class'=> 'form-control')); ?>
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
	<?php echo $this->Form->input('mapa_zoom', array('type'=> 'text','class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('mapa_latlng', array('type'=> 'text','class'=> 'form-control')); ?>
</div>

<!-- GEOCOMPLETE -->
<div class="form-group">
	<input type="text" id="geocomplete" class="form-control" placeholder="Digite um local para marcar no mapa">
	<div id="map-canvas"></div>
</div>
<!-- GEOCOMPLETE -->

<div class="form-group">
	<label for="ProjetoValor">Valor</label>
	<div class="row">
		<div class="col-md-2">
			<div class="input-group">
				<span class="input-group-addon">R$</span>
				<?php echo $this->Form->input('valor', array('type'=> 'text','label'=> false, 'class'=> 'form-control')); ?>
			</div>
		</div>
	</div>
</div>


<div class="form-group">
	<button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-ok"></span> Salvar
	</button>
</div>