<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending[]|\Cake\Collection\CollectionInterface $lendings
 */
?>

<div class="noudiv">
    <h3>Préstecs finalitzats</h3>
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
		<center><ul class="pagination">
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
    <table cellpadding="0" cellspacing="0" class="responsive-table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('document_id', ['label' => 'Núm. registre']) ?></th>
                <th colspan="2" scope="col"><?= $this->Paginator->sort('document_name', ['label' => 'Títol']) ?></th>
                <th colspan="2" scope="col"><?= $this->Paginator->sort('user_name', ['label' => 'Usuari/a']) ?></th>
                <th colspan="2" scope="col"><?= $this->Paginator->sort('set_lending_user_name', ['label' => 'Ha fet el préstec']) ?></th>
                <th colspan="2" scope="col"><?= $this->Paginator->sort('set_return_user_name', ['label' => 'Ha fet el retorn']) ?></th>
                <th style="text-align:left;" scope="col"><?= $this->Paginator->sort('date_taken') ?></th>
                <th style="text-align:left;" scope="col"><?= $this->Paginator->sort('date_return') ?></th>
                <th style="text-align:left;" scope="col"><?= $this->Paginator->sort('date_real_return') ?></th>
                <th style="text-align:left;" scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th style="text-align:left;" scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th style="text-align:left;" scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lendings as $lending): ?>
            <tr>
                <td><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $lending->document_id?>"><?= $lending->document_id ?></a></td>
                <td style="text-align:left;"colspan="2"><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $lending->document_id?>"><?= $lending->document_name ?></td>
                <td style="text-align:left;"colspan="2"><a href="http://80.211.14.98/epergam2/users/view/<?php echo $lending->user_id?>"><?= $lending->user_name?></td>
                <td style="text-align:left;"colspan="2"><?= $lending->set_lending_user_name ?></td>
                <td style="text-align:left;"colspan="2"><?= $lending->set_return_user_name ?></td>
                <td style="text-align:left;"><?= h($lending->date_taken->i18nFormat('dd/MM/YYYY')) ?></td>
                <td style="text-align:left;"><?= h($lending->date_return->i18nFormat('dd/MM/YYYY')) ?></td>
                <td style="text-align:left;"><?= h($lending->date_real_return->i18nFormat('dd/MM/YYYY')) ?></td>
                <td style="text-align:left;"><?= h($lending->created->i18nFormat('dd/MM/YYYY')) ?></td>
                <td style="text-align:left;"><?= h($lending->modified->i18nFormat('dd/MM/YYYY')) ?></td>
                <td class="actions">
					<a href="http://80.211.14.98/epergam2/lendings/edit/<?=$lending->id?>"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/edit.png"></a>
                    <?= $this->Form->postLink($this->Html->image('http://80.211.14.98/epergam2/webroot/img/icons/delete.png', ['height' => 24, 'width' => 24]), ['action' => 'delete', $lending->id], ['escape' => false, 'confirm' => __('Segur que voleu esborrar ' . $lending->name . '?', $lending->id)]) ?>
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
		<center><ul class="pagination">
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
