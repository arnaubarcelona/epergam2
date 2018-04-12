<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending[]|\Cake\Collection\CollectionInterface $lendings
 */
?>

<div class="noudiv">
    <h3>Préstecs vigents</h3>
    <b>Imprimir llistats</b><?php echo $this->Form->create(null);
					echo $this->Form->control('Group.id', [
						'id' => 'grups',
						'label' => '',
						'type' => 'select',
						'style'=>'width:300px; padding: 5px; left-margin: 10px;',
						'class' => 'single_autocomplete',
						'options' => $groups,
						'empty' => true,
						'onchange' => 'pdfindex()'
					]);?>
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
                <th scope="col" colspan="2"><?= $this->Paginator->sort('document_name', ['label' => 'Títol']) ?></th>
                <th scope="col" colspan="2"><?= $this->Paginator->sort('user_name', ['label' => 'Usuari/a']) ?></th>
                <th scope="col" colspan="2"><?= $this->Paginator->sort('group_name', ['label' => 'Grup']) ?></th>
                <th scope="col" colspan="2"><?= $this->Paginator->sort('set_lending_user_name', ['label' => 'Ha fet el préstec']) ?></th>
                <th scope="col" style="text-align:left;"><?= $this->Paginator->sort('date_taken') ?></th>
                <th scope="col" style="text-align:left;"><?= $this->Paginator->sort('date_return') ?></th>
                <th scope="col" style="text-align:left;"><?= $this->Paginator->sort('lending_state_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lendings as $lending): ?>
            <tr>
                <td><span class="fadehide"><b>Núm. registre: </b></span><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $lending->document_id?>"><?= $lending->document_id ?></a></td>
                <td colspan="2" style="text-align:left;"><span class="fadehide"><b>Títol: </b></span><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $lending->document_id?>"><?= $lending->document_name ?></td>
                <td colspan="2" style="text-align:left;"><span class="fadehide"><b>Prestat a: </b></span><a href="http://80.211.14.98/epergam2/users/view/<?php echo $lending->user_id?>"><?= $lending->user_name?></td>
                <td colspan="2" style="text-align:left;"><span class="fadehide"><b>Grup: </b></span><a href="http://80.211.14.98/epergam2/groups/view/<?php echo $lending->group_id?>"><?= $lending->group_name?></td>
                <td colspan="2"><span class="fadehide"><b>Prestat per: </b></span><?= $lending->set_lending_user_name ?></td>
                <td style="text-align:left;"><span class="fadehide"><b>Data de préstec: </b></span><?= h($lending->date_taken->i18nFormat('dd/MM/YYYY')) ?></td>
                <td style="text-align:left;"><span class="fadehide"><b>Fi del préstec: </b></span><?= h($lending->date_return->i18nFormat('dd/MM/YYYY')) ?></td>
                <td style="text-align:left;"><span class="fadehide"><b>Estat de préstec: </b></span><?= $lending->lending_state_name ?></td>
                <td class="actions">
                    <a href="http://80.211.14.98/epergam2/lendings/return/<?php echo $lending->document_id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a>
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

<script>

function pdfindex() {
  window.location = 'http://80.211.14.98/epergam2/lendings/pdfoindex/' + document.getElementById("grups").value + '/1.pdf'; // JQuery:  $("#menu").val();
}
</script>
