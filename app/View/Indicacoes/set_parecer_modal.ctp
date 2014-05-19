<?php echo $this->Html->script('Indicacoes/set_parecer'); ?>

<?php echo $this->Form->create('Indicacao', array('type'=> 'POST')); ?>
	<?php echo $this->Form->input('id'); ?>
	<div style="padding: 15px;">
		<h4>Indicação <?php echo $indicacao['Indicacao']['uid']; ?></h4>
		<hr>
			<div class="form-group">
				<?php
					echo $this->Form->input('parecer',
						array(
							'class'=> 'form-control',
							'value'=> $indicacao['Indicacao']['parecer']
						)
					);
				?>
			</div>
	</div>
	<div class="text-right" style="background-color: #EEE; padding: 20px 15px; border-top: 1px solid #E7E7E7;">
		<button type="submit" class="btn btn-success">Salvar alterações</button>
	</div>
<?php echo $this->Form->end(); ?>

