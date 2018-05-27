<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Massife $massife
 */
?>
<div class="noudiv">
	<h3>Devolució massiva</h3>
    <?= $this->Form->create($massife) ?>
    <fieldset>
        <?php
            echo $this->Form->control('data', ['label' => 'Llista d\'ISBN:']);
            echo $this->Form->control('ignore_duplicate', ['label' => 'Si algun ISBN consta en diversos documents, genera etiqueta de tots el documents amb aquest ISBN.']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
