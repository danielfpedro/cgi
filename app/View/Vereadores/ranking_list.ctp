<ul class="breadcrumb breadcrumb-admin">
	<li class="active">
		Ranking de vereadores
	</li>
</ul>
<div class="wrap-internal-page">

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

	<table class="table table-hover">
		<thead>
			<tr>
				<th>
					<?php echo $this->Paginator->sort('id', 'Vereador'); ?>
				</th>
				<th style="width: 120px;">
					<?php echo $this->Paginator->sort('partido_id', 'Partido'); ?>
				</th>
				<th style="width: 200px;">
					<?php echo $this->Paginator->sort('totalIndicacoesAprovadas', 'Indicações aprovadas'); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($vereadores)): ?>
				<?php foreach ($vereadores as $vereador): ?>
					<tr>
						<td>
							<?php echo $vereador['Vereador']['name'] .' "'.$vereador['Vereador']['nome_parlamentar'].'"'; ?>
						</td>
						<td>
							<?php echo $vereador['Partido']['sigla']; ?>
						</td>
						<td class="text-center">
							<span class="label label-info" style="font-size: 15px;">
								<?php echo $vereador['Vereador']['totalIndicacoesAprovadas']; ?>
								/
								<?php echo $vereador['Vereador']['totalIndicacoes']; ?>
							</span>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>