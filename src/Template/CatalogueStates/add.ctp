<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CatalogueState $catalogueState
 */
?>
<div class="noudiv">
    <?= $this->Form->create($catalogueState, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Catalogue State') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('photo',  ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
