<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<?= $this->Form->create($role) ?>
    <legend><?= __('Editar Perfil') ?></legend>    
    <div class="form-group">        
        <?php echo $this->Form->control('role_name',['label' =>'Perfil', 'class' => 'form-control']); ?>
    </div>
     <?php echo $this->Form->hidden('user_id', ['value' => $authUser['id'] ]); ?>
<?= $this->Form->button('Submit', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>