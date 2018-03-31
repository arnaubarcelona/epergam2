<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PublicationPlace $publicationPlace
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Publication Places'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="publicationPlaces form large-9 medium-8 columns content">
    <?= $this->Form->create($publicationPlace) ?>
    <fieldset>
        <legend><?= __('Add Publication Place') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('country_id', ['options' => $countries, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
