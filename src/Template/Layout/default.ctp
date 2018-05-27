<!DOCTYPE html>

<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        ePergam 2
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('select2.min.css') ?>

    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('select2.min.js') ?>
    <?= $this->Html->script('main.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

<style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
</style>

</head>
<body style="padding-bottom: 20px;">  
		<div id="mySidenav" class="sidenav">
		  <ul>
		  <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<li><a href="http://80.211.14.98/epergam2/documents/novetats"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/new.png">&emsp;Novetats</a>
			<li><a href="http://80.211.14.98/epergam2/documents/populars"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/heart.png">&emsp;Els més prestats</a>
		  <li><a href="http://80.211.14.98/epergam2/pages/search"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/search.png">&emsp;Cerca</a>		  
		  <li><a href="#"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/loan.png">&emsp;Préstecs</a>
		  <ul>
		  <li><a href="http://80.211.14.98/epergam2/lendings/index"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/lent.png">&emsp;Vigents</a>
		  <li><a href="http://80.211.14.98/epergam2/lendings/doneindex"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/lentend.png">&emsp;Finalitzats</a>
		  </ul>
		  <li><a href="http://80.211.14.98/epergam2/documents/add"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/add.png">&emsp;Afegeix document</a>
		  <li><a href="http://80.211.14.98/epergam2/massives/location"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/move.png">&emsp;Canvi massiu d'ubicació</a>
		  <li><a href="http://80.211.14.98/epergam2/massives/labels"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/labels.png">&emsp;Generació d'etiquetes</a>
		  </ul>
		</div>
		
		<div id="myRSidenav" class="rsidenav">
		  <ul>
		  <li><a href="javascript:void(0)" class="closebtn" onclick="closeRNav()">&times;</a>
		  <span class="fadehide" style="color: white; font-size: 14px;"><b><?php $session = $this->request->session(); $user_data = $session->read('Auth.User')?><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/logged.png">&emsp;<?php echo $user_data['name']?></b></span>
		  <li><a href="http://80.211.14.98/epergam2/users/logout"><img src="http://80.211.14.98/epergam2/webroot/img/icons/logout.png" width="24px" height="24px">&emsp;Surt</img></a>
		  <li><a href="http://80.211.14.98/epergam2/users/pwd"><img src="http://80.211.14.98/epergam2/webroot/img/icons/pwd.png" width="24px" height="24px">&emsp;Canvia la contrasenya</img></a>
		  </ul>
		</div>
		
		<div id="myRRSidenav" class="rsidenav">
		  <ul>
		  <li><a href="javascript:void(0)" class="closebtn" onclick="closeRRNav()">&times;</a>
		  <li><a href="http://80.211.14.98/epergam2/users/login"><img src="http://80.211.14.98/epergam2/webroot/img/icons/login.png" width="24px" height="24px">&emsp;Entra</img></a>
		  </ul>
		</div>

		<!-- Use any element to open the sidenav -->
	<div class="topbar">
			<table class="barra" style="background: darkcyan;"><tr><td>
		<span onclick="openNav()"><button class="resetbtn"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/epergam.png"><span class="fadeshow"> ePergam2</span></button></span>
		</td>		
		<td style="color: white; font-weight: bold;"><center>
			<?php if(!empty($user_data)):?>
			<div class="fadeshow"><a style="color: white; font-weight: bold;" href="http://80.211.14.98/epergam2/users"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/search.png"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/users.png"> Usuaris/es</a><?php echo $this->Form->create(null);
							echo $this->Form->control('id', [
								'id' => 'users',
								'label' => '',
								'type' => 'select',
								'style'=>'width:200px; margin:0',
								'class' => 'single_autocomplete',
								'options' => $users,
								'empty' => true,
								'onchange' => 'viewuser()'
							]);
						echo $this->Form->end();?></div></td><td style="color: white; font-weight: bold;"><center>
		<?php endif;?>
						<div class="fadeshow">
						<a style="color: white; font-weight: bold;" href="http://80.211.14.98/epergam2/documents"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/search.png"><img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/books.png"> Documents</a><?php echo $this->Form->create(null);
							echo $this->Form->control('Document.id', [
								'id' => 'docs',
								'label' => '',
								'type' => 'select',
								'style'=>'width:200px;',
								'class' => 'single_autocomplete',
								'options' => $docs,
								'empty' => true,
								'onchange' => 'viewdoc()'
							]);
						echo $this->Form->end(); ?>
						</div></td>
						<td style="text-align:right;">
			<?php $session = $this->request->session(); $user_data = $session->read('Auth.User')?>
			<?php if(!empty($user_data)):?>
			<span onclick="openRNav()"><button class="resetbtn">
			<img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/logged.png"><span class="fadeshow"> <?php echo $user_data['name']?></span></span>
			<?php else:?>
			<span onclick="openRRNav()">
			<button class="resetbtn">
			<img width="24px" height="24px" src="http://80.211.14.98/epergam2/webroot/img/icons/notlogged.png"><span class="fadeshow"> Visitant</span>
			</span>
			<?php endif;?>
		</td></tr></table>
	</div>         
  

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function openRNav() {
    document.getElementById("myRSidenav").style.width = "250px";
}

function openRRNav() {
    document.getElementById("myRRSidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
} 

function closeRNav() {
    document.getElementById("myRSidenav").style.width = "0";
} 

function closeRRNav() {
    document.getElementById("myRRSidenav").style.width = "0";
} 

function viewuser() {
  window.location = 'http://80.211.14.98/epergam2/users/view/' + document.getElementById("users").value; // JQuery:  $("#menu").val();
}
function viewdoc() {
  window.location = 'http://80.211.14.98/epergam2/documents/view/' + document.getElementById("docs").value; // JQuery:  $("#menu").val();
}
	
</script>
        
    <?= $this->Flash->render() ?>
    <div>
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>
