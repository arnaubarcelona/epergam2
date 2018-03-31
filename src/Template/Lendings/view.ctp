<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending $lending
 */
?>
<?php echo $maxdays ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lending'), ['action' => 'edit', $lending->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lending'), ['action' => 'delete', $lending->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lending->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lendings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lending'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Document'), ['controller' => 'Documents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lending States'), ['controller' => 'LendingStates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lending State'), ['controller' => 'LendingStates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lendings view large-9 medium-8 columns content">
    <h3><?= h($lending->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Document') ?></th>
            <td><?= $lending->has('document') ? $this->Html->link($lending->document->name, ['controller' => 'Documents', 'action' => 'view', $lending->document->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $lending->has('user') ? $this->Html->link($lending->user->name, ['controller' => 'Users', 'action' => 'view', $lending->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lending State') ?></th>
            <td><?= $lending->has('lending_state') ? $this->Html->link($lending->lending_state->name, ['controller' => 'LendingStates', 'action' => 'view', $lending->lending_state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lending->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Set Lending User Id') ?></th>
            <td><?= $this->Number->format($lending->set_lending_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Set Return User Id') ?></th>
            <td><?= $this->Number->format($lending->set_return_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Taken') ?></th>
            <td><?= h($lending->date_taken) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Return') ?></th>
            <td><?= h($lending->date_return) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Real Return') ?></th>
            <td><?= h($lending->date_real_return) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($lending->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($lending->modified) ?></td>
        </tr>
    </table>
</div>
