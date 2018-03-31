<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LendingPolicy $lendingPolicy
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lendingPolicy->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lendingPolicy->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lending Policies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lendingPolicies form large-9 medium-8 columns content">
    <?= $this->Form->create($lendingPolicy) ?>
    <fieldset>
        <legend><?= __('Edit Lending Policy') ?></legend>
        <?php
            echo $this->Form->control('lending_max_days');
            echo $this->Form->control('lending_max_items');
            echo $this->Form->control('groups._ids', ['options' => $groups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
