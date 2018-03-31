<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lending $lending
 */
?>

<div class="lendings form large-2 medium-8 columns content">
	<br><br><br><br>
    <?= $this->Form->create($lending) ?>
    <center><?= $this->Form->button(__('Retorna')) ?>
    <?= $this->Form->end() ?>
</div>
