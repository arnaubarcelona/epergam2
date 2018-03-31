<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cdus'), ['controller' => 'Cdus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cdus'), ['controller' => 'Cdus', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formats'), ['controller' => 'Formats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Format'), ['controller' => 'Formats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Collections'), ['controller' => 'Collections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Collection'), ['controller' => 'Collections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Publication Places'), ['controller' => 'PublicationPlaces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Publication Place'), ['controller' => 'PublicationPlaces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Catalogue States'), ['controller' => 'CatalogueStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Catalogue State'), ['controller' => 'CatalogueStates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Conservation States'), ['controller' => 'ConservationStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conservation State'), ['controller' => 'ConservationStates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lendings'), ['controller' => 'Lendings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lending'), ['controller' => 'Lendings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Authorities'), ['controller' => 'Authorities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Authority'), ['controller' => 'Authorities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Publishers'), ['controller' => 'Publishers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Publisher'), ['controller' => 'Publishers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="documents form large-9 medium-8 columns content">
    <?= $this->Form->create($document) ?>
    <fieldset>
        <legend><?= __('Add Document') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('isbn');
            echo $this->Form->control('authority_ids', [
                'type' => 'select',
                'multiple' => true,
                'class' => 'multiple_autocomplete',
                'options' => $formattedAuthorities
            ]);
            echo $this->Form->control('cdu_id', [
                'type' => 'select',
                'class' => 'single_autocomplete',
                'options' => $formattedCdus
            ]);
            echo $this->Form->control('format_id', ['options' => $formats, 'empty' => true]);
            echo $this->Form->control('collection_id', ['options' => $collections, 'empty' => true]);
            echo $this->Form->control('collection_item');
            echo $this->Form->control('publication_place_id', ['options' => $publicationPlaces, 'empty' => true]);
            echo $this->Form->control('edition_date');
            echo $this->Form->control('photo');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo_size');
            echo $this->Form->control('photo_type');
            echo $this->Form->control('abstract');
            echo $this->Form->control('notes');
            echo $this->Form->control('url');
            echo $this->Form->control('height');
            echo $this->Form->control('width');
            echo $this->Form->control('volume');
            echo $this->Form->control('pagecount');
            echo $this->Form->control('length');
            echo $this->Form->control('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->control('catalogue_state_id', ['options' => $catalogueStates, 'empty' => true]);
            echo $this->Form->control('conservation_state_id', ['options' => $conservationStates, 'empty' => true]);
            echo $this->Form->control('languages._ids', ['options' => $languages]);
            echo $this->Form->control('levels._ids', ['options' => $levels]);
            echo $this->Form->control('publishers._ids', ['options' => $publishers]);
            echo $this->Form->control('subjects._ids', [
                'multiple' => true,
                'type' => 'select',
                'class' => 'multi_subject_documents',
                'options' => $subjects
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
