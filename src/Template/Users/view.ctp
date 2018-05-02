<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name','Nome') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>       
        <tr>
            <th scope="row"><?= __('Email','E-mail') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role','Perfil') ?></th>
            <td><?= $this->Number->format($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created', 'Criado em') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified',' Editado em') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Uploads Relacionados') ?></h4>
        <?php if (!empty($user->uploads)): ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <th scope="col"><?= __('Arquivo') ?></th>
                <!--<th scope="col"><?= __('Categoria') ?></th>-->
                <th scope="col"><?= __('Criado em') ?></th>
                <th scope="col"><?= __('Modificado em') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </thead>
            <tbody>
            <?php foreach ($user->uploads as $uploads): ?>
            <tr>                
                <td><?= h($uploads->filename) ?></td>                
                <!--<td><?= h($uploads->category->name) ?></td>-->
                <td><?= h($uploads->created) ?></td>
                <td><?= h($uploads->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Uploads', 'action' => 'view', $uploads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Uploads', 'action' => 'edit', $uploads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Uploads', 'action' => 'delete', $uploads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $uploads->id)]) ?>
                </td>
            </tr>           
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>
