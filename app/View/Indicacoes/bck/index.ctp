<?php echo $this->Html->script('indicacoes', array('inline'=> false)); ?>
<div class="breadcrumb breadcrumb-admin">
	<li class="active">
		Indicações
	</li>
</div>

<div class="wrap-internal-page">
	<?php echo $this->Session->flash(); ?>	<div class="row">
		<div class="col-md-12">
			<?php
			echo $this->Html->link(
				"Nova indicacão",
				array('action'=> 'add'),
				array('class'=> 'btn btn-success btn-novo',
					'escape'=> false
				));
			?>
		</div>
	</div>
	
	<br>
	<div class="well well-sm">
		<div class="row clearfix">
			<div class="col-md-12">
				<form method="GET" class="form-inline">
					<input
						type="text"
						class="form-control txt-search"
						placeholder="Pesquisar"
						name="q"
						value="<?php echo $this->request->query['q']; ?>">
					<button class="btn btn-default hidden-xs">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</form>
			</div>
		</div>
	</div>

	<div class="table-responsive clearfix">
		<table class="table table-condensed table-hover table-striped table-admin">
			<thead>
				<tr>
					<th>
						<?php echo $this->Paginator->sort('uid', '#'); ?>
					</th>
					<th style="width: 600px;">
						<?php echo $this->Paginator->sort('introducao', 'Indicação'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('status_indicacao_id', 'Status'); ?>
					</th>
					<th style="width: 200px;">
						<?php echo $this->Paginator->sort('secretaria_id', 'Secretária responsável'); ?>
					</th>					
					<th>
						<?php echo $this->Paginator->sort('data_indicacao', 'Data'); ?>
					</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($indicacoes)): ?>
					<?php foreach ($indicacoes as $indicacao): ?>						
						<tr>
							<td>
								<?php echo h($indicacao['Indicacao']['uid']); ?>
							</td>
							<td>
								<?php
									echo $this->Html->link(
										$this->Text->truncate(
											$indicacao['Indicacao']['introducao'],
											190,
											array('exact'=> false)
										),
										array(
											'controller' => 'indicacoes',
											'action' => 'view',
											$indicacao['Indicacao']['id'])
									);
								?>
							</td>
							<td style="width: 200px;" id="td-quick-action">
								<?php echo $indicacao['StatusIndicacao']['name']; ?>
								<div style="position: relative;">
									<?php
										echo $this->Html->link(
											'<span class=\'glyphicon glyphicon-refresh\'></span>',
											array('controller' => '', 'action' => ''),
											array(
												'escape'=> false,
												'class'=> 'btn btn-default btn-xs btn-quick-action tt')
										);
									?>
								</div>
							</td>
							<td id="td-quick-action">
								<?php if (!is_null($indicacao['Indicacao']['secretaria_id'])): ?>
									<?php echo $indicacao['Secretaria']['name']; ?>
								<?php else: ?>
									<em>Nenhuma atribuída</em>
								<?php endif ?>
								<div style="position: relative;">
									<?php
										echo $this->Html->link(
											'<span class=\'glyphicon glyphicon-refresh\'></span>',
											array('controller' => '', 'action' => ''),
											array('escape'=> false, 'class'=> 'btn btn-default btn-xs btn-quick-action')
										);
									?>
								</div>
							</td>
							<td style="width: 120px;">
								<?php echo h($this->Time->format('d/m/y',$indicacao['Indicacao']['data_indicacao'])); ?>
							</td>						
							<td class="text-center" style="width:100px;">
								<?php
									echo $this->Html->link(
										"<span class='glyphicon glyphicon-pencil'></span>",
										array(
											'action' => 'edit',
											$indicacao['Indicacao']['id']),
										array(
											'class'=> 'btn btn-sm btn-primary tt',
											'title'=> 'Editar',
											'escape'=> false
										)
									);
									echo "&nbsp;";
									echo $this->Form->postLink(
										"<span class='glyphicon glyphicon-remove'></span>",
										array(
											'action' => 'delete',
											$indicacao['Indicacao']['id']),
										array(
											'class'=> 'btn btn-sm btn-danger tt',
											'title'=> 'Remover',
											'escape'=> false
										),
										__('Você tem certeza que deseja deletar # %s?'
										, $indicacao['Indicacao']['id'])
									);
								?>
							</td>
						<tr>					
					<?php endforeach; ?>
				<?php else: ?>
					<td colspan="11">Nenhuma informação encontrada.</td>
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