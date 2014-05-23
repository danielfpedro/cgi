<h1>hjhjkh</h1>
<div class="notificacoesLidas view">
<h2><?php echo __('Notificacoes Lida'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($notificacoesLida['NotificacoesLida']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last View'); ?></dt>
		<dd>
			<?php echo h($notificacoesLida['NotificacoesLida']['last_view']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($notificacoesLida['NotificacoesLida']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($notificacoesLida['Usuario']['name'], array('controller' => 'usuarios', 'action' => 'view', $notificacoesLida['Usuario']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Notificacoes Lida'), array('action' => 'edit', $notificacoesLida['NotificacoesLida']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Notificacoes Lida'), array('action' => 'delete', $notificacoesLida['NotificacoesLida']['id']), null, __('Are you sure you want to delete # %s?', $notificacoesLida['NotificacoesLida']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notificacoes Lidas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notificacoes Lida'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
