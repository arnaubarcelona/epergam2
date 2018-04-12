<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author $author
 */
?>

<div class="noudiv">
    <?= $this->Form->create($author, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Author') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->input('photo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
