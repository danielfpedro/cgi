<h1>hjhjkh</h1>
<div class="notificacoes view">
<h2><?php echo __('Notificacao'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notificacao'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['notificacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($notificacao['Usuario']['name'], array('controller' => 'usuarios', 'action' => 'view', $notificacao['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lido'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['lido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identificador'); ?></dt>
		<dd>
			<?php echo h($notificacao['Notificacao']['identificador']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Notificacao'), array('action' => 'edit', $notificacao['Notificacao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Notificacao'), array('action' => 'delete', $notificacao['Notificacao']['id']), null, __('Are you sure you want to delete # %s?', $notificacao['Notificacao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notificacoes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notificacao'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
