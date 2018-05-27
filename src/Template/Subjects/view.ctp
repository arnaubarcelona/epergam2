<br>
<div class="noudiv">
    <h3><?= __('Documents') ?> sobre <?= h($subject->name) ?></h3>
		<table class="responsive-table">
		<thead><tr>
			<th><center><?= __('Id') ?></th>
			<th><center><?= __('Created') ?></th>
			<th><center><?= __('Modified') ?></th>
		</tr></thead>
        <tr>
			<?php $oldsubject = $subject->id?>
		    <td><center><?= $subject->id ?></td>            
            <td><center><?= h($subject->created->i18nFormat('d/M/YYYY hh:mm')) ?></td>            
            <td><center><?= h($subject->modified->i18nFormat('d/M/YYYY hh:mm')) ?></td>
        </tr>
    </table>
	<div class="paginator">
		<table class="responsive-table">
		<tr>
		<td colspan="2"  style="height: 42px">
		<a href="http://80.211.14.98/epergam2/subjects/compactview/<?php echo $subject->id?>"><b>Llista compacta</b></a> | <b>Ordena per:</b> <?= $this->Paginator->sort('name', 'Títol') ?> | <?= $this->Paginator->sort('format_id', 'Format') ?> | <?= $this->Paginator->sort('cdu_id', 'CDU') ?> | <?= $this->Paginator->sort('location_id', 'Ubicació') ?> | <?= $this->Paginator->sort('lending_state_id', 'Préstec') ?> | <?= $this->Paginator->sort('id') ?> | <?= $this->Paginator->sort('created', 'Data de registre') ?>
		</td>
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<?php $nummm = $this->Paginator->counter(['format' => '{{start}}'])?>
		<?php $nummm = str_replace('.','',$nummm)?>
		<?php $nummm = $nummm - 1?>
		<?php $total = count($subject->documents) ?>
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
		
	</div>
