<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending[]|\Cake\Collection\CollectionInterface $lendings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lending'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lending States'), ['controller' => 'LendingStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lending State'), ['controller' => 'LendingStates', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lendings index large-9 medium-8 columns content">
    <h3><?= __('Lendings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('document_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('set_lending_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('set_return_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_taken') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_return') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_real_return') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lending_state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lendings as $lending): ?>
            <tr>
                <td><?= $this->Number->format($lending->id) ?></td>
                <td><?= $lending->has('document') ? $this->Html->link($lending->document->name, ['controller' => 'Documents', 'action' => 'view', $lending->document->id]) : '' ?></td>
                <td><?= $lending->has('user') ? $this->Html->link($lending->user->name, ['controller' => 'Users', 'action' => 'view', $lending->user->id]) : '' ?></td>
                <td><?= $this->Number->format($lending->set_lending_user_id) ?></td>
                <td><?= $this->Number->format($lending->set_return_user_id) ?></td>
                <td><?= h($lending->date_taken) ?></td>
                <td><?= h($lending->date_return) ?></td>
                <td><?= h($lending->date_real_return) ?></td>
                <td><?= $lending->has('lending_state') ? $this->Html->link($lending->lending_state->name, ['controller' => 'LendingStates', 'action' => 'view', $lending->lending_state->id]) : '' ?></td>
                <td><?= h($lending->created) ?></td>
                <td><?= h($lending->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lending->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lending->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lending->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lending->id)]) ?>
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
