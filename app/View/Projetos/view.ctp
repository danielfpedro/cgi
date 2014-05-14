<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Projetos', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Projeto
	</li>
</div>

<div class="row" style="margin-top: 40px;">
	<div class="col-md-12">
		<h3>
			<?php echo $projeto['Projeto']['titulo']; ?>
		</h3>
		<hr>
		<p>
			<?php echo $projeto['Projeto']['descricao']; ?>
		</p>
		<br>
		<dl>
			<dt>Localidade</dt>	
			<dd>
				<?php echo $projeto['Projeto']['endereco']; ?>, bairro <?php echo $projeto['Bairro']['name']; ?>
			</dd>
		</dl>
		<dl>
			<dt>Valor</dt>	
			<dd>
				<h4>R$ <?php echo number_format($projeto['Projeto']['valor'], 2, ',', '.'); ?></h4>
			</dd>
		</dl>
		<p>
			Este projeto partiu da indicação 
				<?php 
					echo $this->Html->link(
						$projeto['Indicacao']['uid'],
						array(
							'controller' => 'indicacoes',
							'action' => 'view',
							$projeto['Indicacao']['id']
						)
					);
				?>.
		</p>
	</div>
</div>