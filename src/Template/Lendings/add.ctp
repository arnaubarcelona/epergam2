<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending $lending
 */
?>

<div class="noudiv">
    <?= $this->Form->create($lending) ?>
    <fieldset>
        <legend><?= __('Add Lending') ?></legend>
        <?php
            echo $this->Form->control('user_id', [
                'type' => 'select',
                'class' => 'single_autocomplete',
                'options' => $users,
                'emtpy' => false
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
