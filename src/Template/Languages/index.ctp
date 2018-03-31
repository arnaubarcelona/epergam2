<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language[]|\Cake\Collection\CollectionInterface $languages
 */
?>
	
<div class="languages index large-12 medium-8 columns content">
    <br>
    <h3><?= __('Languages') ?>&emsp;<a href="http://127.0.0.1/epergam2/languages/pdfindex/1.pdf"><img width="24" height="24" src="http://127.0.0.1/epergam2/webroot/img/icons/printer.png"> </b></a> <a href="http://127.0.0.1/epergam2/languages/add"><img width="24px" height="24px" src="http://127.0.0.1/epergam2/webroot/img/icons/plus.png"></a>    </h3>
    <div class="paginator">
		<table class="responsive-table">
		<tr>
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<?php $nummm = $this->Paginator->counter(['format' => '{{start}}']) - 1?>
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
		<?php $total = $this->Paginator->counter(['format' => '{{count}}']) ?>
	</div>
	
    <table cellpadding="0" cellspacing="0" class="responsive-table">
        <thead>
            <tr>
				<th scope="col"><center>Número</th>
                <th scope="col"><center><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" colspan="2"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><center><?= $this->Paginator->sort('count_documents', ['label' => 'Recompte de documents']) ?></th>
                <th scope="col" colspan="2"><center><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" colspan="2"><center><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" colspan="2" class="actions"><center><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($languages as $language): ?>
            <?php $nummm = $nummm + 1 ?>
            <tr>
				<td><center><?= $nummm . ' / ' . $total ?></td>
                <td><center><?= $language->id ?></td>
                <td colspan="2"><img height="24" width="24" src="http://127.0.0.1/epergam2/<?php echo $language->photo_dir?>/<?php echo $language->photo?>" /> <?= h($language->name) ?></td>
                <td><center><?= $language->count_documents ?></td>
                <td colspan="2"><center><?= h($language->created->i18nFormat('d/M/YYYY hh:mm')) ?></td>
                <td colspan="2"><center><?= h($language->modified->i18nFormat('d/M/YYYY hh:mm')) ?></td>
                <td colspan="2" class="actions"><center>
					<a href="http://127.0.0.1/epergam2/languages/view/<?=$language->id?>"><img width="24px" height="24px" src="http://127.0.0.1/epergam2/webroot/img/icons/view.png"></a>
					<a href="http://127.0.0.1/epergam2/languages/edit/<?=$language->id?>"><img width="24px" height="24px" src="http://127.0.0.1/epergam2/webroot/img/icons/edit.png"></a>
                    <?= $this->Form->postLink($this->Html->image('http://127.0.0.1/epergam2/webroot/img/icons/delete.png', ['height' => 24, 'width' => 24]), ['action' => 'delete', $language->id], ['escape' => false, 'confirm' => __('Segur que voleu esborrar ' . $language->name . '?', $language->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<div class="paginator">
		<table class="responsive-table">
		<tr>
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
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
		<?php $total = $this->Paginator->counter(['format' => '{{count}}']) ?>
	</div>
</div>
