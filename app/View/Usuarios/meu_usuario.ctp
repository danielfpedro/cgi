<div class="breadcrumb breadcrumb-admin">
	<li class="active">
		Meu usuário
	</li>
</div>

<div class="wrap-internal-page">
	<div class="row">
		<div class="col-md-12">
			<?php echo $this->Form->create('Usuario'); ?>
				<div class="form-group">
					<?php echo $this->Form->input('name', array('label'=> 'Nome','class'=> 'form-control')); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class'=> 'form-control')); ?>
				</div>

				<br>
				<h4>Trocar senha</h4>
				<hr>

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input(
								'fake_password',
								array('label'=> 'Nova Senha', 'class'=> 'form-control')); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">
						<span class="glyphicon glyphicon-ok"></span> Salvar alterações</button>
				</div>
			<?php echo $this->Form->end(); ?>	
		</div>
	</div>
</div>