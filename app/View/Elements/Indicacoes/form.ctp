<div class="form-group">
	<div class="row">
		<div class="col-md-2">
			<?php echo $this->Form->input('uid', array('label'=> 'Código','class'=> 'form-control')); ?>
		</div>
	</div>
</div>
<div class="form-group">
	<?php echo $this->Form->input('introducao', array('label'=> 'Introdução', 'rows'=> 4, 'class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('justificativa', array('rows'=> 14,'class'=> 'form-control')); ?>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-2">
			<?php
				echo $this->Form->input('data_indicacao',
					array(
						'type'=> 'text',
						'class'=> 'form-control',
						'value'=> $this->Time->format('d/m/Y', $this->request->data['Indicacao']['data_indicacao']),
					)
				);
			?>
		</div>
	</div>
</div>
<div class="form-group">
	<?php echo $this->Form->input('Vereador', array('label'=> 'Autor(s)','class'=> 'form-control', 'required'=> true)); ?>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-ok"></span> Salvar
	</button>
</div>