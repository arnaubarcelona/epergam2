<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MassiveError[]|\Cake\Collection\CollectionInterface $massiveErrors
 */
?>
<div class="noudiv">
    <h3>Errors del canvi massiu</h3>
    <?php if($massiveErrors->count()>0):?>
    <div class="paginator">
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<?php if($numpages == "1"):?>
		<?php else:?>
		<table class="responsive-table">
		<tr>
		<td>
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
		<?php $total1 = $this->Paginator->counter(['format' => '{{count}}']) ?>
		<?php $total = str_replace('.','',$total1)?>
	</div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Títol del document</th>
                <th scope="col">Error detectat</th>
                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Data i hora que s\'ha provat el canvi']) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($massiveErrors as $massiveError): ?>
            <tr>
                <?php if(!empty($massiveError->document->name)):?><td><a target="_blank" href="http://80.211.14.98/epergam2/documents/edit/<?= $massiveError->document_id ?>"><?= $massiveError->document->name ?></a></td><?php else:?><td>(No trobat)</td><?php endif?>
				<td><?= h($massiveError->error) ?></td>
                <td><?= h($massiveError->created) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<?php if($numpages == "1"):?>
		<?php else:?>
		<table class="responsive-table">
		<tr>
			<td>
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
		<?php $total1 = $this->Paginator->counter(['format' => '{{count}}']) ?>
		<?php $total = str_replace('.','',$total1)?>
	</div>
	<?php else:?>
    <br>
    No s'ha detectat cap error en fer el canvi massiu.
    <?php endif;?>
</div>
