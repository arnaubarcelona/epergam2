<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<div class="noudiv">
    <h3><?= h($country->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($country->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($country->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($country->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($country->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($country->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Publication Places') ?></h4>
        <?php if (!empty($country->publication_places)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($country->publication_places as $publicationPlaces): ?>
            <tr>
                <td><?= h($publicationPlaces->id) ?></td>
                <td><?= h($publicationPlaces->name) ?></td>
                <td><?= h($publicationPlaces->country_id) ?></td>
                <td><?= h($publicationPlaces->created) ?></td>
                <td><?= h($publicationPlaces->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PublicationPlaces', 'action' => 'view', $publicationPlaces->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PublicationPlaces', 'action' => 'edit', $publicationPlaces->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PublicationPlaces', 'action' => 'delete', $publicationPlaces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publicationPlaces->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
