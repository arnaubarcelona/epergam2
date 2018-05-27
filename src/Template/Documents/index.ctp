<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document[]|\Cake\Collection\CollectionInterface $document
 */
?>
<div class="noudiv">
    <h3><?= __('Documents') ?> <a href="http://80.211.14.98/epergam2/documents/add"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/add.png"></a></h3>
      <div class="paginator">
		<table class="responsive-table">
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<tr>
			<td>
		<?php if($numpages == "1"):?>
		<?php else:?>
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
<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<?php $nummm = $this->Paginator->counter(['format' => '{{start}}'])?>
		<?php $nummm = str_replace('.','',$nummm)?>
		<?php $nummm = $nummm - 1?>
<?php if (!empty($documents)): ?>
<div class="related">
<table class="responsive-table">
	<thead>
	 <th><center>Núm. d'ordre</th>    
    <th><center><?= $this->Paginator->sort('id') ?></th>
    <th><center><?= $this->Paginator->sort('lending_state_id', ['label' => 'Estat de préstec']) ?></th>
    <th><center><?= $this->Paginator->sort('count_documents', ['label' => 'Vegades prestat']) ?></th>
    <th colspan="5"><?= $this->Paginator->sort('name') ?></th>
    <th><center><?= $this->Paginator->sort('created') ?></th>
    <th><center><?= $this->Paginator->sort('modified') ?></th>
    </thead>
    <?php foreach ($documents as $document): ?>
    <?php $nummm = $nummm + 1 ?>
   
		  <tr>  
			  <td style="text-align:center; cursor: pointer;" onclick="window.location='http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>'">
			  <center><b><a href="http://80.211.14.98/epergam2/documents/edit/<?php echo $document->id ?>"><?= $nummm ?> / <?php echo $total?></a></b></td>
			  <td style="text-align:center; cursor: pointer;" onclick="window.location='http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>'">
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a target="_blank" href="http://80.211.14.98/epergam2/documents/edit/<?= h($document->id) ?>"> <?= h($document->id) ?></a></td>
			  <td style="text-align:center; cursor: pointer;" onclick="window.location='http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>'">
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $document->lending_state->photo_dir?>/<?php echo $document->lending_state->photo?>"> 
			  <?php if($document->lending_state_id == 6):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $document->catalogue_state->photo_dir?>/<?php echo $document->catalogue_state->photo?>"> 
			  <?php endif; ?>
			  <?php if($document->lending_state_id == 1):?>
			  			  <?= $this->Html->link($this->Html->image('/webroot/img/icons/loan.png', ['height' => '24', 'width' => '24']), ['controller' => 'Lendings', 'action' => 'add', $document->id, $currurl], ['escape' => false]) ?>
			  <?php endif;?>
			  <?php if($document->lending_state_id == 6):?>
			  <?php endif; ?>
			  <?php if(!empty($document->photo)):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/image.png"> 
			  <?php else:?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/noimage.png"> 
			  <?php endif;?>
			<?php $lnum = count($document->lendings)?>
			<?php $lfirst = true; ?>
				<?php if($lfirst):?>
				<!--#quan és 1#-->
					<?php if (!empty($document->lendings)):?>
					  <?php foreach ($document->lendings as $lending): ?>
						<?php if($lending->lending_state_id == 2 || $lending->lending_state_id == 3):?>
							<a href="http://80.211.14.98/epergam2/lendings/return/<?php echo $document->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a>
						<?php else:?>
							
						<?php endif;?>
					  <?php endforeach;?>
					<?php else:?>
					  
					<?php endif; ?>
				<!--#quan és 1#-->
				<?php else: ?>
				<!--#quan és més d'1#-->
					<?php if (!empty($document->lendings)):?>
					  <?php foreach ($document->lendings as $lending): ?>			  
						<?php if($lending->lending_state_id == 2 || $lending->lending_state_id == 3):?>
							<a href="http://80.211.14.98/epergam2/lendings/return/<?php echo $document->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a><br>
						<?php else:?>
							
						<?php endif;?>
					  <?php endforeach;?>
					<?php else:?>
					 
					<?php endif; ?>
				<!--#quan és més d'1#-->
				<?php endif;?>
			  </td><td style="text-align:center; cursor: pointer;" onclick="window.location='http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>'">
			  <center><?php echo $document->count_documents?>
			   </td>  
		  <td colspan=5 style="font-size: 1em; font-weight: bold; cursor: pointer;" onclick="window.location='http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>'">
			  <?php foreach ($document->levels as $level): ?>
			  <img height="12" width="12" src="http://80.211.14.98/epergam2/<?php echo $level->photo_dir?>/<?php echo $level->photo?>" alt="<?php echo $level->name ?>" /></a>
			  <?php endforeach; ?> 
			  <?php if(!empty($document->url)): ?>
			  <a target="_blank" href="http://<?= h($document->url) ?>"><?= h($document->name) ?></a>
			  <?php else: ?>
			  <?= h($document->name) ?>
			  <?php endif; ?>
			  <font style="font-size: 1em">
			  <?php if (!empty($document->authorities)): ?>
						<?php $num = count($document->authorities)?>
						<?php if($num == 1):?>
							<?php foreach ($document->authorities as $authority): ?>
							<br>
							<a href="http://80.211.14.98/epergam2/authors/view/<?php echo $authority->author->id?>"><?php echo $authority->author->name ?>
							<?php $autor = $authority->author->name ?>
							<?php endforeach;?>
						<?php else: ?>
						  <?php $auts = array(); ?>
						  <?php $first = true; ?>
						  <?php foreach ($document->authorities as $authority): ?>
						  <?php if ($first): ?>
								<?php if($authority->author->name == "[et al.]"):?>
								<?php else: ?>
								<?php $autor = $authority->author->name ?>
								<?php endif; ?>
						  <?php endif; ?>
							  <?php if(!empty($authority->author_type->name)): ?>
								<?php $auts += array(h($authority->author->name) . " " . h($authority->author_type->name) => h($authority->author->id)) ?>
							  <?php else: ?>
								<?php $auts += array(h($authority->author->name) => h($authority->author->id)) ?>
							  <?php endif; ?>
						  <?php endforeach; ?>
						  <br>
						  <?php $result="";?>
						  <?php foreach($auts as $key => $value) {
							  if($key == "[et al.]") {$result .= $key;}
							  else{$result .= "<a href=" . "http://80.211.14.98/epergam2/authors/view/" . $value .">". $key. "</a>; ";}
							}?>
							<?php if(substr($result, -10) == "; [et al.]"):?>
						    <?php echo $result = rtrim($result, "; [et al.]") . " [et al.]" ?>
						    <?php else: ?>
						  <?php echo rtrim($result,'; '); ?>
						 <?php endif;?>
						<?php endif; ?>
			  <?php else: ?>
			  <br>Autoria desconeguda
			  <?php endif;?>
			  </font></td>
			  <td><center><?=$document->created->i18nFormat('d/M/YYYY')?></td>
			  <td><center><?=$document->modified->i18nFormat('d/M/YYYY')?></td>
		  </tr>
        <?php endforeach; ?>
   </table>
    </div>
    
        <?php endif; ?>
	<div class="paginator">
		<table class="responsive-table">
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<tr>
			<td>
		<?php if($numpages == "1"):?>
		<?php else:?>
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
</div>
