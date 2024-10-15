<?php
if ($user = $modx->getObject('modUser', 7)) {
	$modx->user = $user;
	$modx->user->addSessionContext('web');
}
return;
