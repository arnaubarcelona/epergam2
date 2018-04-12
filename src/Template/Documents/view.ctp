<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
?>

<div class="noudiv">
    <table class="responsive-table">
		  <tr>
			<td rowspan="9" colspan="1" style="vertical-align: middle; text-align:center;">		
			  <?php if (!empty($document->photo_dir)): ?>
			  <img class="portada" width="80%" height="80%" src="http://80.211.14.98/epergam2/<?php echo $document->photo_dir?>/thumbnail-<?php echo $document->photo?>" alt="<?php echo $document->name ?>" /></a>
			  <?php else: ?>
			  <?php if(!empty($document->format)):?>
			  <img width="80%" height="80%" src="http://80.211.14.98/epergam2/<?php echo $document->format->photo_dir?>/<?php echo $document->format->photo?>" alt="<?php echo $document->format->name ?>" /></a>
			  <?php endif;?> 
			  <?php endif;?> 
			  </td>        
		  <td colspan=4 style="font-size: 1.25em; font-weight: bold;">
			  <?php foreach ($document->levels as $level): ?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $level->photo_dir?>/<?php echo $level->photo?>" alt="<?php echo $level->name ?>" /></a>
			  <?php endforeach; ?> 
			  <?php if(!empty($document->url)): ?>
			  <a target="_blank" href="http://<?= h($document->url) ?>"><?= h($document->name) ?></a>
			  <?php else: ?>
			  <?= h($document->name) ?>
			  <?php endif; ?>
			  <font style="font-size: 0.75em; font-weight: bold;">
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
		  <tr>
			  <td colspan="2">
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a href="http://80.211.14.98/epergam2/documents/edit/<?= h($document->id) ?>"> <?= h($document->id) ?></a>
			  &emsp;
			  <?php if (!empty($document->isbn)): ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/isbn.png"> <?= h($document->isbn) ?>
				<?php else: ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/isbn.png"> [ISBN desconegut]
				<?php endif; ?>
				</td>
				<td colspan="2">
			  <a target="_blank" href="http://www.google.cat/search?q=&quot;<?php echo $document->name ?>&quot;+<?php echo $autor ?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/google.png"></a>
			 
			  &emsp; &emsp; &emsp;
			  <?php if(!empty($document->format)):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $document->format->photo_dir?>/<?php echo $document->format->photo?>" alt="<?php echo $document->format->name ?>" /></a>
			  <?php endif;?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $document->conservation_state->photo_dir?>/<?php echo $document->conservation_state->photo?>" alt="<?php echo $document->conservation_state->name ?>" /></a>
			  &emsp;&emsp;&emsp;
			  <?php foreach ($document->languages as $language): ?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $language->photo_dir?>/<?php echo $language->photo?>" alt="<?php echo $language->name ?>" /></a>
			  <?php endforeach; ?>			  
			  </td>
		  </tr>
		  
		  <tr>
			<td colspan="2">
				<?php if (!empty($document->publishers)): ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/editorial.png">
				<?php $pubs = array(); ?>
				<?php foreach ($document->publishers as $publisher): ?>
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
				<?php 	if(empty($document->publication_place->name)): ?>
							<?php if(empty($document->edition_date)): ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/edition_place.png"> [Data i lloc d'edició desconeguda]
							<?php else: ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/edition_date.png"> <?= h($document->edition_date) ?>
							<?php endif; ?>
						<?php else: ?>
							<?php if(empty($document->edition_date)): ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/edition_place.png"> <?= h($document->publication_place->name) ?>, <?= h($document->publication_place->country->name) ?>
							<?php else: ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/edition_place.png"> <?= h($document->publication_place->name) ?>, <?= h($document->publication_place->country->name) ?> (<?= h($document->edition_date) ?>)
							<?php endif; ?>
						<?php endif; ?>				
			</td>
			<td colspan="2">
				<?php if (!empty($document->cdus->name)): ?>
					<?php if(substr($autor, 0, 10) == "Desconegut"): ?>
					<?php $autor = $document->name ?>
					<?php endif; ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/cdu.png"> <a href="http://80.211.14.98/epergam2/cdus/view/<?= $document->cdus->id ?>"><b><?= h($document->cdus->name) ?> <?= mb_convert_case(mb_substr($autor, 0, 3), MB_CASE_UPPER, "UTF-8") ?></b> - <?= h($document->cdus->description) ?></a>
				<?php else: ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/cdu.png"> [CDU desconeguda]
				<?php endif; ?>
				<br>
				
			</td>
		  </tr>
		  <tr>
			  <td colspan="2">
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/location.png"> <a href="http://80.211.14.98/epergam2/locations/view/<?= h($document->location->id) ?>"><?= h($document->location->name) ?>
				</td>
			<td colspan="2">
				<?php 	if(empty($document->width)): ?>
							<?php if(empty($document->height)): ?>
							<?php else: ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/height.png"> <?= h($document->height) ?> cm.&emsp;
							<?php endif; ?>
						<?php else: ?>
							<?php if(empty($document->edition_date)): ?>
							<?php else: ?>
								<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/height.png"> <?= h($document->height) ?> cm.&emsp;<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/width.png"> <?= h($document->width) ?> cm.&emsp;
							<?php endif; ?>
						<?php endif; ?>	
				
				<?php if (!empty($document->length)): ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/length.png"> <?= h($document->length) ?> min.
				<?php else: ?>
				<?php endif; ?>
				<?php if (!empty($document->pagecount)): ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/pagecount.png"> <?= h($document->pagecount) ?> pàgs.
				<?php else: ?>
				<?php endif; ?>
			</td>
			<tr>
			<td colspan="4">
			<?php if (!empty($document->subjects)): ?>
				<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/subjects.png">
				<?php $subs = array(); ?>
				<?php foreach ($document->subjects as $subject): ?>
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
					<?php if(!empty($document->abstract)): ?>
					<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/abstract.png"> <?= h($document->abstract) ?>
					<?php else: ?>
					<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/abstract.png"> Sense sinopsi.
					<?php endif; ?>
					</td>
			  </tr>
		  
		  
		  <tr>
			  
			  <td colspan="4">
					<?php if(!empty($document->notes)): ?>
					<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/notes.png"> <?= h($document->notes) ?>
					<?php else: ?>
					<img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/notes.png"> Sense anotacions.
					<?php endif; ?>
			  </td>
		  </tr>
		  <tr>
		  <td colspan="4">
			  <!--  'fotos_usuaris' 'afegir currl als views amb llibres' -->
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $document->lending_state->photo_dir?>/<?php echo $document->lending_state->photo?>"> 
			  <?php if($document->lending_state_id == 6):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $document->catalogue_state->photo_dir?>/<?php echo $document->catalogue_state->photo?>"> 
			  <?php endif; ?>
			  <?php if($document->lending_state_id == 1):?>
			  			  <?= $this->Html->link($this->Html->image('/webroot/img/icons/loan.png', ['height' => '24', 'width' => '24']), ['controller' => 'Lendings', 'action' => 'add', $document->id, $currurl], ['escape' => false]) ?>
			  <?php endif;?>
			  <?php echo $document->lending_state->name ?>
			  <?php if($document->lending_state_id == 6):?>
			   (<?php echo $document->catalogue_state->name ?>)
			   <?php endif; ?>
		  </td>
		  </tr>
		  <tr>
		  <td colspan="4">
			<?php $lnum = count($document->lendings)?>
			<?php $lfirst = true; ?>
				<?php if($lfirst):?>
				<!--#quan és 1#-->
					<?php if (!empty($document->lendings)):?>
					  <?php foreach ($document->lendings as $lending): ?>
						<?php if($lending->lending_state_id == 2 || $lending->lending_state_id == 3):?>
							<img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <a href="http://80.211.14.98/epergam2/lendings/return/<?php echo $document->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>: <a href="http://80.211.14.98/epergam2/users/view/<?= $lending->user->id ?>"><?= $lending->user->name?></a><br>
						<?php else:?>
							<img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>: <a href="http://80.211.14.98/epergam2/users/view/<?= $lending->user->id ?>"><?= $lending->user->name?></a><br>
						<?php endif;?>
					  <?php endforeach;?>
					<?php else:?>
					  <img src="http://80.211.14.98/epergam2/webroot/img/LendingStates/zoTI7B0drb/lentend.png" width=24" height="24"> [Encara no s'ha prestat mai]
					<?php endif; ?>
				<!--#quan és 1#-->
				<?php else: ?>
				<!--#quan és més d'1#-->
					<?php if (!empty($document->lendings)):?>
					  <?php foreach ($document->lendings as $lending): ?>			  
						<?php if($lending->lending_state_id == 2 || $lending->lending_state_id == 3):?>
							<br><img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <a href="http://80.211.14.98/epergam2/lendings/return/<?php echo $document->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>: <a href="http://80.211.14.98/epergam2/users/view/<?= $lending->user->id ?>"><?= $lending->user->name?></a>
						<?php else:?>
							<br><img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>: <a href="http://80.211.14.98/epergam2/users/view/<?= $lending->user->id ?>"><?= $lending->user->name?></a>
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
</div>
