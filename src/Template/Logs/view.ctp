<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log $log
 */
?>
<div class="logs view large-9 medium-8 columns content">
    <h3><?= h('Exibição Log Id: '.$log->id) ?></h3>
    <form>
      <div class="form-group row">
        <label for="log" class="col-sm-2 col-form-label"><?= __('Log:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="log" value="<?= h($log->log) ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="user" class="col-sm-2 col-form-label"><?= __('Usuário:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="user" value="<?= h(ucwords($log->user->name)) ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="created" class="col-sm-2 col-form-label"><?= __('Criado em:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="created" value="<?= h($log->created) ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="modified" class="col-sm-2 col-form-label"><?= __('Modificado em:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="modified" value="<?= h($log->modified) ?>">
        </div>
      </div>      
    </form>
</div>
