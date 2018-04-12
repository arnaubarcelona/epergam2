<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LendingPolicy $lendingPolicy
 */
?>
<div class="noudiv">
    <?= $this->Form->create($lendingPolicy) ?>
    <fieldset>
        <legend><?= __('Add Lending Policy') ?></legend>
        <?php
            echo $this->Form->control('lending_max_days');
            echo $this->Form->control('lending_max_items');
            echo $this->Form->control('groups._ids', ['options' => $groups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
