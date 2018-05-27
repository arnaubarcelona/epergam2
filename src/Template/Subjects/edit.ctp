<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 */
?>
<div class="noudiv">
    <?= $this->Form->create($subject, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Subject') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
