<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending[]|\Cake\Collection\CollectionInterface $lendings
 */
?>
<?php $session = $this->request->session(); $user_data = $session->read('Auth.User')?>
<div class="noudiv">
    <h3>Préstecs vigents</h3>
    <?php if(!empty($user_data)):?><br><table class="responsive-table"><tr><td>
    <center><b>Filtrar</b><?php echo $this->Form->create(null);
					echo $this->Form->control('Group.id', [
						'id' => 'grupsfilter',
						'label' => '',
						'type' => 'select',
						'style'=>'width:300px; padding: 5px; left-margin: 10px;',
						'class' => 'single_autocomplete',
						'options' => $groups,
						'empty' => true,
						'onchange' => 'filterindex()'
					]);?>
    </td><td>
    <center><b>Imprimir llistats filtrats</b><?php echo $this->Form->create(null);
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
    </td></tr></table><?php endif;?>
					
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
                <?php if(!empty($user_data)):?><th scope="col" colspan="2"><?= $this->Paginator->sort('user_name', ['label' => 'Usuari/a']) ?></th><?php endif;?>
                <th scope="col" colspan="2"><?= $this->Paginator->sort('group_name', ['label' => 'Grup']) ?></th>
                <?php if(!empty($user_data)):?><th scope="col" colspan="2"><?= $this->Paginator->sort('set_lending_user_name', ['label' => 'Ha fet el préstec']) ?></th><?php endif;?>
                <th scope="col" style="text-align:left;"><?= $this->Paginator->sort('date_taken') ?></th>
                <th scope="col" style="text-align:left;"><?= $this->Paginator->sort('date_return') ?></th>
                <th scope="col" style="text-align:left;"><?= $this->Paginator->sort('lending_state_id') ?></th>
                <th scope="col" style="text-align:left;"><?= $this->Paginator->sort('lastmail', ['label' => 'Últim correu enviat']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lendings as $lending): ?>
            <tr>
                <td><span class="fadehide"><b>Núm. registre: </b></span><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $lending->document_id?>"><?= $lending->document_id ?></a></td>
                <td colspan="2" style="text-align:left;"><span class="fadehide"><b>Títol: </b></span><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $lending->document_id?>"><?= $lending->document_name ?></td>
                <?php if(!empty($user_data)):?><td colspan="2" style="text-align:left;"><span class="fadehide"><b>Prestat a: </b></span><a href="http://80.211.14.98/epergam2/users/view/<?php echo $lending->user_id?>"><?= $lending->user_name?></td><?php endif;?>
                <td colspan="2" style="text-align:left;"><span class="fadehide"><b>Grup: </b></span><a href="http://80.211.14.98/epergam2/groups/view/<?php echo $lending->group_id?>"><?= $lending->group_name?></td>
                <?php if(!empty($user_data)):?><td colspan="2"><span class="fadehide"><b>Prestat per: </b></span><?= $lending->set_lending_user_name ?></td><?php endif;?>
                <td style="text-align:left;"><span class="fadehide"><b>Data de préstec: </b></span><?= h($lending->date_taken->i18nFormat('dd/MM/YYYY')) ?></td>
                <td style="text-align:left;"><span class="fadehide"><b>Fi del préstec: </b></span><?= h($lending->date_return->i18nFormat('dd/MM/YYYY')) ?></td>
                <td style="text-align:left;"><span class="fadehide"><b>Estat de préstec: </b></span><?= $lending->lending_state_name ?></td>
                <td style="text-align:left;"><span class="fadehide"><b>Últim correu enviat: </b></span><?php if(!empty($lending->lastmail)):?><?= $lending->lastmail->i18nFormat('dd/MM/YYYY') ?><?php else:?>No enviat<?php endif;?></td>
                <td class="actions">
                    <a href="http://80.211.14.98/epergam2/lendings/return/<?php echo $lending->document_id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a>
					<a href="http://80.211.14.98/epergam2/lendings/edit/<?=$lending->id?>"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/edit.png"></a>
                    <?= $this->Form->postLink($this->Html->image('http://80.211.14.98/epergam2/webroot/img/icons/delete.png', ['height' => 24, 'width' => 24]), ['action' => 'delete', $lending->id], ['escape' => false, 'confirm' => __('Segur que voleu esborrar ' . $lending->name . '?', $lending->id)]) ?>
					<a href="http://80.211.14.98/epergam2/users/avisaprestec/<?=$lending->user_id?>"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/mail.png"></a>
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
function filterindex() {
  window.location = 'http://80.211.14.98/epergam2/lendings/index/' + document.getElementById("grupsfilter").value; // JQuery:  $("#menu").val();
}
</script>
