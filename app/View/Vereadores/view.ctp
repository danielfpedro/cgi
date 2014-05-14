<h1>hjhjkh</h1>
<div class="vereadores view">
<h2><?php echo __('Vereador'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vereador['Vereador']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($vereador['Vereador']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome Parlamentar'); ?></dt>
		<dd>
			<?php echo h($vereador['Vereador']['nome_parlamentar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($vereador['Vereador']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Partido'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vereador['Partido']['id'], array('controller' => 'partidos', 'action' => 'view', $vereador['Partido']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($vereador['Vereador']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($vereador['Vereador']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vereador'), array('action' => 'edit', $vereador['Vereador']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vereador'), array('action' => 'delete', $vereador['Vereador']['id']), null, __('Are you sure you want to delete # %s?', $vereador['Vereador']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vereadores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vereador'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partidos'), array('controller' => 'partidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partido'), array('controller' => 'partidos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicacoes'), array('controller' => 'indicacoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicacao'), array('controller' => 'indicacoes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Indicacoes'); ?></h3>
	<?php if (!empty($vereador['Indicacao'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Uid'); ?></th>
		<th><?php echo __('Arquivo'); ?></th>
		<th><?php echo __('Parecer'); ?></th>
		<th><?php echo __('Data Indicacao'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Secretaria Id'); ?></th>
		<th><?php echo __('Status Indicacao Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($vereador['Indicacao'] as $indicacao): ?>
		<tr>
			<td><?php echo $indicacao['id']; ?></td>
			<td><?php echo $indicacao['name']; ?></td>
			<td><?php echo $indicacao['uid']; ?></td>
			<td><?php echo $indicacao['arquivo']; ?></td>
			<td><?php echo $indicacao['parecer']; ?></td>
			<td><?php echo $indicacao['data_indicacao']; ?></td>
			<td><?php echo $indicacao['created']; ?></td>
			<td><?php echo $indicacao['modified']; ?></td>
			<td><?php echo $indicacao['secretaria_id']; ?></td>
			<td><?php echo $indicacao['status_indicacao_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'indicacoes', 'action' => 'view', $indicacao['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'indicacoes', 'action' => 'edit', $indicacao['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'indicacoes', 'action' => 'delete', $indicacao['id']), null, __('Are you sure you want to delete # %s?', $indicacao['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Indicacao'), array('controller' => 'indicacoes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
