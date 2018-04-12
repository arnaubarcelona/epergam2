<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthoritiesDocument[]|\Cake\Collection\CollectionInterface $authoritiesDocuments
 */
?>

<div class="authoritiesDocuments index large-12 medium-8 columns content">
    <br>
    <?php $num2 = $this->Paginator->counter(['format' => '{{start}}'])?>
	<?php $num3 = str_replace('.','',$num2)?>
	<?php $nummm = $num3 - 1?>
	<?php $total1 = $this->Paginator->counter(['format' => '{{count}}']) ?>
	<?php $total = str_replace('.','',$total1)?>
    <h3><?= __('Authorities Documents') ?>&emsp;<a href="http://80.211.14.98/epergam2/authorities/pdfindex/1.pdf"><img width="24" height="24" src="http://80.211.14.98/epergam2/webroot/img/icons/printer.png"> </b></a></h3>
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
		
	</div>
    <table cellpadding="0" cellspacing="0" class="responsive-table">
        <thead>
            <tr>
				<th scope="col" colspan="2"><center>Número</th>
                <th scope="col"><?= $this->Paginator->sort('id', ['label' => 'Núm. de registre']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('authority_id', ['label' => 'Núm. d\'autoria']) ?></th>
                <th scope="col" colspan="2"><?= $this->Paginator->sort('author_name', ['label' => 'Nom de l\'autor/a']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('author_type_name', ['label' => 'Tipus d\'autoria']) ?></th>
                <th scope="col" colspan="5"><?= $this->Paginator->sort('document_name', ['label' => 'Títol del document']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authoritiesDocuments as $authoritiesDocument): ?>
            <?php $nummm = $nummm + 1 ?>
            <tr>
				<td colspan="2"><center><?= $nummm . ' / ' . $total ?></td>
                <td><a href="http://80.211.14.98/epergam2/authoritiesDocuments/edit/<?=$authoritiesDocument->id?>"><?= $authoritiesDocument->id?></a></td>
                <td><a href="http://80.211.14.98/epergam2/authorities/view/<?=$authoritiesDocument->authority_id?>"><?= $authoritiesDocument->authority_id?></a></td>
                <td colspan="2"><a href="http://80.211.14.98/epergam2/authors/view/<?=$authoritiesDocument->author_id?>"><?= $authoritiesDocument->author_name?></a></td>
                <?php if($authoritiesDocument->author_type_id == 1):?>
                <td><a href="http://80.211.14.98/epergam2/authorTypes/view/1">[autor/a]</a></td>
                <?php else: ?>
                <td><a href="http://80.211.14.98/epergam2/authorTypes/view/<?=$authoritiesDocument->author_type_id?>"><?= $authoritiesDocument->author_type_name?></a></td>
                <?php endif;?>
                <td colspan="5"><a href="http://80.211.14.98/epergam2/documents/view/<?=$authoritiesDocument->document_id?>"><?= $authoritiesDocument->document_name?></a></td>
                <td><?= h($authoritiesDocument->created) ?></td>
                <td><?= h($authoritiesDocument->modified) ?></td>
                <td class="actions">
                    <a href="http://80.211.14.98/epergam2/authoritiesDocuments/view/<?=$authoritiesDocument->id?>"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/view.png"></a>
					<a href="http://80.211.14.98/epergam2/authoritiesDocuments/edit/<?=$authoritiesDocument->id?>"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/edit.png"></a>
                    <?= $this->Form->postLink($this->Html->image('http://80.211.14.98/epergam2/webroot/img/icons/delete.png', ['height' => 24, 'width' => 24]), ['action' => 'delete', $authoritiesDocument->id], ['escape' => false, 'confirm' => __('Segur que voleu esborrar ' . $authoritiesDocument->name . '?', $authoritiesDocument->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
</div>
