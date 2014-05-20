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
		  <a href="#" class="dropdown-toggle navbar-admin-user" data-toggle="dropdown">
			<span class="glyphicon glyphicon-bell"></span>
			<span style="position: absolute; top: 0;margin-left: 15px; margin-top: 5px;background-color: #e74c3c;border-radius: 100px;padding: 0px 6px;">1</span>
		</a>
			<ul class="dropdown-menu">
				<?php if (!empty($notificacoes)): ?>
					<?php foreach ($notificacoes as $notificacao): ?>
						<?php
							$u = explode(';', $notificacao['Notificacao']['url']);
							$url = array('controller'=> $u['0'], 'action'=> $u['1'], $u['2']);
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
						echo $this->Html->link("Ver todas", array('action'=> 'logout'), array('escape'=> false));
					?>
				</li>
			</ul>
		</li>
	  </ul><!-- navbar-nav -->

	  <ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle navbar-admin-user" data-toggle="dropdown">
			<span class="glyphicon glyphicon-user"></span> Donald Cerrone <b class="caret"></b></a>
		  <ul class="dropdown-menu">
			<li>
			  <?php echo $this->Html->link("<span class='glyphicon glyphicon-cog'></span> Configurações do meu usuário", array('controller'=> 'usuarios','action'=> 'meu_usuario'), array('escape'=> false)) ?>
			</li>
			<li class="divider"></li>
			<li>
			  <?php
				echo $this->Html->link("<span class='glyphicon glyphicon-off'></span> Sair", array('action'=> 'logout'), array('escape'=> false));
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