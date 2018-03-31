<br>
<div class="languages view large-12 medium-8 columns content">
    <h3><?php $this->loadHelper('Custom');?><?= $this->Custom->viewLanguage($language->photo_dir, $language->photo, null) ?> <?= __('Documents') ?> en <?= h($language->name) ?></h3>
		<table class="responsive-table">
		<thead><tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
		</tr></thead>
        <tr>
		    <td><?= $this->Number->format($language->id) ?></td>            
            <td><?= h($language->created) ?></td>            
            <td><?= h($language->modified) ?></td>
        </tr>
    </table>	
<div class="paginator">
		<table class="responsive-table">
		<tr>
		<td colspan="2" style="height: 42px">
		<a href="http://127.0.0.1/epergam2/languages/pdfcompactview/<?php echo $language->id?>.pdf"><img width="24" height="24" src="http://127.0.0.1/epergam2/webroot/img/icons/printer.png"> </b></a><a href="http://127.0.0.1/epergam2/languages/view/<?php echo $language->id?>"><b>Llista detallada</b></a> | <b>Ordena per:</b> <?= $this->Paginator->sort('name', 'Títol') ?> | <?= $this->Paginator->sort('format_id', 'Format') ?> | <?= $this->Paginator->sort('cdu_id', 'CDU') ?> | <?= $this->Paginator->sort('location_id', 'Ubicació') ?> | <?= $this->Paginator->sort('lending_state_id', 'Préstec') ?> | <?= $this->Paginator->sort('id') ?> | <?= $this->Paginator->sort('created', 'Data de registre') ?>
		</td>
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<td colspan="2">
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
		<?php $total = $this->Paginator->counter(['format' => '{{count}}']) ?>
	</div>
<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<?php $nummm = $this->Paginator->counter(['format' => '{{start}}'])?>
		<?php $nummm = str_replace('.','',$nummm)?>
		<?php $nummm = $nummm - 1?>
