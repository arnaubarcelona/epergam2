<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentsLanguage $documentsLanguage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $documentsLanguage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $documentsLanguage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Documents Languages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="documentsLanguages form large-9 medium-8 columns content">
    <?= $this->Form->create($documentsLanguage) ?>
    <fieldset>
        <legend><?= __('Edit Documents Language') ?></legend>
        <?php
            echo $this->Form->control('document_id', ['options' => $documents, 'empty' => true]);
            echo $this->Form->control('language_id', ['options' => $languages, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
