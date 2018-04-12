<div class="lendings index large-9 medium-8 columns content">
<h3>Cerca</h3>
<table class="responsive-table" style="width:600px">
<tr><td><a href="http://80.211.14.98/epergam2/documents/index"><img src="http://80.211.14.98/epergam2/webroot/img/icons/index.png" width="24px" height="24px"> Documents</a></td>
<td colspan="2"><?php echo $this->Form->create(null);
					echo $this->Form->control('Document.id', [
						'id' => 'docus',
						'label' => '',
						'type' => 'select',
						'style'=>'width:300px; padding: 5px; left-margin: 10px;',
						'class' => 'single_autocomplete',
						'options' => $documents,
						'empty' => true,
						'onchange' => 'viewdoc()'
					]);
echo $this->Form->end(); ?></td></tr>
<tr><td><a href="http://80.211.14.98/epergam2/users/index"><img src="http://80.211.14.98/epergam2/webroot/img/icons/index.png" width="24px" height="24px"> Usuaris/es</a></td>
<td colspan="2"><?php echo $this->Form->create(null);
					echo $this->Form->control('User.id', [
						'id' => 'usuaris',
						'label' => '',
						'type' => 'select',
						'style'=>'width:300px; padding: 5px; left-margin: 10px;',
						'class' => 'single_autocomplete',
						'options' => $users,
						'empty' => true,
						'onchange' => 'viewuser()'
					]);
echo $this->Form->end(); ?></td></tr>
<td><a href="http://80.211.14.98/epergam2/authors/index"><img src="http://80.211.14.98/epergam2/webroot/img/icons/index.png" width="24px" height="24px"> Autors/es</a></td>
<td colspan="2"><?php echo $this->Form->create(null);
					echo $this->Form->control('Author.id', [
						'id' => 'autors',
						'label' => '',
						'type' => 'select',
						'style'=>'width:300px; padding: 5px; left-margin: 10px;',
						'class' => 'single_autocomplete',
						'options' => $authors,
						'empty' => true,
						'onchange' => 'viewauthor()'
					]);
echo $this->Form->end(); ?></td></tr>
<tr><td><a href="http://80.211.14.98/epergam2/subjects/index"><img src="http://80.211.14.98/epergam2/webroot/img/icons/index.png" width="24px" height="24px"> Matèries</a></td>
<td colspan="2"><?php echo $this->Form->create(null);
					echo $this->Form->control('Subject.id', [
						'id' => 'materies',
						'label' => '',
						'type' => 'select',
						'style'=>'width:300px; padding: 5px; left-margin: 10px;',
						'class' => 'single_autocomplete',
						'options' => $subjects,
						'empty' => true,
						'onchange' => 'viewsubject()'
					]);
echo $this->Form->end(); ?></td></tr>
<tr><td><a href="http://80.211.14.98/epergam2/languages/index"><img src="http://80.211.14.98/epergam2/webroot/img/icons/index.png" width="24px" height="24px"> Llengües</td>
<td colspan="2"><?php echo $this->Form->create(null);
					echo $this->Form->control('Language.id', [
						'id' => 'llengues',
						'label' => '',
						'type' => 'select',
						'style'=>'width:300px; padding: 5px; left-margin: 10px;',
						'class' => 'single_autocomplete',
						'options' => $languages,
						'empty' => true,
						'onchange' => 'viewlanguage()'
					]);
echo $this->Form->end(); ?></td></tr>
</table>

<script>

function viewuser() {
  window.location = 'http://80.211.14.98/epergam2/users/view/' + document.getElementById("usuaris").value; // JQuery:  $("#menu").val();
}
function viewdoc() {
  window.location = 'http://80.211.14.98/epergam2/documents/view/' + document.getElementById("docus").value; // JQuery:  $("#menu").val();
}
function viewauthor() {
  window.location = 'http://80.211.14.98/epergam2/authors/view/' + document.getElementById("autors").value; // JQuery:  $("#menu").val();
}
function viewsubject() {
  window.location = 'http://80.211.14.98/epergam2/subjects/view/' + document.getElementById("materies").value; // JQuery:  $("#menu").val();
}
function viewlanguage() {
  window.location = 'http://80.211.14.98/epergam2/languages/view/' + document.getElementById("llengues").value; // JQuery:  $("#menu").val();
}
</script>
