<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending[]|\Cake\Collection\CollectionInterface $lendings
 */
?>

<div class="lendings index large-12 medium-8 columns content">
    <h3>Préstecs vigents</h3>
     <div class="paginator">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><b><?= $this->Paginator->sort('document_id', ['label' => 'Núm. registre']) ?></th>
                <th scope="col" colspan="2"><b><?= $this->Paginator->sort('document_name', ['label' => 'Títol']) ?></th>
                <th scope="col" colspan="2"><b><?= $this->Paginator->sort('user_name', ['label' => 'Usuari/a']) ?></th>
                <th scope="col" colspan="2"><b><?= $this->Paginator->sort('group_name', ['label' => 'Grup']) ?></th>
                <th scope="col" colspan="2"><b><?= $this->Paginator->sort('phone1', ['label' => '1r telf.']) ?></th>
                <th scope="col" colspan="2"><b><?= $this->Paginator->sort('phone2', ['label' => '2n telf.']) ?></th>
                <th scope="col" style="text-align:left;"><b><?= $this->Paginator->sort('date_taken') ?></th>
                <th scope="col" style="text-align:left;"><b><?= $this->Paginator->sort('date_return') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($plendings as $lending): ?>
            <tr>
                <td><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $lending->document_id?>"><?= $lending->document_id ?></a></td>
                <td colspan="2" style="text-align:left;"><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $lending->document_id?>"><?= $lending->document_name ?></td>
                <td colspan="2" style="text-align:left;"><a href="http://80.211.14.98/epergam2/users/view/<?php echo $lending->user_id?>"><?= $lending->user_name?></td>
                <td colspan="2" style="text-align:left;"><a href="http://80.211.14.98/epergam2/groups/view/<?php echo $lending->group_id?>"><?= $lending->group_name?></td>
                <td colspan="2" style="text-align:left;"><?= $lending->phone1?></td>
                <td colspan="2" style="text-align:left;"><?= $lending->phone2?></td>
                <td style="text-align:left;"><?= h($lending->date_taken->i18nFormat('dd/MM/YYYY')) ?></td>
                <td style="text-align:left;"><?= h($lending->date_return->i18nFormat('dd/MM/YYYY')) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
</div>
