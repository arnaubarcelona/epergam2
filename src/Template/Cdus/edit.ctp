<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cdus $cdus
 */
?>
<div class="noudiv">
    <?= $this->Form->create($cdus, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Cdus') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('photo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
