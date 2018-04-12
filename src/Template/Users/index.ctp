<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<div class="noudiv">
    <h3><?= __('Users') ?> <a href="http://80.211.14.98/epergam2/users/add"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/add.png"></a></h3>
        <div class="paginator">
		<table class="responsive-table">
		<tr>
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<?php $num2 = $this->Paginator->counter(['format' => '{{start}}'])?>
		<?php $num3 = str_replace('.','',$num2)?>
		<?php $nummm = $num3 - 1?>
		<?php $total1 = $this->Paginator->counter(['format' => '{{count}}']) ?>
		<?php $total = str_replace('.','',$total1)?>
		<?php if($numpages == "1"):?>
		<?php else:?>
		<td colspan="2">
		<ul class="pagination">
			<?= $this->Paginator->first('<< ' . __('first')) ?>
			<?= $this->Paginator->prev('< ' . __('previous')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('next') . ' >') ?>
			<?php $pages = ' (' . $this->Paginator->counter(['format' => '{{pages}}']) . ')' ?>
			<?= $this->Paginator->last(__('last') . $pages . ' >>') ?>
		</ul>
		</center>
		<?php endif;?>
		</td>		
		</tr>
		</table>
	</div>
    <table cellpadding="0" cellspacing="0" class="index-table">
        <thead>
            <tr>
				<th scope="col"><span class="fadehide">Ordena per:</span><span class="fadeshow">Número</span></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th colspan="4" scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th colspan="2" scope="col"><?= $this->Paginator->sort('username', ['label' => 'Nom d\'usuari/a']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subscription_state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><span class="fadeshow"><?= __('Actions') ?></span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <?php $nummm = $nummm + 1 ?>
            <tr>
				<td><span class="fadehide"><b>Número: </b></span><?= $nummm . ' / ' . $total ?></td>
                <td><span class="fadehide"><b>Número de registre: </b></span><?= $user->id ?></td>
                <td colspan="4"><span class="fadehide"><b>Nom: </b></span><a href="http://80.211.14.98/epergam2/users/view/<?=$user->id?>"><?= h($user->name) ?></a></td>
                <td colspan="2"><span class="fadehide"><b>Nom d'usuari/a: </b></span><?= h($user->username) ?></td>
                <td><span class="fadehide"><b>Grup: </b></span><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
                <td><span class="fadehide"><b>Estat de subscripció: </b></span><?= $user->has('subscription_state') ? $this->Html->link($user->subscription_state->name, ['controller' => 'SubscriptionStates', 'action' => 'view', $user->subscription_state->id]) : '' ?></td>
                <td><span class="fadehide"><b>Data de creació: </b></span><?= h($user->created->i18nFormat('dd/MM/YYYY HH:mm')) ?></td>
                <td><span class="fadehide"><b>Última modificació: </b></span><?= h($user->modified->i18nFormat('dd/MM/YYYY HH:mm')) ?></td>
                <td class="actions">
                    <a href="http://80.211.14.98/epergam2/users/view/<?=$user->id?>"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/view.png"></a>
					<a href="http://80.211.14.98/epergam2/users/edit/<?=$user->id?>"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/edit.png"></a>
                    <?= $this->Form->postLink($this->Html->image('http://80.211.14.98/epergam2/webroot/img/icons/delete.png', ['height' => 24, 'width' => 24]), ['action' => 'delete', $user->id], ['escape' => false, 'confirm' => __('Segur que voleu esborrar ' . $user->name . '?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        <div class="paginator">
		<table class="responsive-table">
		<tr>
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<?php $num2 = $this->Paginator->counter(['format' => '{{start}}'])?>
		<?php $num3 = str_replace('.','',$num2)?>
		<?php $nummm = $num3 - 1?>
		<?php $total1 = $this->Paginator->counter(['format' => '{{count}}']) ?>
		<?php $total = str_replace('.','',$total1)?>
		<?php if($numpages == "1"):?>
		<?php else:?>
		<td colspan="2">
		<ul class="pagination">
			<?= $this->Paginator->first('<< ' . __('first')) ?>
			<?= $this->Paginator->prev('< ' . __('previous')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('next') . ' >') ?>
			<?php $pages = ' (' . $this->Paginator->counter(['format' => '{{pages}}']) . ')' ?>
			<?= $this->Paginator->last(__('last') . $pages . ' >>') ?>
		</ul>
		</center>
		<?php endif;?>
		</td>		
		</tr>
		</table>
	</div>
</div>
