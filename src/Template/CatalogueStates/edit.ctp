<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CatalogueState $catalogueState
 */
?>
<div class="noudiv">
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
