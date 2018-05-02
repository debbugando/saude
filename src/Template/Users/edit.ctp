<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?= $this->Form->create($user) ?>
    <legend><?= __('Editar Usuário') ?></legend>
    <div class="form-group">        
        <?php echo $this->Form->control('name', ['label' =>'Nome', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">        
        <?php echo $this->Form->control('cbo', ['label' =>'CBO', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">        
        <?php echo $this->Form->control('role', ['label' =>'Perfil', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">        
        <?php echo $this->Form->control('password', ['label' =>'Senha', 'type' => 'password', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">        
        <?php echo $this->Form->control('email', ['label' =>'E-mail', 'class' => 'form-control']); ?>
    </div>    
<?= $this->Form->button('Submit', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>