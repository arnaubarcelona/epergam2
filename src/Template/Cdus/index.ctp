<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cdus[]|\Cake\Collection\CollectionInterface $cdus
 */
?>
<div class="noudiv">
    <h3><?= __('Cdus') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cdus as $cdus): ?>
            <tr>
                <td><?= $this->Number->format($cdus->id) ?></td>
                <td><?= h($cdus->name) ?></td>
                <td><?= h($cdus->description) ?></td>
                <td><?= h($cdus->photo) ?></td>
                <td><?= h($cdus->created) ?></td>
                <td><?= h($cdus->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cdus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cdus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cdus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cdus->id)]) ?>
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
