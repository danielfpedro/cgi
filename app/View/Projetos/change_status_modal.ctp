<?php echo $this->Html->script('Projetos/change_status'); ?>

<?php echo $this->Form->create('Projeto', array('type'=> 'POST')); ?>
	<div style="padding: 15px;">
		<h4>Projeto "<?php echo $projeto['Projeto']['titulo']; ?>"</h4>
		<hr>
			<div class="form-group">
				<?php
					echo $this->Form->input('status_projeto_id',
						array(
							'label'=> 'Status',
							'class'=> 'form-control',
							'value'=> $projeto['Projeto']['status_projeto_id']
						)
					);
				?>
			</div>
	</div>
	<div class="text-right" style="background-color: #EEE; padding: 20px 15px; border-top: 1px solid #E7E7E7;">
		<button type="submit" class="btn btn-success">Salvar alterações</button>
	</div>
<?php echo $this->Form->end(); ?>