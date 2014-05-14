<h1>hjhjkh</h1>
<div class="propostaProjetos view">
<h2><?php echo __('Proposta Projeto'); ?></h2>
	<dl>
		<dt><?php echo __('Id Proposta'); ?></dt>
		<dd>
			<?php echo h($propostaProjeto['PropostaProjeto']['id_proposta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id Projeto'); ?></dt>
		<dd>
			<?php echo h($propostaProjeto['PropostaProjeto']['id_projeto']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Proposta Projeto'), array('action' => 'edit', $propostaProjeto['PropostaProjeto']['id_proposta'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Proposta Projeto'), array('action' => 'delete', $propostaProjeto['PropostaProjeto']['id_proposta']), null, __('Are you sure you want to delete # %s?', $propostaProjeto['PropostaProjeto']['id_proposta'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Proposta Projetos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proposta Projeto'), array('action' => 'add')); ?> </li>
	</ul>
</div>
