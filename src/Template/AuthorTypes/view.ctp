<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthorType $authorType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Author Type'), ['action' => 'edit', $authorType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Author Type'), ['action' => 'delete', $authorType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authorType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Author Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Author Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Authorities'), ['controller' => 'Authorities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Authority'), ['controller' => 'Authorities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="authorTypes view large-9 medium-8 columns content">
    <h3><?= h($authorType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($authorType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($authorType->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($authorType->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Type') ?></th>
            <td><?= h($authorType->photo_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($authorType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Size') ?></th>
            <td><?= $this->Number->format($authorType->photo_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($authorType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($authorType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Authorities') ?></h4>
        <?php if (!empty($authorType->authorities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Author Id') ?></th>
                <th scope="col"><?= __('Author Type Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($authorType->authorities as $authorities): ?>
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
</div>
