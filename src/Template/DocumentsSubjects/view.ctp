<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentsSubject $documentsSubject
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Documents Subject'), ['action' => 'edit', $documentsSubject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Documents Subject'), ['action' => 'delete', $documentsSubject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentsSubject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Documents Subjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Documents Subject'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="documentsSubjects view large-9 medium-8 columns content">
    <h3><?= h($documentsSubject->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Document') ?></th>
            <td><?= $documentsSubject->has('document') ? $this->Html->link($documentsSubject->document->name, ['controller' => 'Documents', 'action' => 'view', $documentsSubject->document->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= $documentsSubject->has('subject') ? $this->Html->link($documentsSubject->subject->name, ['controller' => 'Subjects', 'action' => 'view', $documentsSubject->subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($documentsSubject->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($documentsSubject->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($documentsSubject->modified) ?></td>
        </tr>
    </table>
</div>
