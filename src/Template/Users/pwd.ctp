<div class="noudiv">
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __('Canviar la contrasenya') ?></legend>
    <?= $this->Form->input('old_password',['type' => 'password' , 'label'=>'Contrasenya actual'])?>
    <?= $this->Form->input('password1',['type'=>'password' ,'label'=>'Nova contrasenya']) ?>
    <?= $this->Form->input('password2',['type' => 'password' , 'label'=>'Un altre cop'])?>
</fieldset>
<?= $this->Form->button(__('Desa')) ?>
<?= $this->Form->end() ?>