<?php if (!empty($language->documents)): ?>
<div class="related">
<table class="responsive-table">
    <?php foreach ($pdocuments as $documents): ?>
    <?php $nummm = $nummm + 1 ?>    
		  <tr>  
			  <td colspan="1" style="text-align:center; cursor: pointer;" onclick="window.location='http://127.0.0.1/epergam2/documents/view/<?php echo $documents->id ?>'">
				  <?php if(strlen($nummm)==1):?>
			  <b><a href="http://127.0.0.1/epergam2/documents/view/<?php echo $documents->id ?>"><?= $nummm ?> / <?php echo count($language->documents)?></a></b> &emsp;&emsp;
			  <?php elseif(strlen($nummm)==2):?>
			  <b><a href="http://127.0.0.1/epergam2/documents/view/<?php echo $documents->id ?>"><?= $nummm ?> / <?php echo count($language->documents)?></a></b>&emsp;&emsp;
			  <?php elseif(strlen($nummm)==3):?>
			  <b><a href="http://127.0.0.1/epergam2/documents/view/<?php echo $documents->id ?>"><?= $nummm ?> / <?php echo count($language->documents)?></a></b> &emsp;
			  <?php elseif(strlen($nummm)==4):?>
			  <b><a href="http://127.0.0.1/epergam2/documents/view/<?php echo $documents->id ?>"><?= $nummm ?> / <?php echo count($language->documents)?></a></b>&emsp;
			  <?php endif;?>
			  &emsp;
			  <?php if(strlen($documents->id)==1):?>
			  <img height="24" width="24" src="http://127.0.0.1/epergam2/webroot/img/icons/id.png"> <a href="http://127.0.0.1/epergam2/documents/edit/<?= h($documents->id) ?>"> <?= h($documents->id) ?></a> &emsp;&emsp;
			  <?php elseif(strlen($documents->id)==2):?>
			  <img height="24" width="24" src="http://127.0.0.1/epergam2/webroot/img/icons/id.png"> <a href="http://127.0.0.1/epergam2/documents/edit/<?= h($documents->id) ?>"> <?= h($documents->id) ?></a>&emsp;&emsp;
			  <?php elseif(strlen($documents->id)==3):?>
			  <img height="24" width="24" src="http://127.0.0.1/epergam2/webroot/img/icons/id.png"> <a href="http://127.0.0.1/epergam2/documents/edit/<?= h($documents->id) ?>"> <?= h($documents->id) ?></a> &emsp;
			  <?php elseif(strlen($documents->id)==4):?>
			  <img height="24" width="24" src="http://127.0.0.1/epergam2/webroot/img/icons/id.png"> <a href="http://127.0.0.1/epergam2/documents/edit/<?= h($documents->id) ?>"> <?= h($documents->id) ?></a>&emsp;
			  <?php endif;?>
			  &emsp;
			  
			  
			  
			  
			  <img height="24" width="24" src="http://127.0.0.1/epergam2/<?php echo $documents->lending_state->photo_dir?>/<?php echo $documents->lending_state->photo?>"> 
			  <?php if($documents->lending_state_id == 6):?>
			  <img height="24" width="24" src="http://127.0.0.1/epergam2/<?php echo $documents->catalogue_state->photo_dir?>/<?php echo $documents->catalogue_state->photo?>"> 
			  <?php endif; ?>
			  <?php if($documents->lending_state_id == 1):?>
			  			  <?= $this->Html->link($this->Html->image('/webroot/img/icons/loan.png', ['height' => '24', 'width' => '24']), ['controller' => 'Lendings', 'action' => 'add', $documents->id, $currurl], ['escape' => false]) ?>
			  <?php endif;?>
			  
			  <?php if($documents->lending_state_id == 6):?>
			   
			   <?php endif; ?>
		  
		  
			<?php $lnum = count($documents->lendings)?>
			<?php $lfirst = true; ?>
				<?php if($lfirst):?>
				<!--#quan és 1#-->
					<?php if (!empty($documents->lendings)):?>
					  <?php foreach ($documents->lendings as $lending): ?>
						<?php if($lending->lending_state_id == 2 || $lending->lending_state_id == 3):?>
							<a href="http://127.0.0.1/epergam2/lendings/return/<?php echo $documents->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://127.0.0.1/epergam2/webroot/img/icons/return.png"></a>
						<?php else:?>
							
						<?php endif;?>
					  <?php endforeach;?>
					<?php else:?>
					  
					<?php endif; ?>
				<!--#quan és 1#-->
				<?php else: ?>
				<!--#quan és més d'1#-->
					<?php if (!empty($documents->lendings)):?>
					  <?php foreach ($documents->lendings as $lending): ?>			  
						<?php if($lending->lending_state_id == 2 || $lending->lending_state_id == 3):?>
							<a href="http://127.0.0.1/epergam2/lendings/return/<?php echo $documents->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://127.0.0.1/epergam2/webroot/img/icons/return.png"></a><br>
						<?php else:?>
							
						<?php endif;?>
					  <?php endforeach;?>
					<?php else:?>
					 
					<?php endif; ?>
				<!--#quan és més d'1#-->
				<?php endif;?>
			  
			  
			  
			  
			  </td>  
		  <td colspan=5 style="font-size: 1em; font-weight: bold; cursor: pointer;" onclick="window.location='http://127.0.0.1/epergam2/documents/view/<?php echo $documents->id ?>'">
			  <?php foreach ($documents->levels as $level): ?>
			  <img height="12" width="12" src="http://127.0.0.1/epergam2/<?php echo $level->photo_dir?>/<?php echo $level->photo?>" alt="<?php echo $level->name ?>" /></a>
			  <?php endforeach; ?> 
			  <?php if(!empty($documents->url)): ?>
			  <a target="_blank" href="http://<?= h($documents->url) ?>"><?= h($documents->name) ?></a>
			  <?php else: ?>
			  <?= h($documents->name) ?>
			  <?php endif; ?>
			  <font style="font-size: 1em">
			  <?php if (!empty($documents->authorities)): ?>
						<?php $num = count($documents->authorities)?>
						<?php if($num == 1):?>
							<?php foreach ($documents->authorities as $authority): ?>
							<br>
							<a href="http://127.0.0.1/epergam2/authors/view/<?php echo $authority->author->id?>"><?php echo $authority->author->name ?>
							<?php $autor = $authority->author->name ?>
							<?php endforeach;?>
						<?php else: ?>
						  <?php $auts = array(); ?>
						  <?php $first = true; ?>
						  <?php foreach ($documents->authorities as $authority): ?>
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
							  else{$result .= "<a href=" . "http://127.0.0.1/epergam2/authors/view/" . $value .">". $key. "</a>; ";}
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
        <?php endforeach; ?>
   </table>
    </div>
    
        <?php endif; ?>
	<div class="paginator">
		<table class="responsive-table">
		<tr>
		<td colspan="2"  style="height: 42px">
		<a href="http://127.0.0.1/epergam2/languages/compactview/<?php echo $language->id?>.pdf"><img width="24" height="24" src="http://127.0.0.1/epergam2/webroot/img/icons/printer.png"> </b></a><a href="http://127.0.0.1/epergam2/languages/view/<?php echo $language->id?>"><b>Llista detallada</b></a> | <b>Ordena per:</b> <?= $this->Paginator->sort('name', 'Títol') ?> | <?= $this->Paginator->sort('format_id', 'Format') ?> | <?= $this->Paginator->sort('cdu_id', 'CDU') ?> | <?= $this->Paginator->sort('location_id', 'Ubicació') ?> | <?= $this->Paginator->sort('lending_state_id', 'Préstec') ?> | <?= $this->Paginator->sort('id') ?> | <?= $this->Paginator->sort('created', 'Data de registre') ?>
		</td>
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<td colspan="2">
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
		<?php $total = $this->Paginator->counter(['format' => '{{count}}']) ?>
	</div>

</div>
