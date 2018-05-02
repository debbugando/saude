<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Upload $upload
 */
?>
<?= $this->Form->create($upload,['type' => 'file']) ?>
    <legend><?= __('Editar Arquivo') ?></legend>
    <?php if(!empty($upload->filename) || $upload->filename!=null): ?> 
    <div class="form-group">
        <label><?= __('Arquivo Atual:') ?></label>        
        <?= $this->Html->link($upload->filename,'/'.str_replace('\\', '/', $upload->file_dir) . '/' . $upload->file, ['target' => '_blank']); ?>
        <hr>
        <label><?= __('Miniatura Atual:') ?></label>        
        <?php
        if(!empty($upload->thumbnail)):
            echo $this->Html->image('/'.str_replace('\\', '/', $upload->thumbnail_dir) . '/thumbnail-' . $upload->thumbnail);
        else:
            echo $this->Html->image($upload->file_type.'.png');
        endif;

        ?>
    <?php endif; ?>
    </div>
    <div class="form-group">        
        <?php echo $this->Form->control('filename', ['label' =>'Nome Arquivo', 'class' => 'form-control']); ?>
    </div>    
    <div class="form-group">
        <?php echo $this->Form->control('file', ['label' =>'Arquivo', 'class' => 'form-control', 'type' => 'file']); ?>
    </div>    
    <div class="form-group">
        <?php echo $this->Form->control('thumbnail', ['label' =>'Miniatura', 'class' => 'form-control', 'type' => 'file']); ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->control('category_id', ['label' =>'Categoria', 'class' => 'form-control']); ?>
    </div>
     <?php echo $this->Form->hidden('user_id', ['value' => $authUser['id'] ]); ?>
<?= $this->Form->button('Submit', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
