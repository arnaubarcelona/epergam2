<center><table class="login">
	<tr><td><h1>Entra</td></tr>
	<tr><td>

<?= $this->Form->create() ?>

<?= $this->Form->control('username', ['label' => 'Nom d\'usuari']) ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Entra') ?>
<?= $this->Form->end() ?>

</td></tr></table>

