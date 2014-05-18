<h1>hjhjkh</h1>
<div class="statusProjetos view">
<h2><?php echo __('Status Projeto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($statusProjeto['StatusProjeto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($statusProjeto['StatusProjeto']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($statusProjeto['StatusProjeto']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($statusProjeto['StatusProjeto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($statusProjeto['StatusProjeto']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Status Projeto'), array('action' => 'edit', $statusProjeto['StatusProjeto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Status Projeto'), array('action' => 'delete', $statusProjeto['StatusProjeto']['id']), null, __('Are you sure you want to delete # %s?', $statusProjeto['StatusProjeto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Status Projetos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status Projeto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projetos'), array('controller' => 'projetos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Projetos'); ?></h3>
	<?php if (!empty($statusProjeto['Projeto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Mapa Zoom'); ?></th>
		<th><?php echo __('Mapa Latlng'); ?></th>
		<th><?php echo __('Data Projeto'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status Projeto Id'); ?></th>
		<th><?php echo __('Bairro Id'); ?></th>
		<th><?php echo __('Indicacao Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($statusProjeto['Projeto'] as $projeto): ?>
		<tr>
			<td><?php echo $projeto['id']; ?></td>
			<td><?php echo $projeto['titulo']; ?></td>
			<td><?php echo $projeto['descricao']; ?></td>
			<td><?php echo $projeto['endereco']; ?></td>
			<td><?php echo $projeto['mapa_zoom']; ?></td>
			<td><?php echo $projeto['mapa_latlng']; ?></td>
			<td><?php echo $projeto['data_projeto']; ?></td>
			<td><?php echo $projeto['valor']; ?></td>
			<td><?php echo $projeto['created']; ?></td>
			<td><?php echo $projeto['modified']; ?></td>
			<td><?php echo $projeto['status_projeto_id']; ?></td>
			<td><?php echo $projeto['bairro_id']; ?></td>
			<td><?php echo $projeto['indicacao_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'projetos', 'action' => 'view', $projeto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'projetos', 'action' => 'edit', $projeto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projetos', 'action' => 'delete', $projeto['id']), null, __('Are you sure you want to delete # %s?', $projeto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Projeto'), array('controller' => 'projetos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
