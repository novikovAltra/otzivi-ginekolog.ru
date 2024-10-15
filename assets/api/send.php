<?php
define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(__FILE__))).'/index.php';
$modx->getService('error','error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

$response = array(
    'success' => false,
    'message' => '',
    'data' => []
);
$paramsArray = array(
    'google_analitics' => 'google_analytics',
    'google_webmaster' => 'google_webmaster',
    'liveinternet' => 'live_internet',
    'ya_metrica' => 'yandex_metrika',
    'ya_webmaster' => 'yandex_webmaster',
    'rambler_top100' => 'rambler_top100',
    'data_storage_url' => 'data_storage_url',
    'fb_pixel' => 'fb_pixel',
    'email_to' => 'mail_to',
    'email_from' => 'emailsender',
    'site_name' => 'site_name'
);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_POST['key'] != $modx->getOption('token')){
        $response['message'] = 'Auth error';
        die(json_encode($response));
    }
    $response['success'] = true;
    foreach($paramsArray as $key => $item) {
        $value = $modx->getOption($item);
        $response['data'][$key] = $value;
    }
}
die(json_encode($response));