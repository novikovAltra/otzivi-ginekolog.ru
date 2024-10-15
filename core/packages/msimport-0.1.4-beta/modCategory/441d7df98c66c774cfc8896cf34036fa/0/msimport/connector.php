<?php
/**
 * Connector
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$namespace = $modx->getObject('modNamespace', 'msimport');
$corePath = str_replace("{core_path}",$modx->getOption('core_path'),$namespace->get('path'));

//echo $corePath;
require_once $corePath.'model/msimport/msImport.class.php';
$modx->msImport = new msImport($modx);

/* handle request */
$path = $modx->getOption('processorsPath', $modx->msImport->config, $corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));
?>