<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LendingState $lendingState
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lendingState->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lendingState->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lending States'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lendings'), ['controller' => 'Lendings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lending'), ['controller' => 'Lendings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lendingStates form large-9 medium-8 columns content">
    <?= $this->Form->create($lendingState, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Lending State') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('photo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
