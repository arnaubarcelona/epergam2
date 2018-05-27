<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document[]|\Cake\Collection\CollectionInterface $document
 */
?>
<div class="noudiv">
    <h3><?= __('Els més prestats!') ?> </h3>
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
<div class="quatrecols">
    <?php foreach ($documents as $document): ?>
    <?php $nummm = $nummm + 1 ?>
    <table class="responsive-table" height= 300px>    
		  <tr height="300px">
			  <td style="vertical-align: middle; text-align:center; cursor:pointer" onclick="window.location='http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>'">		
			  <?php if (!empty($document->photo_dir)): ?>
			  <a href="http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>'"><img class="portada" style="max-width: 250px; max-height:250px;" src="http://80.211.14.98/epergam2/<?php echo $document->photo_dir?>/thumbnail-<?php echo $document->photo?>" alt="<?php echo $document->name ?>" /></a>
			  <?php else: ?>
			  <?php if(!empty($document->format)):?>
			  <a href="http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>'"><img class="portada" style="max-width: 250px; max-height:250px;" src="http://80.211.14.98/epergam2/<?php echo $document->format->photo_dir?>/<?php echo $document->format->photo?>" alt="<?php echo $document->format->name ?>" /></a>
			  <?php endif;?> 
			  <?php endif;?> 
			  </td>
		</tr><tr>     
			  <td style="text-align:center; cursor: pointer;" onclick="window.location='http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>'">
				  <?php if(strlen($nummm)==1):?>
			  <b><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>"><?= $nummm ?> / <?php echo $total?></a></b> &emsp;&emsp;
			  <?php elseif(strlen($nummm)==2):?>
			  <b><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>"><?= $nummm ?> / <?php echo $total?></a></b>&emsp;&emsp;
			  <?php elseif(strlen($nummm)==3):?>
			  <b><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>"><?= $nummm ?> / <?php echo $total?></a></b> &emsp;
			  <?php elseif(strlen($nummm)==4):?>
			  <b><a href="http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>"><?= $nummm ?> / <?php echo $total?></a></b>&emsp;
			  <?php endif;?>
			  &emsp;
			  <?php if(strlen($document->id)==1):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a target="_blank" href="http://80.211.14.98/epergam2/documents/edit/<?= h($document->id) ?>"> <?= h($document->id) ?></a> &emsp;&emsp;
			  <?php elseif(strlen($document->id)==2):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a target="_blank" href="http://80.211.14.98/epergam2/documents/edit/<?= h($document->id) ?>"> <?= h($document->id) ?></a>&emsp;&emsp;
			  <?php elseif(strlen($document->id)==3):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a target="_blank" href="http://80.211.14.98/epergam2/documents/edit/<?= h($document->id) ?>"> <?= h($document->id) ?></a> &emsp;
			  <?php elseif(strlen($document->id)==4):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a target="_blank" href="http://80.211.14.98/epergam2/documents/edit/<?= h($document->id) ?>"> <?= h($document->id) ?></a>&emsp;
			  <?php endif;?>
			  &emsp;
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $document->lending_state->photo_dir?>/<?php echo $document->lending_state->photo?>"> 
			  <?php if($document->lending_state_id == 6):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $document->catalogue_state->photo_dir?>/<?php echo $document->catalogue_state->photo?>"> 
			  <?php endif; ?>
			  <?php if($document->lending_state_id == 1):?>
			  			  <?= $this->Html->link($this->Html->image('/webroot/img/icons/loan.png', ['height' => '24', 'width' => '24']), ['controller' => 'Lendings', 'action' => 'add', $document->id, $currurl], ['escape' => false]) ?>
			  <?php endif;?>
			  <?php if($document->lending_state_id == 6):?>
			  <?php endif; ?>
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
			  </td>  </tr><tr height="100px">
		  <td style="text-align: center; font-weight: bold; cursor: pointer;" onclick="window.location='http://80.211.14.98/epergam2/documents/view/<?php echo $document->id ?>'">
			  <?php foreach ($document->levels as $level): ?>
			  <img class="portada" height="16" width="16" style="vertical-align: middle;" src="http://80.211.14.98/epergam2/<?php echo $level->photo_dir?>/<?php echo $level->photo?>" alt="<?php echo $level->name ?>" /></a>
			  <?php endforeach; ?> 
			  <?php if(!empty($document->url)): ?>
			  <a style="font-size: 1.5em;" target="_blank" href="<?= h($document->url) ?>"><?= h($document->name) ?></a>
			  <?php else: ?>
			  <font style="font-size: 1.5em"><?= h($document->name) ?></font>
			  <?php endif; ?><br>
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
		  </tr>
		  <tr><td>
			  <?php if($document->count_documents == 1):?>
			  <center>Prestat <b><?=$document->count_documents?></b> vegada
			  <?php elseif($document->count_documents == 0):?>
			  <center>No s'ha prestat mai
			  <?php else:?>
			  <center>Prestat <b><?=$document->count_documents?></b> vegades
			  <?php endif;?>
			  </center></td></tr>
        <?php endforeach; ?>
   </table>
    </div>
    
        <?php endif; ?>
	<div class="paginator">
		<table class="responsive-table">
			<tr>			
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
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
	</div>
</div>
