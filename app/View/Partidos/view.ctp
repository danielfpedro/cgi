<h1>hjhjkh</h1>
<div class="partidos view">
<h2><?php echo __('Partido'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($partido['Partido']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($partido['Partido']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sigla'); ?></dt>
		<dd>
			<?php echo h($partido['Partido']['sigla']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($partido['Partido']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($partido['Partido']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($partido['Partido']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Partido'), array('action' => 'edit', $partido['Partido']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Partido'), array('action' => 'delete', $partido['Partido']['id']), null, __('Are you sure you want to delete # %s?', $partido['Partido']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Partidos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partido'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vereadores'), array('controller' => 'vereadores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vereador'), array('controller' => 'vereadores', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Vereadores'); ?></h3>
	<?php if (!empty($partido['Vereador'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Nome Parlamentar'); ?></th>
		<th><?php echo __('Ativo'); ?></th>
		<th><?php echo __('Partido Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($partido['Vereador'] as $vereador): ?>
		<tr>
			<td><?php echo $vereador['id']; ?></td>
			<td><?php echo $vereador['name']; ?></td>
			<td><?php echo $vereador['nome_parlamentar']; ?></td>
			<td><?php echo $vereador['ativo']; ?></td>
			<td><?php echo $vereador['partido_id']; ?></td>
			<td><?php echo $vereador['created']; ?></td>
			<td><?php echo $vereador['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'vereadores', 'action' => 'view', $vereador['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'vereadores', 'action' => 'edit', $vereador['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'vereadores', 'action' => 'delete', $vereador['id']), null, __('Are you sure you want to delete # %s?', $vereador['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Vereador'), array('controller' => 'vereadores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
