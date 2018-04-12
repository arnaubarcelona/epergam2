<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConservationState $conservationState
 */
?>
<div class="noudiv">
    <?= $this->Form->create($conservationState, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Conservation State') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->input('photo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
