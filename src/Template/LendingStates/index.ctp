<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LendingState[]|\Cake\Collection\CollectionInterface $lendingStates
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lending State'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lendings'), ['controller' => 'Lendings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lending'), ['controller' => 'Lendings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lendingStates index large-9 medium-8 columns content">
    <h3><?= __('Lending States') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lendingStates as $lendingState): ?>
            <tr>
                <td><?= $this->Number->format($lendingState->id) ?></td>
                <td><?= h($lendingState->name) ?></td>
                <td><?= h($lendingState->created) ?></td>
                <td><?= h($lendingState->modified) ?></td>
                <td><?= h($lendingState->photo) ?></td>
                <td><?= h($lendingState->photo_dir) ?></td>
                <td><?= $this->Number->format($lendingState->photo_size) ?></td>
                <td><?= h($lendingState->photo_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lendingState->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lendingState->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lendingState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lendingState->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
