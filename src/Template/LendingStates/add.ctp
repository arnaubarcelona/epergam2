<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LendingState $lendingState
 */
?>
<div class="noudiv">
    <?= $this->Form->create($lendingState, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Lending State') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('photo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
