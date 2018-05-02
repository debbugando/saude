<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="table-responsive">
    <div style="margin-bottom:1%;">
        <h3>Listagem Arquivos
            <?php if($authUser['role']==1): ?>
                <?php echo $this->Html->link('Adicionar Usuário', ['controller' => 'Users', 'action' => 'add'], ['class' =>'float-right btn btn-primary']); ?>
            <?php endif; ?>
        </h3>
    </div>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>                
                <th scope="col"><?= $this->Paginator->sort('name', 'Nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cbo', 'CBO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role', 'Perfil') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email', 'E-mail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', 'Modificado em') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>                
                <td><?= h($user->name) ?></td>
                <td><?= h($user->cbo) ?></td>
                <td><?= h($user->role_name->role_name) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Remover'), ['action' => 'delete', $user->id], ['confirm' => __('Deseja Remover o Registro # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php
                $this->Paginator->setTemplates([
                    'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">Anterior</a></li>',
                    'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">Anterior</a></li>',
                    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'current' => '<li class="page-item active"><span class="page-link">{{text}}<span class="sr-only">(current)</span></span></li>',
                    'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">Próximo</a></li>',
                    'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">Próximo</a></li>'
                ]); ?>
                <?= $this->Paginator->prev() ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next() ?>
            </ul>
        </nav>      
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, Exibindo {{current}} Registro(s) de {{count}} Total')]) ?></p>
    </div>
</div>
