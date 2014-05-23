<div class="row" style="margin-top: 150px;">
	<div class="col-md-4 col-md-offset-4 text-center">
		<?php echo $this->Html->image('logo_prefeitura-pirai.png', array('style'=> 'margin-bottom: 40px;')); ?>
		<div class="well">
			<?php echo $this->Form->create('Usuario'); ?>
				<div class="form-group">
					<?php echo $this->Form->input(
						'email',
						array(
							'label'=> false,
							'class'=> 'form-control input-lg',
							'autofocus'=> true,
							'placeholder'=> 'Email'
							)); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input(
						'senha',
						array(
							'type'=> 'password',
							'label'=> false,
							'placeholder'=> 'Senha',
							'class'=> 'form-control input-lg')); ?>
				</div>
				<div class="form-group">
					<button class="btn btn-info btn-lg btn-block">Entrar</button>
				</div>
			<?php echo $this->Form->end(); ?>
		</div>
		<?php echo $this->Session->flash(); ?>
	</div>
</div>