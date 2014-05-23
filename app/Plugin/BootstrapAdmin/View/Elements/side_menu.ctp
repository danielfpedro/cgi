<?php
$active = '';
$active_found = false;
?>
<ul class="nav nav-custom" style="margin-top: 0px;">

	<?php
		$controller = $this->params['controller'];
		$action = $this->params['action'];
		if ($controller == $items_menu[0]['url']['controller'] AND $active_found == false) {
			$active = 'active';
			$active_found = true;
		} else {
			$active = '';
		}
	?>
	<li class="<?php echo $active; ?>">
		<?php
			echo $this->Html->link(
				$items_menu[0]['label'],
				$items_menu[0]['url'],
				array('escape'=> false)
			)
		?>
	</li>

	<?php if ($Auth_cargo_id == 1 OR $Auth_cargo_id == 2): ?><!-- Somente prefeito e secretaria -->		
		<?php
			$controller = $this->params['controller'];
			$action = $this->params['action'];
			if ($controller == $items_menu[1]['url']['controller'] AND $active_found == false) {
				$active = 'active';
				$active_found = true;
			} else {
				$active = '';
			}
		?>
		<li class="<?php echo $active; ?>">
			<?php
				echo $this->Html->link(
					$items_menu[1]['label'],
					$items_menu[1]['url'],
					array('escape'=> false)
				)
			?>
		</li>
	<?php endif ?>

	<?php if ($Auth_cargo_id == 1): ?><!-- Somente prefeito e secretaria -->
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
	<?php endif ?><!-- Somente prefeito e secretaria -->


	<?php if ($Auth_cargo_id == 3): ?><!-- Somente TI-->
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
	<?php endif ?><!-- Somente TI-->

</ul>