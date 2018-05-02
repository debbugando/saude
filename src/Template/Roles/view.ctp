<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="roles view large-9 medium-8 columns content">
    <h3><?= h('Exibição Perfil: '.$role->id) ?></h3>
    <form>
      <div class="form-group row">
        <label for="role" class="col-sm-2 col-form-label"><?= __('Perfil:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="role" value="<?= h($role->role_name) ?>"/>
        </div>
      </div>     
      <div class="form-group row">
        <label for="created" class="col-sm-2 col-form-label"><?= __('Criado em:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="created" value="<?= h($role->created) ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="modified" class="col-sm-2 col-form-label"><?= __('Modificado em:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="modified" value="<?= h($role->modified) ?>">
        </div>
      </div>      
    </form>    
</div>
