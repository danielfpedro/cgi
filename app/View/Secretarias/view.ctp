<h1>hjhjkh</h1>
<div class="secretarias view">
<h2><?php echo __('Secretaria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($secretaria['Secretaria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($secretaria['Secretaria']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($secretaria['Secretaria']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($secretaria['Secretaria']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($secretaria['Secretaria']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($secretaria['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $secretaria['Usuario']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Secretaria'), array('action' => 'edit', $secretaria['Secretaria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Secretaria'), array('action' => 'delete', $secretaria['Secretaria']['id']), null, __('Are you sure you want to delete # %s?', $secretaria['Secretaria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Secretarias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secretaria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicacoes'), array('controller' => 'indicacoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicacao'), array('controller' => 'indicacoes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Indicacoes'); ?></h3>
	<?php if (!empty($secretaria['Indicacao'])): ?>
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
	<?php foreach ($secretaria['Indicacao'] as $indicacao): ?>
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
