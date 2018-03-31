<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Collection $collection
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Collection'), ['action' => 'edit', $collection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Collection'), ['action' => 'delete', $collection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Collections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collection'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="collections view large-9 medium-8 columns content">
    <h3><?= h($collection->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($collection->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($collection->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($collection->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($collection->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Documents') ?></h4>
        <?php if (!empty($collection->documents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Isbn') ?></th>
                <th scope="col"><?= __('Cdu Id') ?></th>
                <th scope="col"><?= __('Format Id') ?></th>
                <th scope="col"><?= __('Collection Id') ?></th>
                <th scope="col"><?= __('Collection Item') ?></th>
                <th scope="col"><?= __('Publication Place Id') ?></th>
                <th scope="col"><?= __('Edition Date') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Photo Size') ?></th>
                <th scope="col"><?= __('Photo Type') ?></th>
                <th scope="col"><?= __('Abstract') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Height') ?></th>
                <th scope="col"><?= __('Width') ?></th>
                <th scope="col"><?= __('Volume') ?></th>
                <th scope="col"><?= __('Pagecount') ?></th>
                <th scope="col"><?= __('Length') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Catalogue State Id') ?></th>
                <th scope="col"><?= __('Conservation State Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($collection->documents as $documents): ?>
            <tr>
                <td><?= h($documents->id) ?></td>
                <td><?= h($documents->name) ?></td>
                <td><?= h($documents->isbn) ?></td>
                <td><?= h($documents->cdu_id) ?></td>
                <td><?= h($documents->format_id) ?></td>
                <td><?= h($documents->collection_id) ?></td>
                <td><?= h($documents->collection_item) ?></td>
                <td><?= h($documents->publication_place_id) ?></td>
                <td><?= h($documents->edition_date) ?></td>
                <td><?= h($documents->photo) ?></td>
                <td><?= h($documents->photo_dir) ?></td>
                <td><?= h($documents->photo_size) ?></td>
                <td><?= h($documents->photo_type) ?></td>
                <td><?= h($documents->abstract) ?></td>
                <td><?= h($documents->notes) ?></td>
                <td><?= h($documents->url) ?></td>
                <td><?= h($documents->height) ?></td>
                <td><?= h($documents->width) ?></td>
                <td><?= h($documents->volume) ?></td>
                <td><?= h($documents->pagecount) ?></td>
                <td><?= h($documents->length) ?></td>
                <td><?= h($documents->location_id) ?></td>
                <td><?= h($documents->catalogue_state_id) ?></td>
                <td><?= h($documents->conservation_state_id) ?></td>
                <td><?= h($documents->created) ?></td>
                <td><?= h($documents->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Documents', 'action' => 'view', $documents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Documents', 'action' => 'edit', $documents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Documents', 'action' => 'delete', $documents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
