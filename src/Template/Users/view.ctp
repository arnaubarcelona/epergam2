<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="noudiv">
      <h3><?= h($user->name) ?></h3>
      Prestar: <?php echo $this->Form->create(null);
					echo $this->Form->control('Document.id', [
						'id' => 'doccs',
						'label' => '',
						'type' => 'select',
						'style'=>'width:280px; padding: 5px; left-margin: 10px;',
						'class' => 'single_autocomplete',
						'options' => $documents,
						'empty' => true,
						'onchange' => 'lenddoc()'
					]);
				echo $this->Form->end(); ?>
				<br>
		<table class="responsive-table">
		<thead><tr>
			<th><center><?= __('Id') ?></th>
			<th><center><?= __('Created') ?></th>
			<th><center><?= __('Modified') ?></th>
		</tr></thead>
        <tr>
		    <td><center><?= $user->id ?></td>            
            <td><center><?= h($user->created) ?></td>            
            <td><center><?= h($user->modified) ?></td>
        </tr>
    </table>
    <?php if(count($pdocuments) != 0):?>
    <div class="related">
    <h4>Préstecs</h4>
    </div>
    	<div class="paginator">
		<table class="responsive-table">
		<tr>
		<td colspan="2"  style="height: 42px">
		<b>Ordena per:</b> <?= $this->Paginator->sort('name', 'Títol') ?> | <?= $this->Paginator->sort('format_id', 'Format') ?> | <?= $this->Paginator->sort('cdu_id', 'CDU') ?> | <?= $this->Paginator->sort('location_id', 'Ubicació') ?> | <?= $this->Paginator->sort('lending_state_id', 'Préstec') ?> | <?= $this->Paginator->sort('id') ?> | <?= $this->Paginator->sort('created', 'Data de registre') ?>
		</td>
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<?php $nummm = $this->Paginator->counter(['format' => '{{start}}'])?>
		<?php $nummm = str_replace('.','',$nummm)?>
		<?php $nummm = $nummm - 1?>
		<?php $total = count($pdocuments) ?>
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

    <div class="doscols">
		
    <?php foreach ($pdocuments as $documents): ?>
    <?php $nummm = $nummm + 1 ?>
    <table class="responsive-table">
		  <tr>
			<td rowspan="2" colspan="1" style="vertical-align: middle; text-align:center;">			  
			  <center><b><?= $nummm . ' / ' . $total ?></b></center><br>
			  <?php if (!empty($documents->photo_dir)): ?>
			  <img class="portada" width="80%" height="80%" src="http://80.211.14.98/epergam2/<?php echo $documents->photo_dir?>/thumbnail-<?php echo $documents->photo?>" alt="<?php echo $documents->name ?>" /></a>
			  <?php else: ?>
			  <?php if(!empty($documents->format)):?>
			  <img width="80%" height="80%" src="http://80.211.14.98/epergam2/<?php echo $documents->format->photo_dir?>/<?php echo $documents->format->photo?>" alt="<?php echo $documents->format->name ?>" /></a>
			  <?php endif;?> 
			  <?php endif;?> 
			  </td>        
		  <td colspan=4 style="font-size: 1.25em; font-weight: bold; text-align:left;">
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
			  <br><br><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/id.png"> <a href="http://80.211.14.98/epergam2/documents/edit/<?= h($documents->id) ?>"> <?= h($documents->id) ?></a></font></td>
		  </tr>
		  <tr>
		  <td colspan="4">
			<?php $lnum = count($documents->lendings)?>
			<?php $lfirst = true; ?>
				<?php if($lfirst):?>
				<!--#quan és 1#-->
					<?php if (!empty($documents->lendings)):?>
					  <?php foreach ($documents->lendings as $lending): ?>
					  <?php if($lending->user->id == $user->id):?>
						<?php if($lending->lending_state_id == 2 || $lending->lending_state_id == 3):?>
							<img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <a href="http://80.211.14.98/epergam2/lendings/return/<?php echo $documents->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>
						<?php else:?>
							<img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>
						<?php endif;?>
					 <?php else:?>
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
					  <?php if($lending->user->id == $user->id):?>		  
						<?php if($lending->lending_state_id == 2 || $lending->lending_state_id == 3):?>
							<br><img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <a href="http://80.211.14.98/epergam2/lendings/return/<?php echo $documents->id?>/<?php echo $lending->id?>/<?php echo $currurl?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/return.png"></a> <?= $lending->date_taken->i18nFormat('dd/MM/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>
						<?php else:?>
							<br><img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->lending_state->photo_dir?>/<?php echo $lending->lending_state->photo?>"> <img height="24" width="24" src="http://80.211.14.98/epergam2/<?php echo $lending->user->group->photo_dir?>/<?php echo $lending->user->group->photo?>"> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>
						<?php endif;?>
						<?php else:?>
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
    <br>
    	<div class="paginator">
		<table class="responsive-table">
		<tr>
		<td colspan="2"  style="height: 42px">
		<b>Ordena per:</b> <?= $this->Paginator->sort('name', 'Títol') ?> | <?= $this->Paginator->sort('format_id', 'Format') ?> | <?= $this->Paginator->sort('cdu_id', 'CDU') ?> | <?= $this->Paginator->sort('location_id', 'Ubicació') ?> | <?= $this->Paginator->sort('lending_state_id', 'Préstec') ?> | <?= $this->Paginator->sort('id') ?> | <?= $this->Paginator->sort('created', 'Data de registre') ?>
		</td>
		<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<?php $nummm = $this->Paginator->counter(['format' => '{{start}}'])?>
		<?php $nummm = str_replace('.','',$nummm)?>
		<?php $nummm = $nummm - 1?>
		<?php $total = count($user->documents) ?>
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
	<?php endif;?>
</div>
<script>
	 var userid = <?php echo json_encode($user->id); ?>;
	 var currurl = <?php echo json_encode($currurl); ?>;
function lenddoc() {
  window.location = 'http://80.211.14.98/epergam2/lendings/quickadd/' + document.getElementById("doccs").value + '/' + userid + '/' + currurl; // JQuery:  $("#menu").val();
}
</script>
