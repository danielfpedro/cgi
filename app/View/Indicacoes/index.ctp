<?php echo $this->Html->css('../lib/nicemodal/jquery-nicemodal', array('inline'=> false)); ?>
<?php echo $this->Html->script('../lib/nicemodal/jquery-nicemodal', array('inline'=> false)); ?>

<?php echo $this->Html->script('Indicacoes/index', array('inline'=> false)); ?>

<ul class="breadcrumb breadcrumb-admin">
	<li class="active">
		Indicações
	</li>
</ul>

<div class="wrap-internal-page">
	<?php if ($Auth_cargo_id == 3): ?><!-- Somente TI-->
		<div class="row">
			<div class="col-md-12">
				<?php
					echo $this->Html->link(
						"Nova indicacão",
						array('action'=> 'add'),
						array('class'=> 'btn btn-success btn-novo',
							'escape'=> false
						)
					);
				?>
			</div>
		</div>		
		<br>
	<?php endif ?>
	
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
								<?php echo ($key == $this->request->query['status'])? 'selected' : ''; ?>>

								<?php echo $item; ?>
							</option>
						<?php endforeach ?>
					</select>

					<select class="form-control" name="secretaria">
						<option value="">Secretarias</option>
						<?php foreach ($secretarias as $key=> $secretaria): ?>
							<option
								value="<?php echo $key; ?>"
								<?php echo ($key == $this->request->query['secretaria'])? 'selected' : ''; ?>>

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
						<?php echo $this->Paginator->sort('uid', '#'); ?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('introducao', 'Indicação'); ?>
					</th>
					<th style="width: 180px;">
						<?php echo $this->Paginator->sort('status_indicacao_id', 'Status'); ?>
					</th>
					<th style="width: 180px;">
						<?php echo $this->Paginator->sort('secretaria_id', 'Secretaria responsável'); ?>
					</th>					
					<th style="width: 80px;">
						<?php echo $this->Paginator->sort('data_indicacao', 'Data'); ?>
					</th>
					<th style="width: 180px;"></th>
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
											120,
											array('exact'=> false)
										),
										array(
											'controller' => 'indicacoes',
											'action' => 'view',
											$indicacao['Indicacao']['id'])
									);
								?>
								<br>
								<p>
									<span class="text-muted">
										<em>
											<?php
												$autores = array();
												foreach ($indicacao['Vereador'] as $vereador) {
													$autores[] = $vereador['name'] .
													'"'.$vereador['nome_parlamentar'].'"' .
													' ('.$vereador['Partido']['sigla'].')';
												}
												echo $this->Text->toList($autores, 'e');
											?>
										</em>
									</span>
								</p>
							</td>
							<td id="td-quick-action">
								<?php echo $indicacao['StatusIndicacao']['name']; ?>
								<?php if ($Auth_cargo_id == 1): ?><!-- Somente prefeito -->
									<div style="position: relative;">
										<?php
											echo $this->Html->link(
												'<span class=\'glyphicon glyphicon-refresh\'></span>',
												array(
													'controller' => 'indicacoes',
													'action' => 'changeStatusModal',
													$indicacao['Indicacao']['id'],
												),
												array(
													'escape'=> false,
													'id'=> 'open-modal',
													'title'=> 'Alterar status',
													'class'=> 'btn btn-default btn-xs btn-quick-action tt')
											);
										?>
									</div>
								<?php endif ?>
							</td>
							<td id="td-quick-action">
								<?php if (!is_null($indicacao['Indicacao']['secretaria_id'])): ?>
									<?php echo $indicacao['Secretaria']['name']; ?>
								<?php else: ?>
									<em class="text-muted">Nenhuma atribuída</em>
								<?php endif ?>
								<?php if ($Auth_cargo_id == 1): ?><!-- Somente prefeito -->
									<div style="position: relative;">
										<?php
											echo $this->Html->link(
												'<span class=\'glyphicon glyphicon-refresh\'></span>',
												array(
													'controller' => 'indicacoes',
													'action' => 'setSecretariaModal',
													$indicacao['Indicacao']['id'],
												),
												array(
													'escape'=> false,
													'id'=> 'open-modal',
													'title'=> 'Alterar secretaria',
													'class'=> 'btn btn-default btn-xs btn-quick-action tt')
											);
										?>
									</div>
								<?php endif ?><!-- Somente prefeito -->
							</td>
							<td>
								<?php echo h($this->Time->format('d/m/y',$indicacao['Indicacao']['data_indicacao'])); ?>
							</td>						
							<td class="text-center">
								<?php
									// Somente secretaria
									//Checa se a mensagem é da secretaria logado e ativa o btn ou não
									if ($indicacao['Secretaria']['id'] != Null) {
										if ($indicacao['Secretaria']['id'] != Null AND $Auth_cargo_id == 1 OR ($indicacao['Secretaria']['id'] == $Auth_secretaria_id)) {
											$active = 'enabled';
										} else {
											$active = 'disabled';
										}
									} else {
										$active = 'disabled';
									}
									
									if ($Auth_cargo_id == 2) {
										echo $this->Html->link(
											"<span class='glyphicon glyphicon-asterisk'></span>",
											array(
												'controller'=> 'indicacoes',
												'action' => 'setParecerModal',
												$indicacao['Indicacao']['id']),
											array(
												'id'=> 'open-modal',
												'class'=> 'btn btn-sm btn-primary tt ' . $active,
												'title'=> 'Parecer',
												'escape'=> false
											)
										);
										echo "&nbsp;";
									}
									if ($Auth_cargo_id != 3) {
										echo $this->Html->link(
											"<span class='glyphicon glyphicon-envelope'></span>",
											array(
												'controller'=> 'trocaMensagens',
												'action' => 'index',
												$indicacao['Indicacao']['id']),
											array(
												'class'=> 'btn btn-sm btn-primary tt ' . $active,
												'title'=> 'Mensagens',
												'escape'=> false
											)
										);
										echo "&nbsp;";
									}
									
									// Somente TI
									if ($Auth_cargo_id == 3) {
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
											, $indicacao['Indicacao']['uid'])
										);
									}
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