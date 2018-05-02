<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h('Exibição Dados Usuário: '.ucwords($user->name)) ?></h3>
    <form>
        <div class="form-group row">
            <label for="log" class="col-sm-2 col-form-label"><?= __('Name','Nome') ?></label>
            <div class="col-sm-10">
                <input class="form-control" id="log" value="<?= h(ucwords($user->name)) ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="user" class="col-sm-2 col-form-label"><?= __('Email','E-mail') ?></label>
            <div class="col-sm-10">
                <input class="form-control" id="user" value="<?= h($user->email) ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="created" class="col-sm-2 col-form-label"><?= __('Role','Perfil') ?></label>
            <div class="col-sm-10">
                <input class="form-control" id="created" value="<?= $this->Number->format($user->role); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="created" class="col-sm-2 col-form-label"><?= __('Criado em:') ?></label>
            <div class="col-sm-10">
                <input class="form-control" id="created" value="<?= h($user->created) ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="modified" class="col-sm-2 col-form-label"><?= __('Modificado em:') ?></label>
            <div class="col-sm-10">
                <input class="form-control" id="modified" value="<?= h($user->modified) ?>">
            </div>
        </div>
    </form>   
    <div class="related">
        <h4><?= __('Uploads Relacionados') ?></h4>
        <?php if (!empty($user->uploads)): ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <th scope="col"><?= __('Arquivo') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col"><?= __('Miniatura') ?></th>
                <th scope="col"><?= __('Criado em') ?></th>
                <th scope="col"><?= __('Modificado em') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </thead>
            <tbody>
            <?php foreach ($user->uploads as $uploads): ?>
            <tr>                
                <td><?= h($uploads->filename) ?></td>                                
                <td><?= $this->Html->link($uploads->filename,'/'.str_replace('\\', '/', $uploads->file_dir) . '/' . $uploads->file, ['target' => '_blank']); ?>                
                </td>
                <td>
                    <?php
                    if(!empty($uploads->thumbnail)):
                        echo $this->Html->image('/'.str_replace('\\', '/', $uploads->thumbnail_dir) . '/thumbnail-' . $uploads->thumbnail);
                    else:
                        echo $this->Html->image($uploads->file_type.'.png');
                    endif;

                    ?>
                </td>
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
