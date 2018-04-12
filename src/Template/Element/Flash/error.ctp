<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="notificacio" onclick="this.classList.add('hidden')"><table height="100%" style="background-color: crimson;"><tr height="100%"><td style="vertical-align: middle; color: white; font-size: 18px;"><center><img src="http://80.211.14.98/epergam2/webroot/img/icons/error.png" height="128" width="128"></img><br><br><br><?= $message ?></center></td></tr></table></span></div>
