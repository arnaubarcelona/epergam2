<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending $lending
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
    <fieldset>
        <legend><?= __('Add Lending') ?></legend>
        <?php
            echo $this->Form->control('user_id', [
                'type' => 'select',
                'class' => 'single_autocomplete',
                'options' => $users,
                'emtpy' => false
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
