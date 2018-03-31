<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cdus $cdus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cdus'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cdus form large-9 medium-8 columns content">
    <?= $this->Form->create($cdus) ?>
    <fieldset>
        <legend><?= __('Add Cdus') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('photo');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo_size');
            echo $this->Form->control('photo_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
