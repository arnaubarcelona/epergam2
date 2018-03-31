<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthoritiesDocument $authoritiesDocument
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $authoritiesDocument->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $authoritiesDocument->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Authorities Documents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Authorities'), ['controller' => 'Authorities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Authority'), ['controller' => 'Authorities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="authoritiesDocuments form large-9 medium-8 columns content">
    <?= $this->Form->create($authoritiesDocument) ?>
    <fieldset>
        <legend><?= __('Edit Authorities Document') ?></legend>
        <?php
            echo $this->Form->control('authority_id', ['options' => $authorities, 'empty' => true]);
            echo $this->Form->control('document_id', ['options' => $documents, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
