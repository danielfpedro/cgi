<ul class="breadcrumb breadcrumb-admin">
	<li class="active">
		Ranking de secretarias
	</li>
</ul>
<div class="wrap-internal-page">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>
					<?php echo $this->Paginator->sort('id', 'Secretaria'); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('totalIndicacoes', 'Indicações'); ?>
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
						<td>
							<?php echo $secretaria['Secretaria']['totalIndicacoes']; ?>
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