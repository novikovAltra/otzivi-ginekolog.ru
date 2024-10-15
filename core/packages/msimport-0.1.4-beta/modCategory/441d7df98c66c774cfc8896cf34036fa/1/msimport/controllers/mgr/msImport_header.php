<?php
$modx->regClientStartupScript($msImport->config['jsUrl'].'main.js');
$modx->regClientStartupHTMLBlock('
<script type="text/javascript">
	Ext.onReady(function() {
		ImportMgr.config = '.$modx->toJSON($msImport->config).';
		ImportMgr.config.connector_url = "'.$msImport->config['connectorUrl'].'";
		ImportMgr.request = '.$modx->toJSON($_GET).';
		ImportMgr.dateFormat = "d.m.Y";
	});
</script>');

return '';

?>