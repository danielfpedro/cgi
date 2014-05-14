<h1>hjhjkh</h1>
<div class="usuarios view">
<h2><?php echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Senha'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['senha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cargo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Cargo']['name'], array('controller' => 'cargos', 'action' => 'view', $usuario['Cargo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cargos'), array('controller' => 'cargos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cargo'), array('controller' => 'cargos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Secretarias'), array('controller' => 'secretarias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secretaria'), array('controller' => 'secretarias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Troca Mensagens'), array('controller' => 'troca_mensagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Troca Mensagem'), array('controller' => 'troca_mensagens', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Secretarias'); ?></h3>
	<?php if (!empty($usuario['Secretaria'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Ativo'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($usuario['Secretaria'] as $secretaria): ?>
		<tr>
			<td><?php echo $secretaria['id']; ?></td>
			<td><?php echo $secretaria['name']; ?></td>
			<td><?php echo $secretaria['created']; ?></td>
			<td><?php echo $secretaria['modified']; ?></td>
			<td><?php echo $secretaria['ativo']; ?></td>
			<td><?php echo $secretaria['usuario_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'secretarias', 'action' => 'view', $secretaria['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'secretarias', 'action' => 'edit', $secretaria['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'secretarias', 'action' => 'delete', $secretaria['id']), null, __('Are you sure you want to delete # %s?', $secretaria['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Secretaria'), array('controller' => 'secretarias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Troca Mensagens'); ?></h3>
	<?php if (!empty($usuario['TrocaMensagem'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Mensagem'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Destinatario'); ?></th>
		<th><?php echo __('Indicacao Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($usuario['TrocaMensagem'] as $trocaMensagem): ?>
		<tr>
			<td><?php echo $trocaMensagem['id']; ?></td>
			<td><?php echo $trocaMensagem['mensagem']; ?></td>
			<td><?php echo $trocaMensagem['usuario_id']; ?></td>
			<td><?php echo $trocaMensagem['destinatario']; ?></td>
			<td><?php echo $trocaMensagem['indicacao_id']; ?></td>
			<td><?php echo $trocaMensagem['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'troca_mensagens', 'action' => 'view', $trocaMensagem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'troca_mensagens', 'action' => 'edit', $trocaMensagem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'troca_mensagens', 'action' => 'delete', $trocaMensagem['id']), null, __('Are you sure you want to delete # %s?', $trocaMensagem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Troca Mensagem'), array('controller' => 'troca_mensagens', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
