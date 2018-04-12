<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Format $format
 */
?>
<div class="noudiv">
    <?= $this->Form->create($format, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Format') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('photo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
