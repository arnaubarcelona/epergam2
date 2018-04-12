<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
?>

<div class="noudiv">
    <?= $this->Form->create($document, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Document') ?></legend>
        <?php
            echo $this->Form->control('name', ['empty' => false]);
            echo $this->Form->control('isbn');
            echo $this->Form->control('authority_ids', [
				'label' => 'Autoria',
                'type' => 'select',
                'multiple' => true,
                'class' => 'multiple_autocomplete',
                'options' => $formattedAuthorities,
                'empty' => false
            ]);
            ?><br><?php
            echo $this->Form->control('cdu_id', [
				'label' => 'CDU',
                'type' => 'select',
                'class' => 'single_autocomplete',
                'options' => $formattedCdus,
                'empty' => false
            ]);
            ?><br><?php
            echo $this->Form->control('collection_id', [
                'type' => 'select',
                'class' => 'add_collection',
                'options' => $collections,
                'empty' => true
            ]);
            ?><br><?php
            echo $this->Form->control('collection_item');
            echo $this->Form->control('publication_place_id', [
                'type' => 'select',
                'class' => 'add_publicationPlace',
                'options' => $publicationPlaces,
                'empty' => true
            ]);
            ?><br><?php
            echo $this->Form->control('edition_date');
            echo $this->Form->input('photo', ['type' => 'file']);
            echo $this->Form->control('abstract');
            echo $this->Form->control('notes');
            echo $this->Form->control('url');
            echo $this->Form->control('height');
            echo $this->Form->control('width');
            echo $this->Form->control('volume', ['label' => 'Volum']);
            echo $this->Form->control('pagecount');
            echo $this->Form->control('length', ['label' => 'Duració']);
            echo $this->Form->control('location_id', [
                'type' => 'select',
                'class' => 'add_location',
                'options' => $locations,
                'empty' => false
            ]);?><br><?php
            echo $this->Form->control('catalogue_state_id', [
                'type' => 'select',
                'class' => 'single_autocomplete',
                'options' => $catalogueStates,
                'empty' => false
            ]);?><br><?php
            echo $this->Form->control('conservation_state_id', [
                'type' => 'select',
                'class' => 'single_autocomplete',
                'options' => $conservationStates,
                'empty' => false
            ]);?><br><?php
            echo $this->Form->control('languages._ids', [
                'type' => 'select',
                'multiple' => true,
                'class' => 'check_languages',
                'options' => $languages,
                'empty' => false
            ]);?><br><?php
            echo $this->Form->control('levels._ids', ['options' => $levels, 'multiple' => 'checkbox', 'empty' => false]);
            echo $this->Form->control('publishers._ids', [
                'type' => 'select',
                'multiple' => true,
                'class' => 'check_publishers',
                'options' => $publishers,
                'empty' => false
            ]);?><br><?php
            echo $this->Form->control('subjects._ids', [
                'multiple' => true,
                'type' => 'select',
                'class' => 'multi_subject_documents',
                'options' => $subjects,
                'empty' => false
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
