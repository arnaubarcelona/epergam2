<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publisher $publisher
 */
?>
<div class="noudiv">
    <?= $this->Form->create($publisher, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Publisher') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('photo', ['type' => 'file']);
            echo $this->Form->control('documents._ids', ['options' => $documents]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
