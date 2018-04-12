<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConservationState[]|\Cake\Collection\CollectionInterface $conservationStates
 */
?>
<div class="noudiv">
    <h3><?= __('Conservation States') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conservationStates as $conservationState): ?>
            <tr>
                <td><?= $this->Number->format($conservationState->id) ?></td>
                <td><?= h($conservationState->name) ?></td>
                <td><?= h($conservationState->created) ?></td>
                <td><?= h($conservationState->modified) ?></td>
                <td><?= h($conservationState->photo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $conservationState->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conservationState->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conservationState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conservationState->id)]) ?>
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
