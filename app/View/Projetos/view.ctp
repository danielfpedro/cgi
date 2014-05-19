<div class="breadcrumb breadcrumb-admin">
	<li>
		<?php echo $this->Html->link('Projetos', array('action'=> 'index')) ?>
	</li>
	<li class="active">
		Projeto "<?php echo $projeto['Projeto']['titulo']; ?>"
	</li>
</div>

<div class="row" style="margin-top: 60px;">
	<div class="col-md-12">
		<dl>
			<dt>Descrição</dt>	
			<dd>
				<?php echo $projeto['Projeto']['descricao']; ?>
			</dd>
		</dl>
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
		<em class="text-muted">
			Projeto criado em 
			<strong><?php echo $this->Time->format('d F Y', $projeto['Projeto']['created']); ?></strong>
			em resposta a indicação 
				<?php 
					echo $this->Html->link(
						$projeto['Indicacao']['uid'],
						array(
							'controller' => 'indicacoes',
							'action' => 'view',
							$projeto['Indicacao']['id']
						),
						array(
							'target'=> '_blank',
							)
					);
				?>.
		</em>
	</div>
</div>