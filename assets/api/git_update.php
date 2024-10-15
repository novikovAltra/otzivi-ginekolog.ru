<?php
ini_set('display_errors', '1');
define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(__FILE__))).'/index.php';
// $modx->getService('error','error.modError');
// $modx->setLogLevel(modX::LOG_LEVEL_INFO);
// $modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

$response = array(
    'success' => false,
    'message' => '',
    'log' => ''
);
if (!isset($_REQUEST['package']) || !isset($_REQUEST['v'])) {
    $response['message'] = 'Непередан пакет или версия';
    die(json_encode($response));
}

$token = $modx->getOption('token');

if (!isset($_REQUEST['key']) || $token != $_REQUEST['key']) {
    $response['message'] = 'Неверный токен';
    die(json_encode($response));
}

//$modx->runProcessor('system/clearcache');
$modx->cacheManager->refresh();

if(!isset($_REQUEST['package']) || !$_REQUEST['package']){
    $response['message'] = 'Packege is required';
    die(json_encode($response));
}
if(!$_REQUEST['v']){
    $response['message'] = 'Version is required';
    die(json_encode($response));
}
if(!$_REQUEST['log_id']){
    $response['message'] = 'ID of record in log is required';
    die(json_encode($response));
}

// Что-то делаем
switch($_REQUEST['package']){
    case 'loyalty':
        $path = '../pack_files/loyalty/';
        $repo = 'bitbucket.org/altravita_120/loyalty_client.git';
        break;
    case 'auth':
        $path = '../pack_files/auth/';
        $repo = 'bitbucket.org/altravita_120/auth.git';
        break;
    case 'crm':
        $path = '../pack_files/crm/';
        $repo = 'bitbucket.org/altravita_120/crm.git';
        break;
    case 'rating':
        $path = '../star_rating/';
        $repo = 'bitbucket.org/altravita_120/starrating.git';
        break;
    case 'api':
        $path = '../api/';
        $repo = 'bitbucket.org/altravita_120/api.git';
        break;
    case 'banners':
        $path = '../banners_altravita/';
        $repo = 'bitbucket.org/altravita_120/banners.git';
        break;
}

unset($_SESSION['shell_error']);

$shell = 'chmod +x git_update && ./git_update ' . $path . ' ' . $repo . ' ' . $_REQUEST['v'] . ' ' . $_REQUEST['log_id'];
if (isset($_REQUEST['shell_script']) && $_REQUEST['shell_script']) {
    $shell .= ' ' . $_REQUEST['shell_script'];
}
$response['log'] = shell_exec($shell);

if (isset($_SESSION['shell_error']) && isset($_SESSION['shell_error'])) {
    $response['success'] = false;
    $response['message'] = $_SESSION['shell_error'];
    die(json_encode($response));
}

$version_file = dirname(__FILE__) . '/' . $path . 'version.txt';
if (file_exists($version_file)) {
    $version = file_get_contents($version_file);
    if($version != $_REQUEST['v']){
        $response['message'] = 'Not updated to v.' . $_REQUEST['v'] . ' (current version ' . $version . ')';
        die(json_encode($response));
    }
    else{
        $response['success'] = true;
        $response['message'] = 'Successfull updated to version ' . $version;
    }
}
else{
    $response['message'] = 'Can not read version from ' . $version_file;
}
die(json_encode($response));
// $response['message'] = $response['success'] ? '' : 'Bad key';