<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document[]|\Cake\Collection\CollectionInterface $documents
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Document'), ['action' => 'add']) ?></li>
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
<div class="documents index large-9 medium-8 columns content">
    <h3><?= __('Documents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isbn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cdu_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('format_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('collection_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('collection_item') ?></th>
                <th scope="col"><?= $this->Paginator->sort('publication_place_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edition_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('width') ?></th>
                <th scope="col"><?= $this->Paginator->sort('volume') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pagecount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('length') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('catalogue_state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conservation_state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documents as $document): ?>
            <tr>
                <td><?= $this->Number->format($document->id) ?></td>
                <td><?= h($document->name) ?></td>
                <td><?= h($document->isbn) ?></td>
                <td><?= $document->has('cdus') ? $this->Html->link($document->cdus->name, ['controller' => 'Cdus', 'action' => 'view', $document->cdus->id]) : '' ?></td>
                <td><?= $document->has('format') ? $this->Html->link($document->format->name, ['controller' => 'Formats', 'action' => 'view', $document->format->id]) : '' ?></td>
                <td><?= $document->has('collection') ? $this->Html->link($document->collection->name, ['controller' => 'Collections', 'action' => 'view', $document->collection->id]) : '' ?></td>
                <td><?= $this->Number->format($document->collection_item) ?></td>
                <td><?= $document->has('publication_place') ? $this->Html->link($document->publication_place->name, ['controller' => 'PublicationPlaces', 'action' => 'view', $document->publication_place->id]) : '' ?></td>
                <td><?= h($document->edition_date) ?></td>
                <td><?= h($document->photo) ?></td>
                <td><?= h($document->photo_dir) ?></td>
                <td><?= $this->Number->format($document->photo_size) ?></td>
                <td><?= h($document->photo_type) ?></td>
                <td><?= h($document->url) ?></td>
                <td><?= $this->Number->format($document->height) ?></td>
                <td><?= $this->Number->format($document->width) ?></td>
                <td><?= $this->Number->format($document->volume) ?></td>
                <td><?= $this->Number->format($document->pagecount) ?></td>
                <td><?= $this->Number->format($document->length) ?></td>
                <td><?= $document->has('location') ? $this->Html->link($document->location->name, ['controller' => 'Locations', 'action' => 'view', $document->location->id]) : '' ?></td>
                <td><?= $document->has('catalogue_state') ? $this->Html->link($document->catalogue_state->name, ['controller' => 'CatalogueStates', 'action' => 'view', $document->catalogue_state->id]) : '' ?></td>
                <td><?= $document->has('conservation_state') ? $this->Html->link($document->conservation_state->name, ['controller' => 'ConservationStates', 'action' => 'view', $document->conservation_state->id]) : '' ?></td>
                <td><?= h($document->created) ?></td>
                <td><?= h($document->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $document->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $document->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $document->id], ['confirm' => __('Are you sure you want to delete # {0}?', $document->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
