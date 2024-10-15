<?php
define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/index.php';
$modx->getService('error','error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

if(isset($_REQUEST['type']) && $_REQUEST['type']){
    $type = $_REQUEST['type'];
}else{return;}
if(!isset($_REQUEST['phone']) || !$_REQUEST['phone'] || $_REQUEST['lastname'] || !isset($_REQUEST['nobot']) || $_REQUEST['nobot'] !== '1'){
    die(json_encode(array('success' => false, 'message'=>'Не все обязательные поля заполнены')));
}


if(strpos($_REQUEST['phone'], '@') !== false){
    $_REQUEST['email'] = $_REQUEST['phone'];
    $_REQUEST['phone'] = false;
}


$pls = array(
    'name' => $_REQUEST['name'] ? $_REQUEST['name'] : '',
    'phone' => $_REQUEST['phone'] ? $_REQUEST['phone'] : '',
    'email' => $_REQUEST['email'] ? $_REQUEST['email'] : '',
    'message' => $_REQUEST['message'] ? $_REQUEST['message'] : '',
    'tpl' => 'calc_email',
    'url' => $_SERVER['HTTP_REFERER'],
);

switch ($type) {
    case "1":
        $pls['type'] = 'Заявка на бесплатный расчет стоимости';
        break;
    case "2":
        $pls['type'] = 'Заказ обратного звонка';
        break;
    case "3":
        $pls['type'] = 'Заявка на услугу';
        break;
    default:
        $pls['type'] = $_REQUEST['type'];
        break;
}
$message = $modx->getChunk($pls['tpl'], $pls);

 
$modx->getService('mail', 'mail.modPHPMailer');
$modx->mail->set(modMail::MAIL_BODY,$message);
$modx->mail->set(modMail::MAIL_FROM, $modx->getOption('emailsender'));
$modx->mail->set(modMail::MAIL_FROM_NAME,$pls['type']);
$modx->mail->set(modMail::MAIL_SUBJECT, $pls['type'] . ' ('.$modx->getOption('site_name').') - '.$modx->getOption('site_url'));

$value_email = $modx->getOption('mail_to');
$arr_email = json_decode($value_email, true);

if(array_key_exists($_REQUEST['form_id'], $arr_email)){
    $emails = explode(',', $arr_email[$_REQUEST['form_id']]);
} else {
    $emails = explode(',', $arr_email['default']);
}
//$modx->mail->address('to', 'test@w-come.net');
foreach($emails as $email) {
    $modx->mail->address('to', $email);
}
$modx->mail->setHTML(true);
if (!$modx->mail->send()) {
    $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$modx->mail->mailer->ErrorInfo);
}
$modx->mail->reset();

require_once(MODX_ASSETS_PATH . 'pack_files/crm/crm.php'); 

die(json_encode(array('success'=>'true', 'message' => '<h2>Спасибо за заявку!</h2><p>Ваша заявка отправлена менеджеру, в ближайшее время мы с Вами свяжемся.</p>')));
