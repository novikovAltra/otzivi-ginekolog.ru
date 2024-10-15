<?php
$modx->regClientStartupScript($msImport->config['jsUrl'].'fileupload.js');
$modx->regClientStartupScript($msImport->config['jsUrl'].'home.js');
$modx->regClientStartupScript($msImport->config['jsUrl'].'panel.js');
$modx->regClientCSS($msImport->config['cssUrl'].'css.css');

$output = '<div id="importMgr-main-div"></div>';

return $output;

?>