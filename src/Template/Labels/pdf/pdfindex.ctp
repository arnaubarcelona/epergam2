<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Label $label
 */
?>
<?php $num = 0 ?>
<table class="labels">
	<?php foreach($labels as $label):?>
	<?php $num = $num + 1 ?>
	<?php if($num == 1):?>
		<tr class="labels"><td class="labels"><font face="arial">escola orlandai</font><br><br><font style="font-family: 'webfontregular'">*<?=$label->document_id?>*</font></td>
	<?php elseif($num % 5 == 0):?>
		<td class="labels"><font face="arial">escola orlandai</font><br><br><font style="font-family: 'webfontregular'">*<?=$label->document_id?>*</font></td></tr><tr class="labels">
	<?php else:?>
		<td class="labels"><font face="arial">escola orlandai</font><br><br><font style="font-family: 'webfontregular'">*<?=$label->document_id?>*</font></td>
	<?php endif;?>
	<?php endforeach;?>
</table>
