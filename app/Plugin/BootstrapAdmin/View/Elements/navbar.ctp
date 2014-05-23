<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
  <div class="row">
  	<div class="col-md-2">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="#"><?php echo $site_name; ?></a>

	</div>
  	</div>
  	<div class="col-md-10">
  		
  

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

<ul class="nav navbar-nav visible-xs menu-navbar">
	  <?php foreach ($items_menu as $item): ?>
		<li class="<?php echo ($this->params['controller'] == $item['url']['controller'])? 'active': ''; ?>">
		  <?php
			echo $this->Html->link(
			  "<span class='glyphicon glyphicon-" .$item['icon']. " icon-menu'></span>" . $item['label'],
			  $item['url'],
			  array('escape'=> false)
			)
		  ?>
		</li>
	  <?php endforeach ?>
	</ul>
	

	  <ul class="nav navbar-nav">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle navbar-admin-user" data-toggle="dropdown" id="dropdown-notificacoes">
			<span class="glyphicon glyphicon-bell"></span>

			<?php if ($total_notificacoes_novas > 0): ?>
				<span id="notificacoes-new" style="position: absolute; top: 0;margin-left: 15px; margin-top: 5px;background-color: #e74c3c;border-radius: 100px;padding: 0px 6px;">
					<?php echo $total_notificacoes_novas; ?>
				</span>
			<?php endif ?>
		</a>
			<ul class="dropdown-menu">
				<?php if (!empty($notificacoes)): ?>
					<?php foreach ($notificacoes as $notificacao): ?>
						<?php
							$url = array();
							switch ($notificacao['Notificacao']['tipo'] ) {
								// Notificações
								case 1:
									$url = array(
										'controller'=> 'indicacoes',
										'action'=> 'view',
										$notificacao['Notificacao']['identificador']);
									break;
								//Projetos
								case 2:
									$url = array(
										'controller'=> 'projetos',
										'action'=> 'view',
										$notificacao['Notificacao']['identificador']);
									break;
								//Mensagens
								case 3:
									$url = array(
										'controller'=> 'trocaMensagens',
										'action'=> 'index',
										$notificacao['Notificacao']['identificador']);
									break;
								default:
									# code...
									break;
							}
						?>
						<li>
							<?php
								echo $this->Html->link(
									$notificacao['Notificacao']['notificacao'],
									$url,
									array('escape'=> false)
								);
							?>
						</li>
					<?php endforeach ?>
				<?php else: ?>
					<li>
						<div style="padding: 10px;width: 250px;">Nenhuma notificação disponível</div>
					</li>
				<?php endif ?>
				<li class="divider"></li>
				<li class="text-center">
					<?php
						echo $this->Html->link("Ver todas", array('controller'=> 'notificacoes' ,'action'=> 'index'), array('escape'=> false));
					?>
				</li>
			</ul>
		</li>
	  </ul><!-- navbar-nav -->

	  <ul class="nav navbar-nav navbar-right text-center">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle navbar-admin-user" data-toggle="dropdown">
				<span class="glyphicon glyphicon-user"></span>&nbsp;
				<?php $secretaria = (!empty($Auth_secretaria))? ' - ' . $Auth_secretaria . ' ': ''; ?>
				<?php echo $Auth_nome . ' ('.$Auth_cargo. $secretaria . ')' ?> <b class="caret"></b>
			</a>
		  <ul class="dropdown-menu">
			<li>
			  <?php echo $this->Html->link("<span class='glyphicon glyphicon-cog'></span> Configurações do meu usuário", array('controller'=> 'usuarios','action'=> 'meu_usuario'), array('escape'=> false)) ?>
			</li>
			<li class="divider"></li>
			<li>
			  <?php
				echo $this->Html->link("<span class='glyphicon glyphicon-off'></span> Sair", array('controller'=> 'usuarios' ,'action'=> 'logout'), array('escape'=> false));
			  ?>
			</li>
		  </ul>
		</li>
	  </ul><!-- navbar-nav -->
	</div><!-- /.navbar-collapse -->
	</div>
  </div>
  </div><!-- /.container-fluid -->
</nav>