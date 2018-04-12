<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending $lending
 */
?>

<div class="noudiv">
	<br><br><br><br>
    <?= $this->Form->create($lending) ?>
    <center><?= $this->Form->button(__('Presta')) ?>
    <?= $this->Form->end() ?>
</div>
