<div class="wrap-internal-page" style="margin-top: 10px;">
	<div class="row">
		<div class="col-md-11">
			<h4>Informações de usuário</h4>
			<hr>
			<?php echo $this->Form->create('Usuario'); ?>
				
			<div class="form-group">
				<?php echo $this->Form->input('id', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('nome', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('email', array('empty'=> 'Selecione:','class'=> 'form-control')); ?>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-ok"></span> Salvar alterações do usuário
				</button>
			</div>
			<br>
			<h4>Trocar senha</h4>
			<hr>
			<div class="form-group">
				<?php echo $this->Form->input('nova_senha', array('label'=> 'Nova senha','class'=> 'form-control')); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('repetir_nova_senha', array('label'=> 'Repetir nova senha','class'=> 'form-control')); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('senha', array('value'=> '','label'=> 'Senha atual','class'=> 'form-control')); ?>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-ok"></span> Alterar senha
				</button>
			</div>
		</div>
	<?php echo $this->Form->end(); ?>
	</div>
</div>