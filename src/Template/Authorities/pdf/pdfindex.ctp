<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Authority[]|\Cake\Collection\CollectionInterface $authorities
 */
?>
<div class="authorities index large-12 medium-8 columns content">
<h3><?= __('Authorities') ?></h3>    
    <table>
        <thead>
            <tr>
				<th scope="col"><center>Número</th>
                <th scope="col"><center>Número<br>de registre</th>
                <th scope="col" colspan="2">Autor/a</th>
                <th scope="col" colspan="2"><center>Tipus d'autoria<br> (en blanc: autor/a)</th>
                <th scope="col"><center>Recompte<br>de documents</th>
                <th scope="col" colspan="2"><center>Data<br>de creació</th>
                <th scope="col" colspan="2"><center>Última<br>modificació</th>
            </tr>
        </thead>
        <tbody><?php $nummm = 0 ?>
			<?php $total = $pauthorities->count()?>
			
            <?php foreach ($pauthorities as $authority): ?>
            <?php $nummm = $nummm + 1 ?>
            <?php if($authority->id == 1007):?>
            <?php else: ?>
            <tr>
				<td><center><?= $nummm . ' / ' . $total ?></td>
                <td><center><?= $authority->id?></td>
                <td colspan="2"><?= $authority->author_name ?></td>
                <?php if($authority->author_type_id == 1):?>
                <td colspan="2"><center>[autoria]</td>
                <?php else: ?>
                <td colspan="2"><center><?= $authority->author_type_name ?></td>
                <?php endif; ?>
                <td><center><?= $authority->count_documents?></td>
                <td colspan="2"><center><?= h($authority->created) ?></td>
                <td colspan="2"><center><?= h($authority->modified) ?></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
