<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubscriptionState $subscriptionState
 */
?>
<div class="noudiv">
    <?= $this->Form->create($subscriptionState, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Subscription State') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('photo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
