<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubscriptionState $subscriptionState
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Subscription States'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subscriptionStates form large-9 medium-8 columns content">
    <?= $this->Form->create($subscriptionState, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Subscription State') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('photo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
