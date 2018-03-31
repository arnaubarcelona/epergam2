<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthorType $authorType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Author Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Authorities'), ['controller' => 'Authorities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Authority'), ['controller' => 'Authorities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="authorTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($authorType) ?>
    <fieldset>
        <legend><?= __('Add Author Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('photo');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo_size');
            echo $this->Form->control('photo_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
