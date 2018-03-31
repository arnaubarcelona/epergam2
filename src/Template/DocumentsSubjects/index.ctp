<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentsSubject[]|\Cake\Collection\CollectionInterface $documentsSubjects
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Documents Subject'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="documentsSubjects index large-9 medium-8 columns content">
    <h3><?= __('Documents Subjects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('document_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documentsSubjects as $documentsSubject): ?>
            <tr>
                <td><?= $this->Number->format($documentsSubject->id) ?></td>
                <td><?= $documentsSubject->has('document') ? $this->Html->link($documentsSubject->document->name, ['controller' => 'Documents', 'action' => 'view', $documentsSubject->document->id]) : '' ?></td>
                <td><?= $documentsSubject->has('subject') ? $this->Html->link($documentsSubject->subject->name, ['controller' => 'Subjects', 'action' => 'view', $documentsSubject->subject->id]) : '' ?></td>
                <td><?= h($documentsSubject->created) ?></td>
                <td><?= h($documentsSubject->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $documentsSubject->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $documentsSubject->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $documentsSubject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentsSubject->id)]) ?>
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
