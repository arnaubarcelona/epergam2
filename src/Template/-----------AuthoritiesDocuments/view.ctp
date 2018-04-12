<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthoritiesDocument $authoritiesDocument
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Authorities Document'), ['action' => 'edit', $authoritiesDocument->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Authorities Document'), ['action' => 'delete', $authoritiesDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authoritiesDocument->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Authorities Documents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Authorities Document'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Authorities'), ['controller' => 'Authorities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Authority'), ['controller' => 'Authorities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="authoritiesDocuments view large-9 medium-8 columns content">
    <h3><?= h($authoritiesDocument->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Authority') ?></th>
            <td><?= $authoritiesDocument->has('authority') ? $this->Html->link($authoritiesDocument->authority->id, ['controller' => 'Authorities', 'action' => 'view', $authoritiesDocument->authority->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Document') ?></th>
            <td><?= $authoritiesDocument->has('document') ? $this->Html->link($authoritiesDocument->document->name, ['controller' => 'Documents', 'action' => 'view', $authoritiesDocument->document->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($authoritiesDocument->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($authoritiesDocument->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($authoritiesDocument->modified) ?></td>
        </tr>
    </table>
</div>
