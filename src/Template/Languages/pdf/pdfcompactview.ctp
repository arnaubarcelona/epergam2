    <h3><img height="32" width="32" src="http://80.211.14.98/epergam2/<?php echo $language->photo_dir?>/<?php echo $language->photo?>">  <?= __('Documents') ?> en <?= h($language->name) ?></h3>
	
		<?php $nummm = 0 ?>
<?php if (!empty($language->documents)): ?>
<table>
    <?php foreach ($pdocuments as $documents): ?>
    <?php $nummm = $nummm + 1 ?>    
		  <tr>  
			  <td width="250px" style="text-align:left;">
				  &emsp;
				  <?php if(strlen($nummm)==1):?>
			  <b><a href="../../documents/view/<?php echo $documents->id ?>"><?= $nummm ?> / <?php echo count($language->documents)?></a></b> &emsp;&emsp;
			  <?php elseif(strlen($nummm)==2):?>
			  <b><a href="../../documents/view/<?php echo $documents->id ?>"><?= $nummm ?> / <?php echo count($language->documents)?></a></b>&emsp;&emsp;
			  <?php elseif(strlen($nummm)==3):?>
			  <b><a href="../../documents/view/<?php echo $documents->id ?>"><?= $nummm ?> / <?php echo count($language->documents)?></a></b> &emsp;
			  <?php elseif(strlen($nummm)==4):?>
			  <b><a href="../../documents/view/<?php echo $documents->id ?>"><?= $nummm ?> / <?php echo count($language->documents)?></a></b>&emsp;
			  <?php endif;?>
			  
			  <?php if(strlen($documents->id)==1):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a href="../../documents/edit/<?= h($documents->id) ?>"> <?= h($documents->id) ?></a> &emsp;&emsp;
			  <?php elseif(strlen($documents->id)==2):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a href="../../documents/edit/<?= h($documents->id) ?>"> <?= h($documents->id) ?></a>&emsp;&emsp;
			  <?php elseif(strlen($documents->id)==3):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a href="../../documents/edit/<?= h($documents->id) ?>"> <?= h($documents->id) ?></a> &emsp;
			  <?php elseif(strlen($documents->id)==4):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a href="../../documents/edit/<?= h($documents->id) ?>"> <?= h($documents->id) ?></a>&emsp;
			  <?php endif;?>
			 
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $documents->lending_state->photo_dir?>/<?php echo $documents->lending_state->photo?>"> 
			  <?php if($documents->lending_state_id == 6):?>
			  <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $documents->catalogue_state->photo_dir?>/<?php echo $documents->catalogue_state->photo?>"> 
			  <?php endif; ?>
			  <?php if($documents->lending_state_id == 1):?>
			  <a href="../../lendings/add/<?= $documents->id?>/<?= $currurl ?>"><img src="http://80.211.14.98/epergam2/webroot/img/icons/loan.png" height="24" width="24"></a>
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
							<a href="../../lendings/return/<?php echo $documents->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a>
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
							<a href="../../lendings/return/<?php echo $documents->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a><br>
						<?php else:?>
							
						<?php endif;?>
					  <?php endforeach;?>
					<?php else:?>
					 
					<?php endif; ?>
				<!--#quan és més d'1#-->
				<?php endif;?></td>  
		  <td width="750px" style="font-size: 1em; font-weight: bold; cursor: pointer;" onclick="window.location='../../documents/view/<?php echo $documents->id ?>'">
			  <?php foreach ($documents->levels as $level): ?>
			  <img height="12" width="12" src="http://80.211.14.98/epergam2/<?php echo $level->photo_dir?>/<?php echo $level->photo?>" alt="<?php echo $level->name ?>" /></a>
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
							<a href="../../authors/view/<?php echo $authority->author->id?>"><?php echo $authority->author->name ?>
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
							  else{$result .= "<a href=" . "../../authors/view/" . $value .">". $key. "</a>; ";}
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
    
        <?php endif; ?>

