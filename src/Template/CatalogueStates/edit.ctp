<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CatalogueState $catalogueState
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $catalogueState->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $catalogueState->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Catalogue States'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catalogueStates form large-9 medium-8 columns content">
    <?= $this->Form->create($catalogueState, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Catalogue State') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->input('photo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
