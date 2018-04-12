<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CatalogueState[]|\Cake\Collection\CollectionInterface $catalogueStates
 */
?>
<div class="noudiv">
    <h3><?= __('Catalogue States') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catalogueStates as $catalogueState): ?>
            <tr>
                <td><?= $this->Number->format($catalogueState->id) ?></td>
                <td><?= h($catalogueState->name) ?></td>
                <td><?= h($catalogueState->created) ?></td>
                <td><?= h($catalogueState->modified) ?></td>
                <td><?= h($catalogueState->photo) ?></td>
                <td><?= h($catalogueState->photo_dir) ?></td>
                <td><?= $this->Number->format($catalogueState->photo_size) ?></td>
                <td><?= h($catalogueState->photo_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $catalogueState->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $catalogueState->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $catalogueState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catalogueState->id)]) ?>
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
