<?php
/**
 * Star Rating snippet
 *
 * @package star_rating
 */

$config_path = MODX_ASSETS_PATH . 'star_rating/configs/';
if(isset($config_name) && $config_name && file_exists($config_path . $config_name . '.config.php')){
    $config = include($config_path . $config_name . '.config.php');
    if(is_array($config)){
        $scriptProperties = array_merge($scriptProperties, $config);
    }
}

require_once MODX_ASSETS_PATH . 'star_rating/ratingCustom.class.php';

$group_id = $scriptProperties['groupId'];
if(isset($_GET['group_id'])){
    $group_id = intval($_GET['group_id']);
    if(($group_id != $scriptProperties['groupId']) || !$scriptProperties['groupId'])
        return;
}


if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    ob_clean();
    
if(!$scriptProperties['starId'])
    $scriptProperties['starId'] = $modx->resource->id;
    
$snippetPath = $modx->getOption('core_path').'components/star_rating/';
$modx->addPackage('star_rating',$snippetPath.'model/');

$manager = $modx->getManager();
$manager->createObjectContainer('starRating');

// $starId = isset($scriptProperties['starId']) ? $scriptProperties['starId'] : null;
// $groupId = isset($scriptProperties['groupId']) ? $scriptProperties['groupId'] : '';

$c = $modx->newQuery('starRating');
$c->where(array('star_id' => $scriptProperties['starId']));
if ($scriptProperties['groupId'] != '')
    $c->where(array('group_id' => $scriptProperties['groupId']));

$starRating = $modx->getObject('starRating', $c);
if ($starRating == null) {
    $starRating = $modx->newObject('starRating');
    $starRating->set('star_id', $scriptProperties['starId']);
    $starRating->set('group_id', $scriptProperties['groupId']);
    $starRating->save();
}
$starRating->initialize();

/* parameters */
$starRating->setConfig($scriptProperties);

/* process star rating */
$starRating->loadTheme();

$groupIdCheck = isset($_GET['group_id']) && $starRating->get('group_id') != $group_id ? false : true;

if (isset($_GET['vote']) && isset($_GET['star_id']) && $starRating->get('star_id') == $_GET['star_id'] && $groupIdCheck) {
    $starRating->setVote($_GET['vote']);
    $starRating->addVote();
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')
        $modx->sendRedirect($starRating->getRedirectUrl());
}
	
// $modx->regClientScript('<script>
//     $(\'.star-rating-' . $theme . '\').wrap( "<div class=\'star-rating-wrapp\'></div>" )
// </script>', true);
$modx->regClientScript('assets/star_rating/js/script.js');
$modx->regClientCSS('assets/star_rating/css/style.css');


if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    print ratingCustom::renderVote($starRating, $modx, $scriptProperties);
    exit();
}
return ratingCustom::renderVote($starRating, $modx, $scriptProperties);