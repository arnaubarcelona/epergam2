<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author[]|\Cake\Collection\CollectionInterface $authors
 */
?>
<div class="noudiv">
    <h3><?= __('Authors') ?></h3>
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
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><span class="fadeshow">Recompte de documents</span></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><span class="fadeshow"><?= __('Actions') ?></span></th>
            </tr>
        </thead>
        <tbody>
			<?php $count_documents = 0?>
            <?php foreach ($authors as $author): ?>
            <?php $nummm = $nummm + 1 ?>
            <?php if($author->id == 930):?>
            <?php else: ?>
            <?php foreach ($author->authorities as $authority):?>
				<?php $count_documents = $count_documents + count($authority->documents)?>
			<?php endforeach; ?>
            <tr>
				<td><span class="fadehide"><b>Número: </b></span><?= $nummm . ' / ' . $total ?></td>
                <td><span class="fadehide"><b>Núm. de registre:</b></span><a href="http://80.211.14.98/epergam2/authors/edit/<?=$author->id?>"><?= $author->id ?></a></td>
                <td><span class="fadehide"><b>Nom: </b></span><a href="http://80.211.14.98/epergam2/authors/view/<?=$author->id?>"><?= h($author->name) ?></a></td>
                <td><span class="fadehide"><b>Recompte de documents: </b></span><?= $count_documents?><?php $count_documents = 0?></td>
                <td><span class="fadehide"><b>Data de creació: </b></span><?= h($author->created->i18nFormat('d/M/YYYY HH:mm')) ?></td>
                <td><span class="fadehide"><b>Última modificació: </b></span><?= h($author->modified->i18nFormat('d/M/YYYY HH:mm')) ?></td>
                <td class="actions">
                    <a href="http://80.211.14.98/epergam2/authors/view/<?=$author->id?>"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/view.png"></a>
					<a href="http://80.211.14.98/epergam2/authors/edit/<?=$author->id?>"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/edit.png"></a>
                    <?= $this->Form->postLink($this->Html->image('http://80.211.14.98/epergam2/webroot/img/icons/delete.png', ['height' => 24, 'width' => 24]), ['action' => 'delete', $author->id], ['escape' => false, 'confirm' => __('Segur que voleu esborrar ' . $author->name . '?', $author->id)]) ?>
                </td>
            </tr>
            <?php endif;?>
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
