<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Upload[]|\Cake\Collection\CollectionInterface $uploads
 */
?>
<div class="table-responsive">
    <div style="margin-bottom:1%;">
        <h3>Listagem Arquivos
            <?php if($authUser): ?>
                <?php echo  $this->Html->link('Adicionar Arquivo', ['controller' => 'Uploads', 'action' => 'add'], ['class' =>'float-right btn btn-primary']) ; ?>
            <?php endif; ?>            
        </h3>
    </div>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>                                
                <th scope="col">
                <?=$this->Paginator->sort(
                    'user_id',
                    array('asc' => __('Usuário') . ' <i class="fa fa-angle-down"></i>',
                        'desc' => __('Usuário') . ' <i class="fa fa-angle-up"></i>'
                    ),
                    array( 'escape' => false )
                );?>   
                </th>               
                <th scope="col">
                <?=$this->Paginator->sort(
                    'photo',
                    array('asc' => __('Arquivo') . ' <i class="fa fa-angle-down"></i>',
                        'desc' => __('Arquivo') . ' <i class="fa fa-angle-up"></i>'
                    ),
                    array( 'escape' => false )
                );?>   
                </th>                
                <th scope="col">
                <?=$this->Paginator->sort(
                    'thumbnail',
                    array('asc' => __('Miniatura') . ' <i class="fa fa-angle-down"></i>',
                        'desc' => __('Miniatura') . ' <i class="fa fa-angle-up"></i>'
                    ),
                    array( 'escape' => false )
                );?>   
                </th>                
                <th scope="col">
                <?=$this->Paginator->sort(
                    'category_id',
                    array('asc' => __('Categoria') . ' <i class="fa fa-angle-down"></i>',
                        'desc' => __('Categoria') . ' <i class="fa fa-angle-up"></i>'
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
            <?php foreach ($uploads as $upload): ?>           
            <tr>              
                <td><?= $upload->has('user') ? $this->Html->link($upload->user->name, ['controller' => 'Users', 'action' => 'view', $upload->user->id]) : '' ?></td>
                <td><?= $this->Html->link($upload->filename,'/'.str_replace('\\', '/', $upload->file_dir) . '/' . $upload->file, ['target' => '_blank']); ?></td>
                <td class="d-flex justify-content-center"><?php
                if(!empty($upload->thumbnail)):
                    echo $this->Html->image('/'.str_replace('\\', '/', $upload->thumbnail_dir) . '/thumbnail-' . $upload->thumbnail);
                else:
                    echo $this->Html->image($upload->file_type.'.png');
                endif;

                ?></td>
                <td><?= h($upload->category->name); ?></td>
                <td><?= h($upload->created) ?></td>
                <td><?= h($upload->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $upload->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $upload->id]) ?>
                    <?= $this->Form->postLink(__('Remover'), ['action' => 'delete', $upload->id], ['confirm' => __('Deseja Remover o Registro # {0}?', $upload->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot></tfoot>
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