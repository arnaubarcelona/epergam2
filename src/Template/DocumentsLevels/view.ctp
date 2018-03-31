<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentsLevel $documentsLevel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Documents Level'), ['action' => 'edit', $documentsLevel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Documents Level'), ['action' => 'delete', $documentsLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentsLevel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Documents Levels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Documents Level'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="documentsLevels view large-9 medium-8 columns content">
    <h3><?= h($documentsLevel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Document') ?></th>
            <td><?= $documentsLevel->has('document') ? $this->Html->link($documentsLevel->document->name, ['controller' => 'Documents', 'action' => 'view', $documentsLevel->document->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $documentsLevel->has('level') ? $this->Html->link($documentsLevel->level->name, ['controller' => 'Levels', 'action' => 'view', $documentsLevel->level->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($documentsLevel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($documentsLevel->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($documentsLevel->modified) ?></td>
        </tr>
    </table>
</div>
