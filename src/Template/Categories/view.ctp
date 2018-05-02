<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h('Exibição Categoria: '.$category->name) ?></h3>
    <form>
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label"><?= __('Nome:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="name" value="<?= h($category->name) ?>"/>
        </div>
      </div>     
      <div class="form-group row">
        <label for="created" class="col-sm-2 col-form-label"><?= __('Criado em:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="created" value="<?= h($category->created) ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="modified" class="col-sm-2 col-form-label"><?= __('Modificado em:') ?></label>
        <div class="col-sm-10">
          <input class="form-control" id="modified" value="<?= h($category->modified) ?>">
        </div>
      </div>      
    </form>    
    <div class="related">
        <h4><?= __('Uploads Relacionados') ?></h4>
        <?php if (!empty($category->uploads)): ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <th scope="col"><?= __('Arquivo') ?></th>
                <th scope="col"><?= __('Categoria') ?></th>
                <th scope="col"><?= __('Criado em') ?></th>
                <th scope="col"><?= __('Modificado em') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </thead>
            <tbody>
            <?php foreach ($category->uploads as $uploads): ?>
            <tr>                
                <td><?= h($uploads->filename) ?></td>                
                <td><?= h($category->name) ?></td>
                <td><?= h($uploads->created) ?></td>
                <td><?= h($uploads->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'Uploads', 'action' => 'view', $uploads->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Uploads', 'action' => 'edit', $uploads->id]) ?>
                    <?= $this->Form->postLink(__('Remover'), ['controller' => 'Uploads', 'action' => 'delete', $uploads->id], ['confirm' => __('Deseja Remover o Registro # {0}?', $uploads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>
