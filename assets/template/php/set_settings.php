<?php
define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/index.php';
$modx->getService('error','error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

$response = array(
    'success' => false,
    'message' => ''
);
$paramsArray = array(
    'google_analitics' => 'google_analytics',
    'google_webmaster' => 'google_webmaster',
    'liveinternet' => 'live_internet',
    'ya_metrica' => 'yandex_metrika',
    'ya_webmaster' => 'yandex_webmaster',
    'email_to' => 'mail_to',
    'email_from' => 'emailsender',
    'site_name' => 'site_name'
);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_POST['key'] != $modx->getOption('token')){
        $response['message'] = 'Auth error';
        die(json_encode($response));
    }
    foreach($paramsArray as $key => $item){
        if (isset($_POST[$key]) /*&& $_POST[$item]*/){
            if ($modx->getOption($item)){
                $res = $modx->getObject('modSystemSetting',array('key'=> $item));
                $res->set('value', $_POST[$key]);
                $res->save();
                $response['success'] = true;
            }
        }
    }
    $response['success'] ? '' : $response['message'] = 'Bad key';
    $modx->cacheManager->clearCache();
}
die(json_encode($response));