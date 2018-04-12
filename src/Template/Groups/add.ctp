<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<div class="groups form large-9 medium-8 columns content">
    <?= $this->Form->create($group, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Group') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('photo', ['type' => 'file']);
            echo $this->Form->control('lending_policy_id');
            echo $this->Form->control('lending_policies._ids', ['options' => $lendingPolicies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
