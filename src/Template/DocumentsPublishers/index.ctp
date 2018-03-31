<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentsPublisher[]|\Cake\Collection\CollectionInterface $documentsPublishers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Documents Publisher'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Publishers'), ['controller' => 'Publishers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Publisher'), ['controller' => 'Publishers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="documentsPublishers index large-9 medium-8 columns content">
    <h3><?= __('Documents Publishers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('document_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('publisher_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documentsPublishers as $documentsPublisher): ?>
            <tr>
                <td><?= $this->Number->format($documentsPublisher->id) ?></td>
                <td><?= $documentsPublisher->has('document') ? $this->Html->link($documentsPublisher->document->name, ['controller' => 'Documents', 'action' => 'view', $documentsPublisher->document->id]) : '' ?></td>
                <td><?= $documentsPublisher->has('publisher') ? $this->Html->link($documentsPublisher->publisher->name, ['controller' => 'Publishers', 'action' => 'view', $documentsPublisher->publisher->id]) : '' ?></td>
                <td><?= h($documentsPublisher->created) ?></td>
                <td><?= h($documentsPublisher->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $documentsPublisher->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $documentsPublisher->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $documentsPublisher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentsPublisher->id)]) ?>
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
