<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LendingPolicy[]|\Cake\Collection\CollectionInterface $lendingPolicies
 */
?>
<div class="noudiv">
    <h3><?= __('Lending Policies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lending_max_days') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lending_max_items') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lendingPolicies as $lendingPolicy): ?>
            <tr>
                <td><?= $this->Number->format($lendingPolicy->id) ?></td>
                <td><?= $this->Number->format($lendingPolicy->lending_max_days) ?></td>
                <td><?= $this->Number->format($lendingPolicy->lending_max_items) ?></td>
                <td><?= h($lendingPolicy->created) ?></td>
                <td><?= h($lendingPolicy->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lendingPolicy->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lendingPolicy->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lendingPolicy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lendingPolicy->id)]) ?>
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
