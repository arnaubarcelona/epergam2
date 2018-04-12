<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentsLevel $documentsLevel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Documents Levels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="documentsLevels form large-9 medium-8 columns content">
    <?= $this->Form->create($documentsLevel) ?>
    <fieldset>
        <legend><?= __('Add Documents Level') ?></legend>
        <?php
            echo $this->Form->control('document_id', ['options' => $documents, 'empty' => true]);
            echo $this->Form->control('level_id', ['options' => $levels, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
