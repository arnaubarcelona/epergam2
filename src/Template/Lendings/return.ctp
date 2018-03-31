<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending $lending
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lending->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lending->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lendings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lending States'), ['controller' => 'LendingStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lending State'), ['controller' => 'LendingStates', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lendings form large-9 medium-8 columns content">
    <?= $this->Form->create($lending) ?>
    <center><?= $this->Form->button(__('Retorna')) ?>
    <?= $this->Form->end() ?>
</div>
