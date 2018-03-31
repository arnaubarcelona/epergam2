<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subscription States'), ['controller' => 'SubscriptionStates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subscription State'), ['controller' => 'SubscriptionStates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lendings'), ['controller' => 'Lendings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lending'), ['controller' => 'Lendings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mail1') ?></th>
            <td><?= h($user->mail1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mail2') ?></th>
            <td><?= h($user->mail2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone1') ?></th>
            <td><?= h($user->phone1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone2') ?></th>
            <td><?= h($user->phone2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group') ?></th>
            <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subscription State') ?></th>
            <td><?= $user->has('subscription_state') ? $this->Html->link($user->subscription_state->name, ['controller' => 'SubscriptionStates', 'action' => 'view', $user->subscription_state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($user->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($user->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Type') ?></th>
            <td><?= h($user->photo_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Size') ?></th>
            <td><?= $this->Number->format($user->photo_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birth Date') ?></th>
            <td><?= h($user->birth_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Lendings') ?></h4>
        <?php if (!empty($user->lendings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Document Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Set Lending User Id') ?></th>
                <th scope="col"><?= __('Set Return User Id') ?></th>
                <th scope="col"><?= __('Date Taken') ?></th>
                <th scope="col"><?= __('Date Return') ?></th>
                <th scope="col"><?= __('Date Real Return') ?></th>
                <th scope="col"><?= __('Lending State Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->lendings as $lendings): ?>
            <tr>
                <td><?= h($lendings->id) ?></td>
                <td><?= h($lendings->document_id) ?></td>
                <td><?= h($lendings->user_id) ?></td>
                <td><?= h($lendings->set_lending_user_id) ?></td>
                <td><?= h($lendings->set_return_user_id) ?></td>
                <td><?= h($lendings->date_taken) ?></td>
                <td><?= h($lendings->date_return) ?></td>
                <td><?= h($lendings->date_real_return) ?></td>
                <td><?= h($lendings->lending_state_id) ?></td>
                <td><?= h($lendings->created) ?></td>
                <td><?= h($lendings->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Lendings', 'action' => 'view', $lendings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Lendings', 'action' => 'edit', $lendings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lendings', 'action' => 'delete', $lendings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lendings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
