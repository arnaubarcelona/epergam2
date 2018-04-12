<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Authority $authority
 */
?>

<div class="authorities form large-9 medium-8 columns content">
    <?= $this->Form->create($authority) ?>
    <fieldset>
        <legend><?= __('Edit Authority') ?></legend>
        <?php
			echo $this->Form->control('author_id', [
                'type' => 'select',
                'class' => 'single_autocomplete',
                'options' => $authors,
                'empty' => false
            ]);
            echo $this->Form->control('author_type_id', [
                'type' => 'select',
                'class' => 'single_autocomplete',
                'options' => $authorTypes,
                'empty' => false
            ]);
            echo $this->Form->control('documents._ids', [
                'type' => 'select',
                'multiple' => true,
                'class' => 'multiple_autocomplete',
                'options' => $documents,
                'empty' => false
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
