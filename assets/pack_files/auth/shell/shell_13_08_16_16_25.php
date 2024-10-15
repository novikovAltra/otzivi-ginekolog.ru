<?php
define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/index.php';

if (!$chunk = $modx->getObject('modChunk', array('name' => 'tpl.Office.auth.reg.custom'))) {
    $_SESSION['shell_error'] = 'Ненайден чанк tpl.Office.auth.reg.custom';
    return;
}

$chunk->set('source', 1);
$chunk->set('static', 1);
$chunk->set('static_file', 'assets/pack_files/auth/elements/chunk.tpl.Office.auth.reg.custom.php');

if (!$chunk->save()) {
    $_SESSION['shell_error'] = 'Неудалось сохранить изменения в чанке tpl.Office.auth.reg.custom';
    return;
}