<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="noudiv">
	<?php $this->loadHelper('Form', [
        'templates' => 'datacatalana',
    ]);?>
    <?= $this->Form->create($user, ['type' => 'file']); ?>
    
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('name', ['empty' => false]);
            echo $this->Form->control('username', ['label' => 'Nom d\'usuari/a']);
            echo $this->Form->control('password');
            echo $this->Form->control('mail1');
            echo $this->Form->control('mail2');
            echo $this->Form->control('phone1');
            echo $this->Form->control('phone2');
            echo $this->Form->input('birth_date', ['type' => 'date', 'minYear' => 1930, 'maxYear' => date('Y')]);
            echo $this->Form->control('group_id', ['options' => $groups, 'empty' => false]);  
            echo $this->Form->input('photo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
