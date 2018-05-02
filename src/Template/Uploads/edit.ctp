<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Upload $upload
 */
?>
<?= $this->Form->create($upload,['type' => 'file']) ?>
    <legend><?= __('Editar Arquivo') ?></legend>    
    <div class="form-group">        
        <?php echo $this->Form->control('filename', ['label' =>'Nome Arquivo', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->control('file', ['label' =>'Arquivo', 'class' => 'form-control', 'type' => 'file']); ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->control('thumbnail', ['label' =>'Thumbnail', 'class' => 'form-control', 'type' => 'file']); ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->control('category_id', ['label' =>'Categoria', 'class' => 'form-control']); ?>
    </div>
     <?php echo $this->Form->hidden('user_id', ['value' => $authUser['id'] ]); ?>
<?= $this->Form->button('Submit', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
