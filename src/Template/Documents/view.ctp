<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Document'), ['action' => 'edit', $document->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Document'), ['action' => 'delete', $document->id], ['confirm' => __('Are you sure you want to delete # {0}?', $document->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Documents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Document'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cdus'), ['controller' => 'Cdus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cdus'), ['controller' => 'Cdus', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formats'), ['controller' => 'Formats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Format'), ['controller' => 'Formats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Collections'), ['controller' => 'Collections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collection'), ['controller' => 'Collections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Publication Places'), ['controller' => 'PublicationPlaces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Publication Place'), ['controller' => 'PublicationPlaces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Catalogue States'), ['controller' => 'CatalogueStates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Catalogue State'), ['controller' => 'CatalogueStates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Conservation States'), ['controller' => 'ConservationStates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conservation State'), ['controller' => 'ConservationStates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lendings'), ['controller' => 'Lendings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lending'), ['controller' => 'Lendings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Authorities'), ['controller' => 'Authorities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Authority'), ['controller' => 'Authorities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Publishers'), ['controller' => 'Publishers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Publisher'), ['controller' => 'Publishers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="documents view large-9 medium-8 columns content">
    <h3><?= h($document->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($document->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn') ?></th>
            <td><?= h($document->isbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cdus') ?></th>
            <td><?= $document->has('cdus') ? $this->Html->link($document->cdus->name, ['controller' => 'Cdus', 'action' => 'view', $document->cdus->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Format') ?></th>
            <td><?= $document->has('format') ? $this->Html->link($document->format->name, ['controller' => 'Formats', 'action' => 'view', $document->format->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Collection') ?></th>
            <td><?= $document->has('collection') ? $this->Html->link($document->collection->name, ['controller' => 'Collections', 'action' => 'view', $document->collection->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publication Place') ?></th>
            <td><?= $document->has('publication_place') ? $this->Html->link($document->publication_place->name, ['controller' => 'PublicationPlaces', 'action' => 'view', $document->publication_place->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edition Date') ?></th>
            <td><?= h($document->edition_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($document->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($document->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Type') ?></th>
            <td><?= h($document->photo_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($document->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $document->has('location') ? $this->Html->link($document->location->name, ['controller' => 'Locations', 'action' => 'view', $document->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Catalogue State') ?></th>
            <td><?= $document->has('catalogue_state') ? $this->Html->link($document->catalogue_state->name, ['controller' => 'CatalogueStates', 'action' => 'view', $document->catalogue_state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conservation State') ?></th>
            <td><?= $document->has('conservation_state') ? $this->Html->link($document->conservation_state->name, ['controller' => 'ConservationStates', 'action' => 'view', $document->conservation_state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($document->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Collection Item') ?></th>
            <td><?= $this->Number->format($document->collection_item) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Size') ?></th>
            <td><?= $this->Number->format($document->photo_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= $this->Number->format($document->height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Width') ?></th>
            <td><?= $this->Number->format($document->width) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Volume') ?></th>
            <td><?= $this->Number->format($document->volume) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pagecount') ?></th>
            <td><?= $this->Number->format($document->pagecount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Length') ?></th>
            <td><?= $this->Number->format($document->length) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($document->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($document->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Abstract') ?></h4>
        <?= $this->Text->autoParagraph(h($document->abstract)); ?>
    </div>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($document->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Authorities') ?></h4>
        <?php if (!empty($document->authorities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Author Id') ?></th>
                <th scope="col"><?= __('Author Type Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($document->authorities as $authorities): ?>
            <tr>
                <td><?= h($authorities->id) ?></td>
                <td><?= h($authorities->author_id) ?></td>
                <td><?= h($authorities->author_type_id) ?></td>
                <td><?= h($authorities->created) ?></td>
                <td><?= h($authorities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Authorities', 'action' => 'view', $authorities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Authorities', 'action' => 'edit', $authorities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Authorities', 'action' => 'delete', $authorities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authorities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Languages') ?></h4>
        <?php if (!empty($document->languages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Photo Size') ?></th>
                <th scope="col"><?= __('Photo Type') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($document->languages as $languages): ?>
            <tr>
                <td><?= h($languages->id) ?></td>
                <td><?= h($languages->name) ?></td>
                <td><?= h($languages->photo) ?></td>
                <td><?= h($languages->photo_dir) ?></td>
                <td><?= h($languages->photo_size) ?></td>
                <td><?= h($languages->photo_type) ?></td>
                <td><?= h($languages->created) ?></td>
                <td><?= h($languages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Languages', 'action' => 'view', $languages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Languages', 'action' => 'edit', $languages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Languages', 'action' => 'delete', $languages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $languages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Levels') ?></h4>
        <?php if (!empty($document->levels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Photo Size') ?></th>
                <th scope="col"><?= __('Photo Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($document->levels as $levels): ?>
            <tr>
                <td><?= h($levels->id) ?></td>
                <td><?= h($levels->name) ?></td>
                <td><?= h($levels->created) ?></td>
                <td><?= h($levels->modified) ?></td>
                <td><?= h($levels->photo) ?></td>
                <td><?= h($levels->photo_dir) ?></td>
                <td><?= h($levels->photo_size) ?></td>
                <td><?= h($levels->photo_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Levels', 'action' => 'view', $levels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Levels', 'action' => 'edit', $levels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Levels', 'action' => 'delete', $levels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $levels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Publishers') ?></h4>
        <?php if (!empty($document->publishers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($document->publishers as $publishers): ?>
            <tr>
                <td><?= h($publishers->id) ?></td>
                <td><?= h($publishers->name) ?></td>
                <td><?= h($publishers->created) ?></td>
                <td><?= h($publishers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Publishers', 'action' => 'view', $publishers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Publishers', 'action' => 'edit', $publishers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Publishers', 'action' => 'delete', $publishers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publishers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Subjects') ?></h4>
        <?php if (!empty($document->subjects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($document->subjects as $subjects): ?>
            <tr>
                <td><?= h($subjects->id) ?></td>
                <td><?= h($subjects->name) ?></td>
                <td><?= h($subjects->created) ?></td>
                <td><?= h($subjects->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Subjects', 'action' => 'view', $subjects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Subjects', 'action' => 'edit', $subjects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Subjects', 'action' => 'delete', $subjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subjects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Lendings') ?></h4>
        <?php if (!empty($document->lendings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Document Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Set Lending User Id') ?></th>
                <th scope="col"><?= __('Set Return User Id') ?></th>
                <th scope="col"><?= __('Date Taken') ?></th>
                <th scope="col"><?= __('Date Return') ?></th>
                <th scope="col"><?= __('Date Real Return') ?></th>
                <th scope="col"><?= __('Lending State Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($document->lendings as $lendings): ?>
            <tr>
                <td><?= h($lendings->id) ?></td>
                <td><?= h($lendings->document_id) ?></td>
                <td><?= h($lendings->user_id) ?></td>
                <td><?= h($lendings->set_lending_user_id) ?></td>
                <td><?= h($lendings->set_return_user_id) ?></td>
                <td><?= h($lendings->date_taken) ?></td>
                <td><?= h($lendings->date_return) ?></td>
                <td><?= h($lendings->date_real_return) ?></td>
                <td><?= h($lendings->lending_state_id) ?></td>
                <td><?= h($lendings->created) ?></td>
                <td><?= h($lendings->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Lendings', 'action' => 'view', $lendings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Lendings', 'action' => 'edit', $lendings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lendings', 'action' => 'delete', $lendings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lendings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
