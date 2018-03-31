<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PublicationPlace[]|\Cake\Collection\CollectionInterface $publicationPlaces
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Publication Place'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="publicationPlaces index large-9 medium-8 columns content">
    <h3><?= __('Publication Places') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($publicationPlaces as $publicationPlace): ?>
            <tr>
                <td><?= $this->Number->format($publicationPlace->id) ?></td>
                <td><?= h($publicationPlace->name) ?></td>
                <td><?= $publicationPlace->has('country') ? $this->Html->link($publicationPlace->country->name, ['controller' => 'Countries', 'action' => 'view', $publicationPlace->country->id]) : '' ?></td>
                <td><?= h($publicationPlace->created) ?></td>
                <td><?= h($publicationPlace->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $publicationPlace->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $publicationPlace->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $publicationPlace->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publicationPlace->id)]) ?>
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
