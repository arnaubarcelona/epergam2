<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthorType $authorType
 */
?>
<div class="noudiv">
    <?= $this->Form->create($authorType, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Author Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('photo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
