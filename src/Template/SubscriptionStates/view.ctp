<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubscriptionState $subscriptionState
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subscription State'), ['action' => 'edit', $subscriptionState->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subscription State'), ['action' => 'delete', $subscriptionState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscriptionState->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subscription States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subscription State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subscriptionStates view large-9 medium-8 columns content">
    <h3><?= h($subscriptionState->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($subscriptionState->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($subscriptionState->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($subscriptionState->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Type') ?></th>
            <td><?= h($subscriptionState->photo_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subscriptionState->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Size') ?></th>
            <td><?= $this->Number->format($subscriptionState->photo_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($subscriptionState->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($subscriptionState->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($subscriptionState->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Mail1') ?></th>
                <th scope="col"><?= __('Mail2') ?></th>
                <th scope="col"><?= __('Phone1') ?></th>
                <th scope="col"><?= __('Phone2') ?></th>
                <th scope="col"><?= __('Birth Date') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Subscription State Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subscriptionState->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->mail1) ?></td>
                <td><?= h($users->mail2) ?></td>
                <td><?= h($users->phone1) ?></td>
                <td><?= h($users->phone2) ?></td>
                <td><?= h($users->birth_date) ?></td>
                <td><?= h($users->group_id) ?></td>
                <td><?= h($users->subscription_state_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
