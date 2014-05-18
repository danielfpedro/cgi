<ul class="breadcrumb breadcrumb-admin">
	<li class="active">
		Ranking de secretarias
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
					<?php echo $this->Paginator->sort('id', 'Secretaria'); ?>
				</th>
				<th style="width: 200px;">
					<?php echo $this->Paginator->sort('totalIndicacoesAprovadas', 'Indicações aprovadas'); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($secretarias)): ?>
				<?php foreach ($secretarias as $secretaria): ?>
					<tr>
						<td>
							<?php echo $secretaria['Secretaria']['name']; ?>
						</td>
						<td class="text-center">
							<span class="label label-info" style="font-size: 14px;">
								<?php echo $secretaria['Secretaria']['totalIndicacoesAprovadas']; ?>
								/
								<?php echo $secretaria['Secretaria']['totalIndicacoes']; ?>
							</span>
						</td>
					</tr>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td colspan="6">
						Nenhuma informação encontrada.
					</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
</div>