<?php if (!empty($subject->documents)): ?>
<div class="related">
    <?php foreach ($pdocuments as $documents): ?>
    <?php $nummm = $nummm + 1 ?>
    <table class="responsive-table">
		  <tr>
			<td rowspan="9" colspan="1" style="vertical-align: middle; text-align:center;">			  
			  <center><b><?= $nummm . ' / ' . $total ?></b></center><br>
			  <?php if (!empty($documents->photo_dir)): ?>
			  <img class="portada" width="80%" height="80%" src="http://80.211.14.98/epergam2/<?php echo $documents->photo_dir?>/thumbnail-<?php echo $documents->photo?>" alt="<?php echo $documents->name ?>" /></a>
			  <?php else: ?>
			  <?php if(!empty($documents->format)):?>
			  <img width="80%" height="80%" src="http://80.211.14.98/epergam2/<?php echo $documents->format->photo_dir?>/<?php echo $documents->format->photo?>" alt="<?php echo $documents->format->name ?>" /></a>
			  <?php endif;?> 
			  <?php endif;?> 
			  </td>        
		  <td colspan=4 style="font-size: 1.25em; font-weight: bold;">
			  <?php foreach ($documents->levels as $level): ?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $level->photo_dir?>/<?php echo $level->photo?>" alt="<?php echo $level->name ?>" /></a>
			  <?php endforeach; ?> 
			  <?php if(!empty($documents->url)): ?>
			  <a target="_blank" href="http://<?= h($documents->url) ?>"><?= h($documents->name) ?></a>
			  <?php else: ?>
			  <?= h($documents->name) ?>
			  <?php endif; ?>
			  <font style="font-size: 0.75em; font-weight: bold;">
			  <?php if (!empty($documents->authorities)): ?>
						<?php $num = count($documents->authorities)?>
						<?php if($num == 1):?>
							<?php foreach ($documents->authorities as $authority): ?>
							<br>
							<a href="http://80.211.14.98/epergam2/authors/view/<?php echo $authority->author->id?>"><?php echo $authority->author->name ?>
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
		  <tr>
			  <td colspan="2">
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a href="http://80.211.14.98/epergam2/documents/edit/<?= h($documents->id) ?>"> <?= h($documents->id) ?></a>
			  &emsp;
			  <?php if (!empty($documents->isbn)): ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/isbn.png"> <?= h($documents->isbn) ?>
				<?php else: ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/isbn.png"> [ISBN desconegut]
				<?php endif; ?>
				</td>
				<td colspan="2">
			  <a target="_blank" href="http://www.google.cat/search?q=&quot;<?php echo $documents->name ?>&quot;+<?php echo $autor ?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/google.png"></a>
			 
			  &emsp; &emsp; &emsp;
			  <?php if(!empty($documents->format)):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $documents->format->photo_dir?>/<?php echo $documents->format->photo?>" alt="<?php echo $documents->format->name ?>" /></a>
			  <?php endif;?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $documents->conservation_state->photo_dir?>/<?php echo $documents->conservation_state->photo?>" alt="<?php echo $documents->conservation_state->name ?>" /></a>
			  &emsp;&emsp;&emsp;
			  <?php foreach ($documents->languages as $subject): ?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $subject->photo_dir?>/<?php echo $subject->photo?>" alt="<?php echo $subject->name ?>" /></a>
			  <?php endforeach; ?>			  
			  </td>
		  </tr>
		  
		  <tr>
			<td colspan="2">
				<?php if (!empty($document->collection_id)): ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/collection.png">
				 <?php echo $document->collection->name; ?><br>
				<?php endif;?>
				<?php if (!empty($documents->publishers)): ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/editorial.png">
				<?php $pubs = array(); ?>
				<?php foreach ($documents->publishers as $publisher): ?>
					<?php $pubs += array(h($publisher->name) => h($publisher->id)) ?>
				<?php endforeach; ?>
				<?php $pubresult="";?>
						  <?php foreach($pubs as $pkey => $pvalue) {
							  $pubresult .= "<a href=" . "http://80.211.14.98/epergam2/publishers/view/" . $pvalue .">". $pkey. "</a>; ";}
							?>
				<?php echo rtrim($pubresult,'; '); ?>
				<?php else: ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/editorial.png"> [Editorial desconeguda]
				<?php endif; ?>
				<br>
				<?php 	if(empty($documents->publication_place->name)): ?>
							<?php if(empty($documents->edition_date)): ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/edition_place.png"> [Data i lloc d'edició desconeguda]
							<?php else: ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/edition_date.png"> <?= h($documents->edition_date) ?>
							<?php endif; ?>
						<?php else: ?>
							<?php if(empty($documents->edition_date)): ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/edition_place.png"> <?= h($documents->publication_place->name) ?>, <?= h($documents->publication_place->country->name) ?>
							<?php else: ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/edition_place.png"> <?= h($documents->publication_place->name) ?>, <?= h($documents->publication_place->country->name) ?> (<?= h($documents->edition_date) ?>)
							<?php endif; ?>
						<?php endif; ?>				
			</td>
			<td colspan="2">
				<?php if (!empty($documents->cdus->name)): ?>
					<?php if(substr($autor, 0, 10) == "Desconegut"): ?>
					<?php $autor = $documents->name ?>
					<?php endif; ?>
					
					
					<?php $primer = true;?>
					<?php foreach ($documents->authorities as $authority): ?>
					<?php if($primer):?>
					<?php $autor = $authority->author->name ?>
					<?php $primer = false;?>
					<?php endif;?>
					<?php endforeach;?>
					
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/cdu.png"> <a href="http://80.211.14.98/epergam2/cdus/view/<?= $documents->cdus->id ?>"><b><?= h($documents->cdus->name) ?> <?= mb_convert_case(mb_substr($autor, 0, 3), MB_CASE_UPPER, "UTF-8") ?></b> - <?= h($documents->cdus->description) ?></a>
				<?php else: ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/cdu.png"> [CDU desconeguda]
				<?php endif; ?>
				<br>
				
			</td>
		  </tr>
		  <tr>
			  <td colspan="2">
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/location.png"> <a href="http://80.211.14.98/epergam2/locations/view/<?= h($documents->location->id) ?>"><?= h($documents->location->name) ?>
				</td>
			<td colspan="2">
				<?php 	if(empty($documents->width)): ?>
							<?php if(empty($documents->height)): ?>
							<?php else: ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/height.png"> <?= h($documents->height) ?> cm.&emsp;
							<?php endif; ?>
						<?php else: ?>
							<?php if(empty($documents->edition_date)): ?>
							<?php else: ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/height.png"> <?= h($documents->height) ?> cm.&emsp;<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/width.png"> <?= h($documents->width) ?> cm.&emsp;
							<?php endif; ?>
						<?php endif; ?>	
				
				<?php if (!empty($documents->length)): ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/length.png"> <?= h($documents->length) ?> min.
				<?php else: ?>
				<?php endif; ?>
				<?php if (!empty($documents->pagecount)): ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/pagecount.png"> <?= h($documents->pagecount) ?> pàgs.
				<?php else: ?>
				<?php endif; ?>
			</td>
			<tr>
			<td colspan="4">
			<?php if (!empty($documents->subjects)): ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/subjects.png">
				<?php $subs = array(); ?>
				<?php foreach ($documents->subjects as $subject): ?>
					<?php $subs += array(h($subject->name) => h($subject->id)) ?>
				<?php endforeach; ?>
				<?php $subresult="";?>
						  <?php foreach($subs as $skey => $svalue) {
							  $subresult .= "<a href=" . "http://80.211.14.98/epergam2/subjects/view/" . $svalue .">". $skey. "</a>; ";}
							?>
				<?php echo rtrim($subresult,'; '); ?>
				<?php else: ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/subjects.png"> [Matèria desconeguda]<br>
				<?php endif; ?>
			</td>
			</tr>
			  <tr>
				<td colspan="4">
					<?php if(!empty($documents->abstract)): ?>
					<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/abstract.png"> <?= h($documents->abstract) ?>
					<?php else: ?>
					<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/abstract.png"> Sense sinopsi.
					<?php endif; ?>
					</td>
			  </tr>
		  
		  
		  <tr>
			  
			  <td colspan="4">
					<?php if(!empty($documents->notes)): ?>
					<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/notes.png"> <?= h($documents->notes) ?>
					<?php else: ?>
					<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/notes.png"> Sense anotacions.
					<?php endif; ?>
			  </td>
		  </tr>
		  <tr>
		  <td colspan="4">
			  <!--  'fotos_usuaris' 'afegir currl als views amb llibres' -->
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $documents->lending_state->photo_dir?>/<?php echo $documents->lending_state->photo?>"> 
			  <?php if($documents->lending_state_id == 6):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $documents->catalogue_state->photo_dir?>/<?php echo $documents->catalogue_state->photo?>"> 
			  <?php endif; ?>
			  <?php if($documents->lending_state_id == 1):?>
			  			  <?= $this->Html->link($this->Html->image('/webroot/img/icons/loan.png', ['height' => '24', 'width' => '24']), ['controller' => 'Lendings', 'action' => 'add', $documents->id, $currurl], ['escape' => false]) ?>
			  <?php endif;?>
			  <?php echo $documents->lending_state->name ?>
			  <?php if($documents->lending_state_id == 6):?>
			   (<?php echo $documents->catalogue_state->name ?>)
			   <?php endif; ?>
		  </td>
		  </tr>
		  <tr>
		  <td colspan="4">
			<?php $lnum = count($documents->lendings)?>
			<?php $lfirst = true; ?>
				<?php if($lfirst):?>
				<!--#quan és 1#-->
					<?php if (!empty($documents->lendings)):?>
					  <?php foreach ($documents->lendings as $lending): ?>
						<?php if($lending->lending_state_id == 2 || $lending->lending_state_id == 3):?>
							<img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <a href="http://80.211.14.98/epergam2/lendings/return/<?php echo $documents->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?><?php $session = $this->request->session(); $user_data = $session->read('Auth.User')?>
							<?php if(!empty($user_data)):?>: <a href="http://80.211.14.98/epergam2/users/view/<?= $lending->user->id ?>"><?= $lending->user->name?></a><?php endif;?><br>
						<?php else:?>
							<img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?><?php if(!empty($user_data)):?>: <a href="http://80.211.14.98/epergam2/users/view/<?= $lending->user->id ?>"><?= $lending->user->name?></a><?php endif;?><br>
						<?php endif;?>
					  <?php endforeach;?>
					<?php else:?>
					  <img src="http://80.211.14.98/epergam2/webroot/img/LendingStates/zoTI7B0drb/lentend.png" width=24" height="24"> [Encara no s'ha prestat mai]
					<?php endif; ?>
				<!--#quan és 1#-->
				<?php else: ?>
				<!--#quan és més d'1#-->
					<?php if (!empty($documents->lendings)):?>
					  <?php foreach ($documents->lendings as $lending): ?>			  
						<?php if($lending->lending_state_id == 2 || $lending->lending_state_id == 3):?>
							<br><img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <a href="http://80.211.14.98/epergam2/lendings/return/<?php echo $documents->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?><?php if(!empty($user_data)):?>: <a href="http://80.211.14.98/epergam2/users/view/<?= $lending->user->id ?>"><?= $lending->user->name?></a><?php endif;?>
						<?php else:?>
							<br><img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?><?php if(!empty($user_data)):?>: <a href="http://80.211.14.98/epergam2/users/view/<?= $lending->user->id ?>"><?= $lending->user->name?></a><?php endif;?>
						<?php endif;?>
					  <?php endforeach;?>
					<?php else:?>
					  <img src="http://80.211.14.98/epergam2/webroot/img/LendingStates/zoTI7B0drb/lentend.png" width=24" height="24"> [Encara no s'ha prestat mai]
					<?php endif; ?>
				<!--#quan és més d'1#-->
				<?php endif;?>
		  </td>
		  </tr>
			</table>
   
        <?php endforeach; ?>
			
    </div>
    
        <?php endif; ?>
	<div class="paginator">
		<table class="responsive-table">
		<tr>
		<td colspan="2" style="height: 42px">
		<a href="http://80.211.14.98/epergam2/subjects/compactview/<?php echo $oldsubject?>"><b>Llista compacta</b></a> | <b>Ordena per:</b> <?= $this->Paginator->sort('name', 'Títol') ?> | <?= $this->Paginator->sort('format_id', 'Format') ?> | <?= $this->Paginator->sort('cdu_id', 'CDU') ?> | <?= $this->Paginator->sort('location_id', 'Ubicació') ?> | <?= $this->Paginator->sort('lending_state_id', 'Préstec') ?> | <?= $this->Paginator->sort('id') ?> | <?= $this->Paginator->sort('created', 'Data de registre') ?>
		</td>
		
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
</div>
