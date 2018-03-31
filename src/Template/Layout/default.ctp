<!DOCTYPE html>

<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <img width="24px" height="24px" src="http://127.0.0.1/epergam2/webroot/img/icons/epergam.png"> <font style="font-size:1.0625rem;line-height:2.8125rem;margin:0;color:white;"><b>ePergam 2</b></a></font>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
				<li> <?php $session = $this->request->session();
				$user_data = $session->read('Auth.User');
				if(!empty($user_data)){
				echo $user_data['name'];
				}?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
