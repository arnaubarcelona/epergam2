<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentsPublisher $documentsPublisher
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Documents Publisher'), ['action' => 'edit', $documentsPublisher->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Documents Publisher'), ['action' => 'delete', $documentsPublisher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentsPublisher->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Documents Publishers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Documents Publisher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Publishers'), ['controller' => 'Publishers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Publisher'), ['controller' => 'Publishers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="documentsPublishers view large-9 medium-8 columns content">
    <h3><?= h($documentsPublisher->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Document') ?></th>
            <td><?= $documentsPublisher->has('document') ? $this->Html->link($documentsPublisher->document->name, ['controller' => 'Documents', 'action' => 'view', $documentsPublisher->document->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publisher') ?></th>
            <td><?= $documentsPublisher->has('publisher') ? $this->Html->link($documentsPublisher->publisher->name, ['controller' => 'Publishers', 'action' => 'view', $documentsPublisher->publisher->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($documentsPublisher->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($documentsPublisher->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($documentsPublisher->modified) ?></td>
        </tr>
    </table>
</div>
