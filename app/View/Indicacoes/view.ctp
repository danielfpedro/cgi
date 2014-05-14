<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Indicações', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Indicação
	</li>
</div>

<div class="row" style="margin-top: 55px;">
	<div class="col-md-12 text-right">
		<?php
			echo $this->Html->Link('<span class=\'glyphicon glyphicon-print\'></span> Imprimir', array('controller'=> 'indicacoes', 'action'=> 'imprimir'), array('escape'=> false, 'class'=> 'btn btn-primary'));
		?>
	</div>
	<div class="col-md-12">
		<h4>
			Indicação <?php echo $indicacao['Indicacao']['uid']; ?>
		</h4>
		<p>
			<?php echo $indicacao['Indicacao']['introducao']; ?>
		</p>
		<br>
		<h4>
			Justificativa
		</h4>
		<p>
			<?php echo $indicacao['Indicacao']['justificativa']; ?>
		</p>
		<br>

		<dl>
			<dt>Autor(s)</dt>	
			<dd>
				<?php
					$vereadores = array();
					foreach ($indicacao['Vereador'] as $vereador) {
						$vereadores[] = $vereador['name'] . ' ('.$vereador['Partido']['sigla'].')';
					}
					echo $this->Text->toList($vereadores, 'e');
				?>
			</dd>
		</dl>

		<em>
			<?php
				echo $this->Time->format('d F Y', $indicacao['Indicacao']['data_indicacao']);
			?>
		</em>
	</div>
</div>