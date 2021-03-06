<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
?>
<div class="noudiv">
    <?= $this->Form->create($document, ['type' => 'file']) ?>
    <fieldset>
        <h3><?= __('Edit Document') ?></h3>
        <a href="http://80.211.14.98/epergam2/documents/view/<?php echo $document->id?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/view.png"></a>
        <a target="_blank" href="<?php echo $document->url?>"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/url.png"></a>
        <a target="_blank" href="http://images.google.cat/search?tbm=isch&q=&quot;<?php echo $document->name ?>&quot;"><img height="24" width="24" src="http://80.211.14.98/epergam2/webroot/img/icons/google.png"></a><br><br><br>
       <?= $this->Form->button(__('Submit')) ?><br>
       <?php      
			?>Imatge<?php echo $this->Form->input('photo', ['label' =>'', 'type' => 'file']);
            ?>Format<?php echo $this->Form->control('format_id', ['label' =>'', 'options' => $formats, 'empty' => false, 'default' => 2]);
            ?>ISBN<?php echo $this->Form->control('isbn', ['label' =>'', 'onkeydown' => 'javascript:if (event.keyCode == 13){ return false; document.getElementById(\'isbn\').focus();}']);
            ?>Nom<?php echo $this->Form->control('name', ['label' =>'', 'empty' => false]);
            ?>Web<?php echo $this->Form->control('url', ['label' =>'', 'onkeydown' => 'javascript:if (event.keyCode == 13){ return false; document.getElementById(\'url\').focus();}']);
            ?>Autoria<?php echo $this->Form->control('authority_ids', [
				'label' =>'',
                'type' => 'select',
                'multiple' => true,
                'class' => 'multiple_autocomplete',
                'options' => $formattedAuthorities,
                'empty' => false
            ]);
            ?><br><?php
            ?>CDU<?php echo $this->Form->control('cdu_id', [
				'label' =>'',
                'type' => 'select',
                'class' => 'single_autocomplete',
                'options' => $formattedCdus,
                'empty' => false
            ]);?><br><?php
            ?>Nivells<?php echo $this->Form->control('levels._ids', ['label' =>'', 'options' => $levels, 'multiple' => 'checkbox', 'empty' => false]);
            ?><br><?php
            ?>Col·lecció<?php echo $this->Form->control('collection_id', [
				'label' =>'', 
                'type' => 'select',
                'class' => 'add_collection',
                'options' => $collections,
                'empty' => true
            ]);
            ?><br><?php
            ?>Número dins la col·lecció<?php echo $this->Form->control('collection_item', ['label' =>'', 'onkeydown' => 'javascript:if (event.keyCode == 13){ return false; document.getElementById(\'collection_item\').focus();}']);
            ?>Editorials<?php echo $this->Form->control('publishers._ids', [
                'label' =>'',
                'type' => 'select',
                'multiple' => true,
                'class' => 'check_publishers',
                'options' => $publishers,
                'empty' => false
            ]);?><br><?php
            ?>Lloc d'edició<?php echo $this->Form->control('publication_place_id', [
				'label' =>'',
                'type' => 'select',
                'class' => 'add_publicationPlace',
                'options' => $publicationPlaces,
                'empty' => true
            ]);
            ?><br>Data d'edició<?php echo $this->Form->text('edition_date', ['label' =>'', 'onkeydown' => 'javascript:if (event.keyCode == 13){ return false; document.getElementById(\'edition_date\').focus();}']);
            ?>Resum<?php echo $this->Form->control('abstract', ['label' => '']);
            ?>Notes<?php echo $this->Form->control('notes', ['label' => '']);
            ?>Amplada<?php echo $this->Form->text('width', ['label' =>'Amplada', 'onkeydown' => 'javascript:if (event.keyCode == 13){ return false; document.getElementById(\'width\').focus();}']);
            ?>Alçada<?php echo $this->Form->text('height', ['label' =>'', 'onkeydown' => 'javascript:if (event.keyCode == 13){ return false; document.getElementById(\'height\').focus();}']);
            ?>Número de pàgines<?php echo $this->Form->text('pagecount', ['label' =>'', 'onkeydown' => 'javascript:if (event.keyCode == 13){ return false; document.getElementById(\'pagecount\').focus();}']);
            ?>Volum<?php echo $this->Form->text('volume', ['label' => 'Volum', 'onkeydown' => 'javascript:if (event.keyCode == 13){ return false; document.getElementById(\'isbn\').focus();}']);
            ?>Duració en minuts<?php echo $this->Form->text('length', ['label' => '', 'onkeydown' => 'javascript:if (event.keyCode == 13){ return false; document.getElementById(\'isbn\').focus();}']);
			?>Ubicació<?php  echo $this->Form->control('location_id', [
				'label' =>'',
                'type' => 'select',
                'class' => 'add_location',
                'options' => $locations,
                'empty' => false
            ]);?><br><?php
            ?>Estat de catalogació<?php echo $this->Form->control('catalogue_state_id', [
				'label' =>'', 
                'type' => 'select',
                'class' => 'single_autocomplete',
                'options' => $catalogueStates,
                'empty' => false
            ]);?><br><?php
            ?>Estat de conservació<?php echo $this->Form->control('conservation_state_id', [
                'label' =>'', 
                'type' => 'select',
                'class' => 'single_autocomplete',
                'options' => $conservationStates,
                'empty' => false
            ]);?><br><?php
            ?>Llengües<?php echo $this->Form->control('languages._ids', [
                'label' =>'', 
                'type' => 'select',
                'multiple' => true,
                'class' => 'check_languages',
                'options' => $languages,
                'empty' => false
            ]);?><br><?php
            ?>Matèries<?php echo $this->Form->control('subjects._ids', [
				'label' => '',
                'multiple' => true,
                'type' => 'select',
                'class' => 'check_subjects',
                'options' => $subjects,
                'empty' => false
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>



<script type="text/javascript">
    $(document).ready(function () {
        <?php if (!empty($selectedAuthorieties)) { ?>
        $('.multiple_autocomplete').val([<?= implode(',', array_values($selectedAuthorieties)) ?>]).trigger("change");
        <?php } ?>
    });
</script>
