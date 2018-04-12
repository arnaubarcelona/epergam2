<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending $lending
 */
?>
<div class="noudiv">
    <?= $this->Form->create($lending) ?>
    <fieldset>
        <legend><?= __('Edit Lending') ?></legend>
        <?php
            echo $this->Form->control('document_id', ['options' => $documents, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('set_lending_user_id');
            echo $this->Form->control('set_return_user_id');
            echo $this->Form->control('date_taken', ['empty' => true]);
            echo $this->Form->control('date_return', ['empty' => true]);
            echo $this->Form->control('date_real_return', ['empty' => true]);
            echo $this->Form->control('lending_state_id', ['options' => $lendingStates, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
