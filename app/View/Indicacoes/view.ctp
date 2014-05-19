<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Indicações', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Indicação <?php echo $indicacao['Indicacao']['uid']; ?>
	</li>
</div>

<div class="row" style="margin-top: 55px;">	
	<div class="col-md-12">
		<div class="pull-right">
			<?php
				echo $this->Html->Link(
					'<span class=\'glyphicon glyphicon-print\'></span> Imprimir',
					array('controller'=> 'indicacoes', 'action'=> 'view_print', $indicacao['Indicacao']['id']),
					array('escape'=> false, 'class'=> 'btn btn-primary', 'target'=> '_blank'));
			?>
		</div>

		<p>
			<?php echo $indicacao['Indicacao']['introducao']; ?>
		</p>

		<dl>
			<dt>
				Justificativa
			</dt>
			<dd>
				<?php echo $indicacao['Indicacao']['justificativa']; ?>
			</dd>
		</dl>

		<dl>
			<dt>Autor(s)</dt>	
			<dd>
				<?php
					$vereadores = array();
					foreach ($indicacao['Vereador'] as $vereador) {
						$vereadores[] = $vereador['name'] . ' "'.$vereador['nome_parlamentar'].'" ('.$vereador['Partido']['sigla'].')';
					}
					echo $this->Text->toList($vereadores, 'e');
				?>
			</dd>
		</dl>

		<dl>
			<dt>
				Secretaria responsável
			</dt>
			<dd>
				<?php if (!empty($indicacao['Secretaria']['name'])): ?>
					<?php echo $indicacao['Secretaria']['name']; ?>
				<?php else: ?>
					<em class="text-muted">Nenhuma secretaria adicionada até o momento.</em>
				<?php endif ?>
			</dd>
		</dl>

		<dl>
			<dt>
				Status
			</dt>
			<dd>
				<?php echo $indicacao['StatusIndicacao']['name']; ?>
			</dd>
		</dl>	

		<?php if (!empty($indicacao['Indicacao']['parecer'])): ?>
			<blockquote>
				<p>
					<?php echo $indicacao['Indicacao']['parecer']; ?>
				</p>
				<footer>Parecer da secretaria</footer>
			</blockquote>
		<?php endif ?>

		<em class="text-muted">
			Indicação feita em 
			<strong>
				<?php
					echo $this->Time->format('d F Y', $indicacao['Indicacao']['data_indicacao']);
				?>
			</strong>
		</em>
	</div>
</div>