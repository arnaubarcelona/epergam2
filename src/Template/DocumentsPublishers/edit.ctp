<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentsPublisher $documentsPublisher
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $documentsPublisher->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $documentsPublisher->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Documents Publishers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Publishers'), ['controller' => 'Publishers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Publisher'), ['controller' => 'Publishers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="documentsPublishers form large-9 medium-8 columns content">
    <?= $this->Form->create($documentsPublisher) ?>
    <fieldset>
        <legend><?= __('Edit Documents Publisher') ?></legend>
        <?php
            echo $this->Form->control('document_id', ['options' => $documents, 'empty' => true]);
            echo $this->Form->control('publisher_id', ['options' => $publishers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
