<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<div class="noudiv">
    <h3><?= h($group->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($group->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($group->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($group->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lending Policy Id') ?></th>
            <td><?= $this->Number->format($group->lending_policy_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($group->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($group->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Lending Policies') ?></h4>
        <?php if (!empty($group->lending_policies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Lending Max Days') ?></th>
                <th scope="col"><?= __('Lending Max Items') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->lending_policies as $lendingPolicies): ?>
            <tr>
                <td><?= h($lendingPolicies->id) ?></td>
                <td><?= h($lendingPolicies->lending_max_days) ?></td>
                <td><?= h($lendingPolicies->lending_max_items) ?></td>
                <td><?= h($lendingPolicies->created) ?></td>
                <td><?= h($lendingPolicies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LendingPolicies', 'action' => 'view', $lendingPolicies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LendingPolicies', 'action' => 'edit', $lendingPolicies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LendingPolicies', 'action' => 'delete', $lendingPolicies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lendingPolicies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Documents') ?></h4>
        <?php if (!empty($group->documents)): ?>
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
                <th scope="col"><?= __('Lending State Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->documents as $documents): ?>
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
                <td><?= h($documents->lending_state_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($group->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Mail1') ?></th>
                <th scope="col"><?= __('Mail2') ?></th>
                <th scope="col"><?= __('Phone1') ?></th>
                <th scope="col"><?= __('Phone2') ?></th>
                <th scope="col"><?= __('Birth Date') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Subscription State Id') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Photo Size') ?></th>
                <th scope="col"><?= __('Photo Type') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->mail1) ?></td>
                <td><?= h($users->mail2) ?></td>
                <td><?= h($users->phone1) ?></td>
                <td><?= h($users->phone2) ?></td>
                <td><?= h($users->birth_date) ?></td>
                <td><?= h($users->group_id) ?></td>
                <td><?= h($users->subscription_state_id) ?></td>
                <td><?= h($users->photo) ?></td>
                <td><?= h($users->photo_dir) ?></td>
                <td><?= h($users->photo_size) ?></td>
                <td><?= h($users->photo_type) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
