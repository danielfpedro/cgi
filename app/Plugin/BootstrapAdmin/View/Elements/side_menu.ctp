<ul class="nav nav-custom" style="margin-top: 0px;">
	<?php foreach ($items_menu as $item): ?>
		<li class="<?php echo ($this->params['controller'] == $item['url']['controller'])? 'active': ''; ?>">
			<?php
				echo $this->Html->link(
					$item['label'],
					$item['url'],
					array('escape'=> false)
				)
			?>
		</li>
	<?php endforeach ?>
	<li class="text-muted" style="font-size: 11px; margin: 15px 0 5px 10px; text-transform: uppercase;">Relatórios</li>
	<?php foreach ($items_menu_relatorios as $item): ?>
		<li class="<?php //echo ($this->params['controller'] == $item['url']['controller'])? 'active': ''; ?>">
			<?php
				echo $this->Html->link(
					$item['label'],
					$item['url'],
					array('escape'=> false)
				)
			?>
		</li>
	<?php endforeach ?>	
</ul>