<div class="noudiv">
<center><table class="login">
	<tr><td><h1>Entra</td></tr>
	<tr><td onkeydown="javascript:if (event.keyCode == 13){ document.getElementById('password').focus(); return false;}">

<?= $this->Form->create() ?>

<?= $this->Form->control('username', ['label' => 'Nom d\'usuari']) ?></td>
<tr><td 
<?= $this->Form->control('password') ?></td><tr><td>
<?= $this->Form->button('Entra') ?></td></tr><tr><td>
<?= $this->Form->end() ?>

</td></tr></table>
</div>
<script>

</script>
