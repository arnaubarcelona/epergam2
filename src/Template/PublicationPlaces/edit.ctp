<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PublicationPlace $publicationPlace
 */
?>
<div class="noudiv">
    <?= $this->Form->create($publicationPlace) ?>
    <fieldset>
        <legend><?= __('Edit Publication Place') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('country_id', ['options' => $countries, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
