<?php echo $this->Html->script('Indicacoes/set_secretaria'); ?>

<?php echo $this->Form->create('Indicacao', array('type'=> 'POST')); ?>
	<div style="padding: 15px;">
		<h4>Indicação <?php echo $indicacao['Indicacao']['uid']; ?></h4>
		<hr>
			<div class="form-group">
				<?php
					echo $this->Form->input('secretaria_id',
						array(
							'label'=> 'Secretaria',
							'class'=> 'form-control',
							'value'=> $indicacao['Indicacao']['secretaria_id']
						)
					);
				?>
			</div>
	</div>
	<div class="text-right" style="background-color: #EEE; padding: 20px 15px; border-top: 1px solid #E7E7E7;">
		<button type="submit" class="btn btn-success">Salvar alterações</button>
	</div>
<?php echo $this->Form->end(); ?>

