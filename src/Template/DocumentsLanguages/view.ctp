<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentsLanguage $documentsLanguage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Documents Language'), ['action' => 'edit', $documentsLanguage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Documents Language'), ['action' => 'delete', $documentsLanguage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentsLanguage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Documents Languages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Documents Language'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="documentsLanguages view large-9 medium-8 columns content">
    <h3><?= h($documentsLanguage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Document') ?></th>
            <td><?= $documentsLanguage->has('document') ? $this->Html->link($documentsLanguage->document->name, ['controller' => 'Documents', 'action' => 'view', $documentsLanguage->document->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= $documentsLanguage->has('language') ? $this->Html->link($documentsLanguage->language->name, ['controller' => 'Languages', 'action' => 'view', $documentsLanguage->language->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($documentsLanguage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($documentsLanguage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($documentsLanguage->modified) ?></td>
        </tr>
    </table>
</div>
