<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log $log
 */
?>
<?= $this->Form->create($log) ?>
    <legend><?= __('Adicionar Log') ?></legend>    
    <div class="form-group">        
        <?php echo $this->Form->control('log',['label' =>'Log', 'class' => 'form-control']); ?>
    </div>
     <?php echo $this->Form->hidden('user_id', ['value' => $authUser['id'] ]); ?>
<?= $this->Form->button('Submit', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>
