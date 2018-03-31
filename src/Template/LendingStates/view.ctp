<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LendingState $lendingState
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lending State'), ['action' => 'edit', $lendingState->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lending State'), ['action' => 'delete', $lendingState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lendingState->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lending States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lending State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lendings'), ['controller' => 'Lendings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lending'), ['controller' => 'Lendings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lendingStates view large-9 medium-8 columns content">
    <h3><?= h($lendingState->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($lendingState->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($lendingState->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($lendingState->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Type') ?></th>
            <td><?= h($lendingState->photo_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lendingState->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Size') ?></th>
            <td><?= $this->Number->format($lendingState->photo_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($lendingState->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($lendingState->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Lendings') ?></h4>
        <?php if (!empty($lendingState->lendings)): ?>
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
            <?php foreach ($lendingState->lendings as $lendings): ?>
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
