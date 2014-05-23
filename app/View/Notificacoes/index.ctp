<div class="breadcrumb breadcrumb-admin">
	<li class="active">
		Notificacoes
	</li>
</div>

<div class="wrap-internal-page" style="margin-top: 80px;">

	<div class="table-responsive clearfix">
		<table class="table table-condensed table-hover table-striped table-admin">
			<tbody>
				<?php if (!empty($notificacoes)): ?>
					<?php foreach ($notificacoes as $notificacao): ?>
						<?php
							switch ($notificacao['Notificacao']['tipo'] ) {
								// Notificações
								case 1:
									$url = array(
										'controller'=> 'indicacoes',
										'action'=> 'view',
										$notificacao['Notificacao']['identificador']);
									break;
								//Projetos
								case 2:
									$url = array(
										'controller'=> 'projetos',
										'action'=> 'view',
										$notificacao['Notificacao']['identificador']);
									break;
								//Mensagens
								case 3:
									$url = array(
										'controller'=> 'trocaMensagens',
										'action'=> 'index',
										$notificacao['Notificacao']['identificador']);
									break;
								default:
									# code...
									break;
							}					
						?>				
						<tr>
							<td>
								<?php
								echo $this->Html->link(
									$notificacao['Notificacao']['notificacao'],
									$url); ?>
							</td>
						<tr>					
					<?php endforeach; ?>
				<?php else: ?>
					<td colspan="8">Nenhuma informação encontrada.</td>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	
	<br>

	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-8">
			<?php
				echo $this->Paginator->counter(
					array(
						'format'=> 'Página {:page}/{:pages} de {:count} registro(s)'
					));
			?>	
		</div>
		<div class="col-md-6 col-sm-6 col-xs-4 text-right">
			<?php echo $this->element('BootstrapAdmin.paginator_numbers'); ?>
		</div>
	</div>
</div>