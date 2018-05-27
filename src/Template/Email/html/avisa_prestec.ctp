<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="noudiv">
      <h3><?= h($user->name) ?></h3>
    <?php if(count($pdocuments) != 0):?>
    Benvolguda família,<br><br>
    A l'escola ens consta que aquest/a alumne/a encara té en préstec el(s) document(s) que us detallem a continuació. De ser així, us agraïríem que en feu el retorn el més aviat possible. I, si es tracta d'un error, si us plau feu-nos-ho saber contestant aquest correu o bé trucant a l'escola al 932030935.
    <br><br>
    Moltes gràcies!
    <br><br><br>
    <div class="noudiv">
	<?php $numpages = $this->Paginator->counter(['format' => '{{pages}}']) ?>
		<?php $nummm = $this->Paginator->counter(['format' => '{{start}}'])?>
		<?php $nummm = str_replace('.','',$nummm)?>
		<?php $nummm = $nummm - 1?>
		<?php $total = count($pdocuments) ?>
    <?php foreach ($pdocuments as $documents): ?>
    <?php $nummm = $nummm + 1 ?>
    <table class="responsive-table">
		  <tr>
			<td style="vertical-align: middle; text-align:center; cursor:pointer" onclick="window.location='http://80.211.14.98/epergam2/documents/view/<?php echo $documents->id ?>'">			  
			  <center><b><?= $nummm . ' / ' . $total ?></b></center><br>
			  <?php if (!empty($documents->photo_dir)): ?>
			  <img class="portada" style="max-width: 150px; max-height: 150px" src="http://80.211.14.98/epergam2/<?php echo $documents->photo_dir?>/thumbnail-<?php echo $documents->photo?>" alt="<?php echo $documents->name ?>" />
			  <?php else: ?>
			  <?php if(!empty($documents->format)):?>
			  <img style="max-width: 150px; max-height: 150px" src="http://80.211.14.98/epergam2/<?php echo $documents->format->photo_dir?>/<?php echo $documents->format->photo?>" alt="<?php echo $documents->format->name ?>" />
			  <?php endif;?> 
			  <?php endif;?>
			  <br>
			  </td></tr><tr>      
		  <td colspan=4 style="font-size: 1.25em; text-align:left; cursor:pointer">
			  <br>
			  <?php foreach ($documents->levels as $level): ?>
			  <?php endforeach; ?> 
			  <?php if(!empty($documents->url)): ?>
			  <b><?= h($documents->name) ?></b>
			  <?php else: ?>
			  <b><?= h($documents->name) ?></b>
			  <?php endif; ?>
			  <font style="font-size: 0.75em;">
			  <?php if (!empty($documents->authorities)): ?>
						<?php $num = count($documents->authorities)?>
						<?php if($num == 1):?>
							<?php foreach ($documents->authorities as $authority): ?>
							<br>
							<?php echo $authority->author->name ?>
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
							  else{$result .= $key . "; ";}
							}?>
							<?php if(substr($result, -10) == "; [et al.]"):?>
						    <?php echo $result = rtrim($result, "; [et al.]") . " [et al.]" ?>
						    <?php else: ?>
						  <?php echo rtrim($result,'; '); ?>
						 <?php endif;?>
						<?php endif; ?>
			  <?php else: ?>
			  <br>Autoria desconeguda
			  <?php endif;?><br></td>
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
							<b>Data en què es va fer el préstec:</b> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>
						<?php else:?>
							<b>Dates de préstec: </b><?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>
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
							<br><b>Data en què es va fer el préstec: </b> <?= $lending->date_taken->i18nFormat('dd/MM/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>
						<?php else:?>
							<br><b>Dates de préstec: </b> <?= $lending->date_taken->i18nFormat('d/M/YYYY')?><?php if(!empty($lending->date_real_return)):?> - <?= $lending->date_real_return->i18nFormat('d/M/YYYY')?><?php endif;?>
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
			<br>
			<br>
   
        <?php endforeach; ?>
			
    </div>
    <br>
	<?php endif;?>
</div>
<script>
	 var userid = <?php echo json_encode($user->id); ?>;
	 var currurl = <?php echo json_encode($currurl); ?>;
function lenddoc() {
  window.location = 'http://80.211.14.98/epergam2/lendings/quickadd/' + document.getElementById("doccs").value + '/' + userid + '/' + currurl; // JQuery:  $("#menu").val();
}
</script>
