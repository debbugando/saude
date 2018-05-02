<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="table-responsive">
    <div style="margin-bottom:1%;">
        <h3>Listagem Categorias
            <?php if($authUser['role']==1): ?>                
                <?php echo  $this->Html->link('Adicionar Categoria', ['controller' => 'Categories', 'action' => 'add'], ['class' =>'float-right btn btn-primary']) ; ?>
            <?php endif; ?>            
        </h3>
    </div>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>            
            <th scope="col">
            <?=$this->Paginator->sort(
                'name',
                array('asc' => __('Nome') . ' <i class="fa fa-angle-down"></i>',
                    'desc' => __('Nome') . ' <i class="fa fa-angle-up"></i>'
                ),
                array( 'escape' => false )
            );?>   
            </th>
            <th scope="col">
            <?=$this->Paginator->sort(
                'created',
                array('asc' => __('Criado em') . ' <i class="fa fa-angle-down"></i>',
                    'desc' => __('Criado em') . ' <i class="fa fa-angle-up"></i>'
                ),
                array( 'escape' => false )
            );?>   
            </th>
            <th scope="col">
            <?=$this->Paginator->sort(
                'modified',
                array('asc' => __('Modificado em') . ' <i class="fa fa-angle-down"></i>',
                    'desc' => __('Modificado em') . ' <i class="fa fa-angle-up"></i>'
                ),
                array( 'escape' => false )
            );?>   
            </th>
            <th scope="col" class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= h($category->name) ?></td>
            <td><?= h($category->created) ?></td>
            <td><?= h($category->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $category->id]) ?>
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $category->id]) ?>
                <?= $this->Form->postLink(__('Remover'), ['action' => 'delete', $category->id], ['confirm' => __('Deseja Remover o Registro # {0}?', $category->id)]) ?>
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