<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentsLanguage[]|\Cake\Collection\CollectionInterface $documentsLanguages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Documents Language'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="documentsLanguages index large-9 medium-8 columns content">
    <h3><?= __('Documents Languages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('document_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('language_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documentsLanguages as $documentsLanguage): ?>
            <tr>
                <td><?= $this->Number->format($documentsLanguage->id) ?></td>
                <td><?= $documentsLanguage->has('document') ? $this->Html->link($documentsLanguage->document->name, ['controller' => 'Documents', 'action' => 'view', $documentsLanguage->document->id]) : '' ?></td>
                <td><?= $documentsLanguage->has('language') ? $this->Html->link($documentsLanguage->language->name, ['controller' => 'Languages', 'action' => 'view', $documentsLanguage->language->id]) : '' ?></td>
                <td><?= h($documentsLanguage->created) ?></td>
                <td><?= h($documentsLanguage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $documentsLanguage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $documentsLanguage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $documentsLanguage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentsLanguage->id)]) ?>
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
