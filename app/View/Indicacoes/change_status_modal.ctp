<?php echo $this->Html->script('Indicacoes/change_status'); ?>

<?php echo $this->Form->create('Indicacao', array('type'=> 'POST')); ?>
	<div style="padding: 15px;">
		<h4>Mudança de status indicação: <?php echo $indicacao['Indicacao']['uid']; ?></h4>
		<hr>
			<div class="form-group">
				<?php
					echo $this->Form->input('status_indicacao_id',
						array('label'=> false, 'class'=> 'form-control', 'value'=> $indicacao['Indicacao']['status_indicacao_id'])); ?>
			</div>
	</div>
	<div class="text-right" style="background-color: #EEE; padding: 20px 15px; border-top: 1px solid #E7E7E7;">
		<button type="submit" class="btn btn-success">Salvar alterações</button>
	</div>
<?php echo $this->Form->end(); ?>

