<h1>hjhjkh</h1>
<div class="trocaMensagens view">
<h2><?php echo __('Troca Mensagem'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trocaMensagem['TrocaMensagem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mensagem'); ?></dt>
		<dd>
			<?php echo h($trocaMensagem['TrocaMensagem']['mensagem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trocaMensagem['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $trocaMensagem['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Destinatario'); ?></dt>
		<dd>
			<?php echo h($trocaMensagem['TrocaMensagem']['destinatario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Indicacao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trocaMensagem['Indicacao']['name'], array('controller' => 'indicacoes', 'action' => 'view', $trocaMensagem['Indicacao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($trocaMensagem['TrocaMensagem']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Troca Mensagem'), array('action' => 'edit', $trocaMensagem['TrocaMensagem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Troca Mensagem'), array('action' => 'delete', $trocaMensagem['TrocaMensagem']['id']), null, __('Are you sure you want to delete # %s?', $trocaMensagem['TrocaMensagem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Troca Mensagens'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Troca Mensagem'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicacoes'), array('controller' => 'indicacoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicacao'), array('controller' => 'indicacoes', 'action' => 'add')); ?> </li>
	</ul>
</div>
