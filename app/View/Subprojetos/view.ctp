<h1>hjhjkh</h1>
<div class="subprojetos view">
<h2><?php echo __('Subprojeto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subprojeto['Subprojeto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id Secretaria'); ?></dt>
		<dd>
			<?php echo h($subprojeto['Subprojeto']['id_secretaria']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id Projeto'); ?></dt>
		<dd>
			<?php echo h($subprojeto['Subprojeto']['id_projeto']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subprojeto'), array('action' => 'edit', $subprojeto['Subprojeto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Subprojeto'), array('action' => 'delete', $subprojeto['Subprojeto']['id']), null, __('Are you sure you want to delete # %s?', $subprojeto['Subprojeto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Subprojetos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subprojeto'), array('action' => 'add')); ?> </li>
	</ul>
</div>
