<div class="form-group">
	<?php echo $this->Form->input('name', array('label'=> 'Nome','class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('ativo', array('type'=> 'checkbox')); ?>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-ok"></span> Salvar
	</button>
</div>