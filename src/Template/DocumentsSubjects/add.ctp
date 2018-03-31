<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentsSubject $documentsSubject
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Documents Subjects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="documentsSubjects form large-9 medium-8 columns content">
    <?= $this->Form->create($documentsSubject) ?>
    <fieldset>
        <legend><?= __('Add Documents Subject') ?></legend>
        <?php
            echo $this->Form->control('document_id', ['options' => $documents, 'empty' => true]);
            echo $this->Form->control('subject_id', ['options' => $subjects, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
