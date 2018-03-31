<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language[]|\Cake\Collection\CollectionInterface $languages
 */
?>
	
<div class="languages index large-12 medium-8 columns content">
    <h3><?= __('Languages') ?></h3>
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
			<?php $total = $planguages->count()?>
			<?php $nummm = 0?>
            <?php foreach ($planguages as $language): ?>
            <?php $nummm = $nummm + 1 ?>
            <tr>
				<td><center><?= $nummm . ' / ' . $total ?></td>
                <td><center><?= $language->id ?></td>
                <td colspan="2"><img height="24" width="24" src="http://127.0.0.1/epergam2/<?php echo $language->photo_dir ?>/<?php echo $language->photo ?>"> <?= h($language->name) ?></td>
                <td><center><?= $language->count_documents ?></center></td>
                <td colspan="2"><center><?= h($language->created->i18nFormat('d/M/YYYY hh:mm')) ?></td>
                <td colspan="2"><center><?= h($language->modified->i18nFormat('d/M/YYYY hh:mm')) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
