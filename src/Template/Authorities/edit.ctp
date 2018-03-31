<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Authority $authority
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $authority->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $authority->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Authorities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Author Types'), ['controller' => 'AuthorTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Author Type'), ['controller' => 'AuthorTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="authorities form large-9 medium-8 columns content">
    <?= $this->Form->create($authority) ?>
    <fieldset>
        <legend><?= __('Edit Authority') ?></legend>
        <?php
            echo $this->Form->control('author_id', ['options' => $authors, 'empty' => true]);
            echo $this->Form->control('author_type_id', ['options' => $authorTypes, 'empty' => true]);
            echo $this->Form->control('documents._ids', ['options' => $documents]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
