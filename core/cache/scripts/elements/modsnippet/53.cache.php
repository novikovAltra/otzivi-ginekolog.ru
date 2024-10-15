<?php  return '
$default = array(
    "show_banner_on_main" => 1,
    "show_banner_on_article" => 1
);
$config = require(MODX_ASSETS_PATH . \'banners_altravita/config.php\');
$modx->setPlaceholders(array_merge($default, $config));
$modx->regClientCSS(MODX_ASSETS_URL . \'banners_altravita/style.css\');
return;
return;
';