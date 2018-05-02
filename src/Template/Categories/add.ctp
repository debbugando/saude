<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<?= $this->Form->create($category) ?>
    <legend><?= __('Adicionar Categoria') ?></legend>    
    <div class="form-group">        
        <?php echo $this->Form->control('name',['label' =>'Categoria', 'class' => 'form-control']); ?>
    </div>
     <?php echo $this->Form->hidden('user_id', ['value' => $authUser['id'] ]); ?>
<?= $this->Form->button('Submit', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>

