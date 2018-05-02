<div class="card card-login mx-auto mt-5">
  <div class="card-header">Login</div>
  <div class="card-body">
    <?= $this->Form->create() ?>
		<div class="form-group">        
			<?php echo $this->Form->control('email', ['label' =>'E-mail', 'class' => 'form-control']); ?>
		</div>
		<div class="form-group">        
			<?php echo $this->Form->control('password', ['label' =>'Senha', 'type' => 'password', 'class' => 'form-control']); ?>
		</div>    
	    <?= $this->Form->button('Login', ['class' => 'btn btn-primary']) ?>
		<?= $this->Form->end() ?>    
  </div>
</div>