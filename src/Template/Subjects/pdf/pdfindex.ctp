<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language[]|\Cake\Collection\CollectionInterface $subjects
 */
?>
	<table width="300px">
		<tr>
			<td style="background:white; width: 90px;">
				<img width="75px" height="75px" src="http://80.211.14.98/epergam2/webroot/img/icons/logo.jpg"></img>
			</td>
			<td style="background:white; text-align: left;">
				<b>Biblioteca Marta Mata</b><br>
				Escola Orlandai<br>
				08034 Barcelona
			</td>
		</tr>
	</table>
<br>
<div class="languages index large-12 medium-8 columns content">
    <h3><?= __('Subjects') ?></h3>
    <div class="paginator">
		
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
				<th scope="col"><center>Número</th>
                <th scope="col"><center>Número<br>de registre</th>
                <th scope="col" colspan="2">Nom</th>
                <th scope="col"><center>Recompte<br>de documents</th>
                <th scope="col" colspan="2"><center>Data<br>de creació</th>
                <th scope="col" colspan="2"><center>Última<br>modificació</th>
            </tr>
        </thead>
        <tbody>
			<?php $total = $psubjects->count()?>
			<?php $nummm = 0?>
            <?php foreach ($psubjects as $subject): ?>
            <?php $nummm = $nummm + 1 ?>
            <tr>
				<td><center><?= $nummm . ' / ' . $total ?></td>
                <td><center><?= $subject->id ?></td>
                <td colspan="2"><?= h($subject->name) ?></td>
                <td><center><?= $subject->count_documents ?></center></td>
                <td colspan="2"><center><?= h($subject->created->i18nFormat('d/M/YYYY hh:mm')) ?></td>
                <td colspan="2"><center><?= h($subject->modified->i18nFormat('d/M/YYYY hh:mm')) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
