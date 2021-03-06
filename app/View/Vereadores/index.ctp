<div class="breadcrumb breadcrumb-admin">
	<li class="active">
		Vereadores
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php
			echo $this->Html->link(
				"Nova vereador",
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
						<?php echo $this->Paginator->sort('id', '#'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('name'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('nome_parlamentar'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('partido_id'); ?>
					</th>
					<th style="width: 140px;" class="text-center">
						<?php echo $this->Paginator->sort('ativo'); ?>
					</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($vereadores)): ?>
					<?php foreach ($vereadores as $vereador): ?>						
						<tr>
							<td style="width: 60px;">
								<?php echo h($vereador['Vereador']['id']); ?>
							</td>
							<td>
								<?php echo h($vereador['Vereador']['name']); ?>
							</td>
							<td style="width: 240px;">
								<?php echo h($vereador['Vereador']['nome_parlamentar']); ?>
							</td>
							<td style="width: 120px;">
								<?php echo $vereador['Partido']['sigla']; ?>
							</td>
							<td class="text-center">
								<span class="label label-<?php echo ($vereador['Vereador']['ativo'])? 'success': 'danger'; ?>">
									<?php echo ($vereador['Vereador']['ativo'])? 'ativado': 'desativado'; ?>
								</span>
							</td>
							<td class="text-center" style="width:90px;">
								<?php
									echo $this->Html->link(
										"<span class='glyphicon glyphicon-pencil'></span>",
										array(
											'action' => 'edit',
											$vereador['Vereador']['id']),
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
											$vereador['Vereador']['id']),
										array(
											'class'=> 'btn btn-sm btn-danger tt',
											'title'=> 'Remover',
											'escape'=> false
										),
										__('Você tem certeza que deseja deletar # %s?'
										, $vereador['Vereador']['id'])
									);
								?>
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