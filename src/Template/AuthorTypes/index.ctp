<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthorType[]|\Cake\Collection\CollectionInterface $authorTypes
 */
?>
<div class="noudiv">
    <h3><?= __('Author Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authorTypes as $authorType): ?>
            <tr>
                <td><?= $this->Number->format($authorType->id) ?></td>
                <td><?= h($authorType->name) ?></td>
                <td><?= h($authorType->photo) ?></td>
                <td><?= h($authorType->created) ?></td>
                <td><?= h($authorType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $authorType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $authorType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $authorType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authorType->id)]) ?>
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
