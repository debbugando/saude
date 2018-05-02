<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Upload $upload
 */
?>
<div class="uploads view large-9 medium-8 columns content">
    <h3><?= h('Exibição de upload: '.$upload->id) ?></h3>
    <form>
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label"><?= __('Usuário:') ?></label>
        <div class="col-sm-10">
          <?= $upload->has('user') ? $this->Html->link($upload->user->name, ['controller' => 'Users', 'action' => 'view', $upload->user->id]) : '' ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="photo" class="col-sm-2 col-form-label"><?= __('Arquivo:') ?></label>
        <div class="col-sm-10">
          <?= $this->Html->link($upload->filename,'/'.str_replace('\\', '/', $upload->file_dir) . '/' . $upload->file, ['target' => '_blank']); ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="photo" class="col-sm-2 col-form-label"><?= __('Miniatura:') ?></label>
        <div class="col-sm-10">
          <?php
            if(!empty($upload->thumbnail)):
                echo $this->Html->image('/'.str_replace('\\', '/', $upload->thumbnail_dir) . '/thumbnail-' . $upload->thumbnail);
            else:
                echo $this->Html->image($upload->file_type.'.png');
            endif;

            ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="category_id" class="col-sm-2 col-form-label"><?= __('Categoria:') ?></label>
        <div class="col-sm-10">          
          <input class="form-control" id="created" value="<?= h($upload->category->name); ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="created" class="col-sm-2 col-form-label"><?= __('Criado em:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="created" value="<?= h($upload->created) ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="modified" class="col-sm-2 col-form-label"><?= __('Modificado em:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="modified" value="<?= h($upload->modified) ?>">
        </div>
      </div>      
    </form>
</div>
