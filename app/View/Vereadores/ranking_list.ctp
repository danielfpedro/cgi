<ul class="breadcrumb breadcrumb-admin">
	<li class="active">
		Ranking de vereadores
	</li>
</ul>
<div class="wrap-internal-page">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>
					<?php echo $this->Paginator->sort('id', 'Vereador'); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('partido_id', 'Partido'); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('totalIndicacoes', 'Indicações'); ?>
				</th>
				<th>
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
						<td>
							<?php echo $vereador['Vereador']['totalIndicacoes']; ?>
						</td>
						<td>
							<?php echo $vereador['Vereador']['totalIndicacoesAprovadas']; ?>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>