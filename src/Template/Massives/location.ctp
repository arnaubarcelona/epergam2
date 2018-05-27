<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Massife $massife
 */
?>
<div class="noudiv">
	<h3>Canvi massiu d'ubicació</h3>
    <?= $this->Form->create($massife) ?>
    <fieldset>
        <?php
            echo $this->Form->control('data', ['label' => 'Llista d\'ISBN:']);
            echo $this->Form->control('location_id', [
								'id' => 'locations',
								'label' => '',
								'type' => 'select',
								'style'=>'width:200px; margin:0',
								'class' => 'single_autocomplete',
								'options' => $locations,
								'empty' => false
							]);?><br><?php
            echo $this->Form->control('ignore_duplicate', ['label' => 'Si algun ISBN consta en diversos documents, fes el canvi a tots el documents amb aquest ISBN.']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
