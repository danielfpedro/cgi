<?php echo $this->Html->css('../lib/nicemodal/jquery-nicemodal', array('inline'=> false)); ?>
<?php echo $this->Html->script('../lib/nicemodal/jquery-nicemodal', array('inline'=> false)); ?>

<?php echo $this->Html->script('Projetos/index', array('inline'=> false)); ?>

<div class="breadcrumb breadcrumb-admin">
	<li class="active">
		Projetos
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php
			echo $this->Html->link(
				"Novo projeto",
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

					<select class="form-control" name="status">
						<option value="">Status</option>
						<?php foreach ($status as $key=> $item): ?>
							<option
								value="<?php echo $key; ?>"
								<?php echo ($item == $this->request->query['status'])? 'selected' : ''; ?>>

								<?php echo $item; ?>
							</option>
						<?php endforeach ?>
					</select>

					<select class="form-control" name="secretaria">
						<option value="">Secretarias</option>
						<?php foreach ($secretarias as $key=> $secretaria): ?>
							<option
								value="<?php echo $key; ?>"
								<?php echo ($secretaria == $this->request->query['secretaria'])? 'selected' : ''; ?>>>

								<?php echo $secretaria; ?>
							</option>
						<?php endforeach ?>
					</select>
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
					<th style="width: 80px;">
						<?php echo $this->Paginator->sort('id', '#'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('titulo', 'Projeto'); ?>
					</th>
					<th style="width: 180px;">
						<?php echo $this->Paginator->sort('status_projeto_id', 'Status'); ?>
					</th>
					<th style="width: 180px;">
						<?php
							echo $this->Paginator->sort('Secretaria.secretaria_id', 'Secretaria');
						?>
					</th>
					<th style="width: 80px;">
						<?php echo $this->Paginator->sort('created', 'Data'); ?>
					</th>	
					<th style="width: 100px;"></th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($projetos)): ?>
					<?php foreach ($projetos as $projeto): ?>						
						<tr>
							<td>
								<?php echo $projeto['Projeto']['id']; ?>
							</td>
							<td>
								<?php
									echo $this->Html->link(
										$projeto['Projeto']['titulo'],
										array(
											'action' => 'view',
											$projeto['Projeto']['id']
										)
									);
								?>
								
								<em>
									<p class="text-muted">
										Em resposta a indicação 
										<?php
										echo $this->Html->link(
											$projeto['Indicacao']['uid'],
											array(
												'controller' => 'status_projetos',
												'action' => 'view',
												$projeto['StatusProjeto']['id']
											));
										
										?>
									</p>
								</em>
							</td>
							<td id="td-quick-action">
								<?php echo $projeto['StatusProjeto']['name']; ?>
								<div style="position: relative;">
									<?php
										echo $this->Html->link(
											'<span class=\'glyphicon glyphicon-refresh\'></span>',
											array(
												'controller' => 'projetos',
												'action' => 'changeStatusModal',
												$projeto['Projeto']['id'],
											),
											array(
												'escape'=> false,
												'id'=> 'open-modal',
												'title'=> 'Alterar status',
												'class'=> 'btn btn-default btn-xs btn-quick-action tt')
										);
									?>
								</div>
							</td>
							<td>
								<?php if (!empty($projeto['Indicacao']['Secretaria']['name'])): ?>
									<?php echo $projeto['Indicacao']['Secretaria']['name'] ?>
								<?php else: ?>
									<em class="text-muted">Nenhuma secretaria atribuída.</em>
								<?php endif ?>
							</td>
							<td>
								<?php echo $this->Time->format('d/m/y', $projeto['Projeto']['created']); ?>
							</td>	
							<td class="text-center" style="width:90px;">
								<?php
									echo $this->Html->link(
										"<span class='glyphicon glyphicon-pencil'></span>",
										array(
											'action' => 'edit',
											$projeto['Projeto']['id']),
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
											$projeto['Projeto']['id']),
										array(
											'class'=> 'btn btn-sm btn-danger tt',
											'title'=> 'Remover',
											'escape'=> false
										),
										__('Você tem certeza que deseja deletar # %s?'
										, $projeto['Projeto']['id'])
									);
								?>
							</td>
						<tr>					
					<?php endforeach; ?>
				<?php else: ?>
					<td colspan="12">Nenhuma informação encontrada.</td>
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