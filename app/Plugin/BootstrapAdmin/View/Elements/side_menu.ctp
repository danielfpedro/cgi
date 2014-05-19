<?php
$active = '';
$active_found = false;
?>
<ul class="nav nav-custom" style="margin-top: 0px;">
	<?php foreach ($items_menu as $item): ?>
		<?php
			$controller = $this->params['controller'];
			$action = $this->params['action'];
			if ($controller == $item['url']['controller'] AND $active_found == false) {
				$active = 'active';
				$active_found = true;
			} else {
				$active = '';
			}
		?>
		<li class="<?php echo $active; ?>">
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
		<?php
			$controller = $this->params['controller'];
			$action = $this->params['action'];
			if ($controller == $item['url']['controller'] AND $action == $item['url']['action'] AND $active_found == false) {
				$active = 'active';
				$active_found = true;
			} else {
				$active = '';
			}
		?>
		<li
			class="<?php echo $active; ?>">
			<?php
				echo $this->Html->link(
					$item['label'],
					$item['url'],
					array('escape'=> false)
				)
			?>
		</li>
	<?php endforeach ?>	

	<li class="text-muted" style="font-size: 11px; margin: 15px 0 5px 10px; text-transform: uppercase;">Cadastros</li>
	<?php foreach ($items_menu_dados_extras as $item): ?>
		<?php
			$controller = $this->params['controller'];
			$action = $this->params['action'];
			if ($controller == $item['url']['controller'] AND $active_found == false) {
				$active = 'active';
				$active_found = true;
			} else {
				$active = '';
			}
		?>
		<li class="<?php echo $active; ?>">
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