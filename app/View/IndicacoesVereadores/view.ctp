<h1>hjhjkh</h1>
<div class="indicacoesVereadores view">
<h2><?php echo __('Indicacoes Vereador'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($indicacoesVereador['IndicacoesVereador']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vereador'); ?></dt>
		<dd>
			<?php echo $this->Html->link($indicacoesVereador['Vereador']['id'], array('controller' => 'vereadores', 'action' => 'view', $indicacoesVereador['Vereador']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Indicacao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($indicacoesVereador['Indicacao']['name'], array('controller' => 'indicacoes', 'action' => 'view', $indicacoesVereador['Indicacao']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Indicacoes Vereador'), array('action' => 'edit', $indicacoesVereador['IndicacoesVereador']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Indicacoes Vereador'), array('action' => 'delete', $indicacoesVereador['IndicacoesVereador']['id']), null, __('Are you sure you want to delete # %s?', $indicacoesVereador['IndicacoesVereador']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicacoes Vereadores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicacoes Vereador'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vereadores'), array('controller' => 'vereadores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vereador'), array('controller' => 'vereadores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicacoes'), array('controller' => 'indicacoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicacao'), array('controller' => 'indicacoes', 'action' => 'add')); ?> </li>
	</ul>
</div>
