<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubscriptionState[]|\Cake\Collection\CollectionInterface $subscriptionStates
 */
?>
<div class="noudiv">
    <h3><?= __('Subscription States') ?></h3>
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
            <?php foreach ($subscriptionStates as $subscriptionState): ?>
            <tr>
                <td><?= $this->Number->format($subscriptionState->id) ?></td>
                <td><?= h($subscriptionState->name) ?></td>
                <td><?= h($subscriptionState->created) ?></td>
                <td><?= h($subscriptionState->modified) ?></td>
                <td><?= h($subscriptionState->photo) ?></td>
                <td><?= h($subscriptionState->photo_dir) ?></td>
                <td><?= $this->Number->format($subscriptionState->photo_size) ?></td>
                <td><?= h($subscriptionState->photo_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subscriptionState->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subscriptionState->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subscriptionState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscriptionState->id)]) ?>
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
