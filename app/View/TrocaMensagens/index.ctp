<ul class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Indicações', array('controller'=> 'indicacoes', 'action'=> 'index')) ?>
	</li>
	<li class="active">
		Mensagens da indicação <?php echo $indicacao['Indicacao']['uid']; ?>
	</li>
</ul>

<div class="wrap-internal-page">
	<?php echo $this->Session->flash(); ?>
	<div class="row">
		<div class="col-md-4">
			<?php echo $this->Form->create('TrocaMensagem'); ?>
				<div class="form-group">
					<?php
						echo $this->Form->input(
							'usuario_id',
							array(
								'type'=> 'hidden',
								'value'=> 1
							)
						);
						//Depois trocar esse valor pelo id do usuario logado atualmente
					?>
					
					<?php echo $this->Form->input('usuario_id', array('label'=> 'remetente', 'type'=> 'hidden', 'value'=> $remetente)); ?>
					<?php echo $this->Form->input('destinatario', array('type'=> 'hidden', 'value'=> $destinatario)); ?>

					<?php echo $this->Form->input('indicacao_id',
						array('type'=> 'hidden', 'value'=> $indicacao['Indicacao']['id'])); ?>
					<?php echo $this->Form->input('mensagem', array('label'=> false, 'class'=> 'form-control')); ?>
				</div>
				<button type="submit" class="btn btn-primary btn-block">
					<span class="glyphicon glyphicon-send"></span> Enviar mensagem
				</button>
			<?php echo $this->Form->end(); ?>
		</div><!-- col-md-4, form -->
		<div class="col-md-8">
			<?php if (!empty($trocaMensagens)): ?>
				<?php foreach ($trocaMensagens as $mensagem): ?>
					<div class="row">
						<div class="col-md-7">
							<strong>
								<?php
									if ($mensagem['Usuario']['Cargo']['name'] == 'Secretario') {
										$label = $mensagem['Usuario']['Secretaria']['name'];
									} else {
										$label = $mensagem['Usuario']['Cargo']['name'];
									}
								?>
								<?php echo $mensagem['Usuario']['name']; ?> (<?php echo $label;?>)	
							</strong>
						</div><!-- col-md-8 -->
						<div class="col-md-5 text-right">
							<span class="text-muted">
								<?php echo $this->Time->timeAgoInWords($mensagem['TrocaMensagem']['created']); ?>
							</span>
						</div><!-- col-md-8 -->
						<div class="col-md-12" style="margi-bottom: 20px;">
							<p>
								<?php echo $mensagem['TrocaMensagem']['mensagem']; ?>
							</p>
						</div><!-- col-md-12 -->
					</div><!-- row -->
				<?php endforeach ?>
			<?php else: ?>
				<em class="text-muted">Nenhuma mensagem trocada.</em>
			<?php endif ?>
		</div><!-- col-md-12 -->
	</div><!-- row -->
</div><!-- wrap-internal-page -->