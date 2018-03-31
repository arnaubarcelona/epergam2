<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthorType[]|\Cake\Collection\CollectionInterface $authorTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Author Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Authorities'), ['controller' => 'Authorities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Authority'), ['controller' => 'Authorities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="authorTypes index large-9 medium-8 columns content">
    <h3><?= __('Author Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_type') ?></th>
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
                <td><?= h($authorType->photo_dir) ?></td>
                <td><?= $this->Number->format($authorType->photo_size) ?></td>
                <td><?= h($authorType->photo_type) ?></td>
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
