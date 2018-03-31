<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Authority[]|\Cake\Collection\CollectionInterface $authorities
 */
?>
<div class="authorities index large-12 medium-8 columns content">
    <br>
    <h3><?= __('Authorities') ?>&emsp;<a href="http://127.0.0.1/epergam2/authorities/pdfindex/1.pdf"><img width="24" height="24" src="http://127.0.0.1/epergam2/webroot/img/icons/printer.png"> </b></a></h3>
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
    
    <table class="responsive-table">
        <thead>
            <tr>
				<th scope="col"><center>Número</th>
                <th scope="col"><center><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" colspan="2"><?= $this->Paginator->sort('author_name', ['label' => 'Autor/a']) ?></th>
                <th scope="col" colspan="2"><center><?= $this->Paginator->sort('author_type_name', ['label' => 'Tipus d\'autoria']) ?></th>
                <th scope="col"><center><?= $this->Paginator->sort('count_documents', ['label' => 'Recompte de documents']) ?></th>
                <th scope="col" colspan="2"><center><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" colspan="2"><center><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" colspan="2" class="actions"><center><?= __('Actions') ?></th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authorities as $authority): ?>
            <?php $nummm = $nummm + 1 ?>
            <?php if($authority->id == 1007):?>
            <?php else: ?>
            <tr>
				<td><center><?= $nummm . ' / ' . $total ?></td>
                <td><center><?= $authority->id ?></td>
                <td colspan="2"><a href="http://127.0.0.1/epergam2/authors/view/<?php echo $authority->author_id?>"><?= $authority->author_name ?></a></td>
                <?php if($authority->author_type_id = 1):?>
                <td colspan="2"><center><a href="http://127.0.0.1/epergam2/author_types/view/<?php echo $authority->author_type_id?>">[autoria]</a></td>
                <?php else: ?>
                <td colspan="2"><center><a href="http://127.0.0.1/epergam2/author_types/view/<?php echo $authority->author_type_id?>"><?= $authority->author_type_name ?></a></td>
                <?php endif;?>
                <td><center><?= $authority->count_documents?></td>
                <td colspan="2"><center><?= h($authority->created) ?></td>
                <td colspan="2"><center><?= h($authority->modified) ?></td>
                <td colspan="2" class="actions"><center>
                    <a href="http://127.0.0.1/epergam2/authorities/view/<?=$authority->id?>"><img width="24px" height="24px" src="http://127.0.0.1/epergam2/webroot/img/icons/view.png"></a>
					<a href="http://127.0.0.1/epergam2/authorities/edit/<?=$authority->id?>"><img width="24px" height="24px" src="http://127.0.0.1/epergam2/webroot/img/icons/edit.png"></a>
                    <?= $this->Form->postLink($this->Html->image('http://127.0.0.1/epergam2/webroot/img/icons/delete.png', ['height' => 24, 'width' => 24]), ['action' => 'delete', $authority->id], ['escape' => false, 'confirm' => __('Segur que voleu esborrar ' . $authority->name . '?', $authority->id)]) ?>
                </td>                
            </tr>
            <?php endif; ?>
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
