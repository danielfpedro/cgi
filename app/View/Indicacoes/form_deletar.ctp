<?php echo $this->Form->create('Indicacao'); ?>
	<div class="form-group">
		<?php echo $this->Form->input('uid', array('label'=> 'Código','class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('introducao', array('label'=> 'Introdução','class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->textarea('justificativa', array('rows'=> 15,'class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php
			echo $this->Form->input('data_indicacao',
				array('type'=> 'text','class'=> 'form-control', 'style'=> 'width: 140px;')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('Vereador', array('label'=> 'Autor(s)','class'=> 'form-control')); ?>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-ok"></span> Salvar
		</button>
	</div>
<?php echo $this->Form->end(); ?>