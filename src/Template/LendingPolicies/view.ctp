<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LendingPolicy $lendingPolicy
 */
?>
<div class="noudiv">
    <h3><?= h($lendingPolicy->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lendingPolicy->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lending Max Days') ?></th>
            <td><?= $this->Number->format($lendingPolicy->lending_max_days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lending Max Items') ?></th>
            <td><?= $this->Number->format($lendingPolicy->lending_max_items) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($lendingPolicy->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($lendingPolicy->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Groups') ?></h4>
        <?php if (!empty($lendingPolicy->groups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Photo Size') ?></th>
                <th scope="col"><?= __('Photo Type') ?></th>
                <th scope="col"><?= __('Lending Policy Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($lendingPolicy->groups as $groups): ?>
            <tr>
                <td><?= h($groups->id) ?></td>
                <td><?= h($groups->name) ?></td>
                <td><?= h($groups->photo) ?></td>
                <td><?= h($groups->photo_dir) ?></td>
                <td><?= h($groups->photo_size) ?></td>
                <td><?= h($groups->photo_type) ?></td>
                <td><?= h($groups->lending_policy_id) ?></td>
                <td><?= h($groups->created) ?></td>
                <td><?= h($groups->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Groups', 'action' => 'view', $groups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Groups', 'action' => 'edit', $groups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Groups', 'action' => 'delete', $groups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
