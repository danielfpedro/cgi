<div class="breadcrumb breadcrumb-admin">
	<li class="active">
		Status de projetos
	</li>
</div>

<div class="wrap-internal-page">
	<?php echo $this->Session->flash(); ?>	<div class="row">
		<div class="col-md-12">
			<?php
			echo $this->Html->link(
				"Novo status de projeto",
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
					<th style="width: 60px;">
						<?php echo $this->Paginator->sort('#'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('name', 'Nome'); ?>
					</th>
					<th style="width: 140px;" class="text-center">
						<?php echo $this->Paginator->sort('ativo'); ?>
					</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($statusProjetos)): ?>
					<?php foreach ($statusProjetos as $statusProjeto): ?>						
						<tr>
							<td>
								<?php echo h($statusProjeto['StatusProjeto']['id']); ?>
							</td>
							<td>
								<?php echo h($statusProjeto['StatusProjeto']['name']); ?>
							</td>
							<td class="text-center">
								<span class="label label-<?php echo ($statusProjeto['StatusProjeto']['ativo'])? 'success': 'danger'; ?>">
									<?php echo ($statusProjeto['StatusProjeto']['ativo'])? 'ativado': 'desativado'; ?>
								</span>
							</td>
							<td class="text-center" style="width:90px;">
								<?php
									echo $this->Html->link(
										"<span class='glyphicon glyphicon-pencil'></span>",
										array(
											'action' => 'edit',
											$statusProjeto['StatusProjeto']['id']),
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
											$statusProjeto['StatusProjeto']['id']),
										array(
											'class'=> 'btn btn-sm btn-danger tt',
											'title'=> 'Remover',
											'escape'=> false
										),
										__('Você tem certeza que deseja deletar # %s?'
										, $statusProjeto['StatusProjeto']['id'])
									);
								?>
							</td>
						<tr>					
					<?php endforeach; ?>
				<?php else: ?>
					<td colspan="6">Nenhuma informação encontrada.</td>
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