<?php
/**
 * ms2gallery build script
 *
 * @package ms2gallery
 * @subpackage build
 */
$mtime = microtime();
$mtime = explode(' ', $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0);

require_once 'build.config.php';
// Refresh model
if (file_exists('build.model.php')) {
	require_once 'build.model.php';
}

/* define sources */
$root = dirname(dirname(__FILE__)).'/';
$sources = array(
	'root' => $root,
	'build' => $root . '_build/',
	'data' => $root . '_build/data/',
	'resolvers' => $root . '_build/resolvers/',
	'chunks' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/chunks/',
	'snippets' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/snippets/',
	'plugins' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/plugins/',
	'lexicon' => $root . 'core/components/'.PKG_NAME_LOWER.'/lexicon/',
	'docs' => $root.'core/components/'.PKG_NAME_LOWER.'/docs/',
	'pages' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/pages/',
	'source_assets' => $root.'assets/components/'.PKG_NAME_LOWER,
	'source_core' => $root.'core/components/'.PKG_NAME_LOWER,
);
unset($root);

require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
require_once $sources['build'] . '/includes/functions.php';

$modx= new modX();
$modx->initialize('mgr');
echo '<pre>'; /* used for nice formatting of log messages */
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');

$modx->loadClass('transport.modPackageBuilder','',false, true);
$builder = new modPackageBuilder($modx);
$builder->createPackage(PKG_NAME_LOWER,PKG_VERSION,PKG_RELEASE);
$builder->registerNamespace(PKG_NAME_LOWER,false,true,'{core_path}components/'.PKG_NAME_LOWER.'/');
$modx->log(modX::LOG_LEVEL_INFO,'Created Transport Package and Namespace.');

/* load system settings */
$settings = include $sources['data'].'transport.settings.php';
if (!is_array($settings)) {
	$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in settings.');
} else {
	$attributes= array(
		xPDOTransport::UNIQUE_KEY => 'key',
		xPDOTransport::PRESERVE_KEYS => true,
		xPDOTransport::UPDATE_OBJECT => BUILD_SETTING_UPDATE,
	);
	foreach ($settings as $setting) {
		$vehicle = $builder->createVehicle($setting,$attributes);
		$builder->putVehicle($vehicle);
	}
	$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($settings).' System Settings.');
}
unset($settings,$setting,$attributes);

/* create category */
$modx->log(xPDO::LOG_LEVEL_INFO,'Created category.');
/* @var modCategory $category */
$category= $modx->newObject('modCategory');
$category->set('id',1);
$category->set('category',PKG_NAME);

/* add snippets */
$snippets = include $sources['data'].'transport.snippets.php';
if (!is_array($snippets)) {
	$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in snippets.');
} else {
	$category->addMany($snippets);
	$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($snippets).' snippets.');
}

/* add chunks */
$chunks = include $sources['data'].'transport.chunks.php';
if (!is_array($chunks)) {
	$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in chunks.');
} else {
	$category->addMany($chunks);
	$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($chunks).' chunks.');
}

/* add plugins */
$plugins = include $sources['data'].'transport.plugins.php';
if (!is_array($plugins)) {
	$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in plugins.');
} else {
	$category->addMany($plugins);
	$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($plugins).' plugins.');
}

/* create category vehicle */
$attr = array(
	xPDOTransport::UNIQUE_KEY => 'category',
	xPDOTransport::PRESERVE_KEYS => false,
	xPDOTransport::UPDATE_OBJECT => true,
	xPDOTransport::RELATED_OBJECTS => true,
	xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
		'Snippets' => array(
			xPDOTransport::PRESERVE_KEYS => false,
			xPDOTransport::UPDATE_OBJECT => BUILD_SNIPPET_UPDATE,
			xPDOTransport::UNIQUE_KEY => 'name',
		),
		'Chunks' => array (
			xPDOTransport::PRESERVE_KEYS => false,
			xPDOTransport::UPDATE_OBJECT => BUILD_CHUNK_UPDATE,
			xPDOTransport::UNIQUE_KEY => 'name',
		),
		'Plugins' => array (
			xPDOTransport::PRESERVE_KEYS => false,
			xPDOTransport::UPDATE_OBJECT => BUILD_PLUGIN_UPDATE,
			xPDOTransport::UNIQUE_KEY => 'name',
		),
		'PluginEvents' => array (
			xPDOTransport::PRESERVE_KEYS => true,
			xPDOTransport::UPDATE_OBJECT => BUILD_EVENT_UPDATE,
			xPDOTransport::UNIQUE_KEY => array('pluginid','event'),
		),
	),
);
$vehicle = $builder->createVehicle($category,$attr);

/* now pack in resolvers */
$vehicle->resolve('file',array(
	'source' => $sources['source_assets'],
	'target' => "return MODX_ASSETS_PATH . 'components/';",
));
$vehicle->resolve('file',array(
	'source' => $sources['source_core'],
	'target' => "return MODX_CORE_PATH . 'components/';",
));

foreach ($BUILD_RESOLVERS as $resolver) {
	if ($vehicle->resolve('php', array('source' => $sources['resolvers'] . 'resolve.'.$resolver.'.php'))) {
		$modx->log(modX::LOG_LEVEL_INFO,'Added resolver "'.$resolver.'" to category.');
	}
	else {
		$modx->log(modX::LOG_LEVEL_INFO,'Could not add resolver "'.$resolver.'" to category.');
	}
}

flush();
$builder->putVehicle($vehicle);

/* now pack in the license file, readme and setup options */
$builder->setPackageAttributes(array(
	'changelog' => file_get_contents($sources['docs'] . 'changelog.txt'),
	'license' => file_get_contents($sources['docs'] . 'license.txt'),
	'readme' => file_get_contents($sources['docs'] . 'readme.txt'),
	'chunks' => $BUILD_CHUNKS,
	'setup-options' => array(
		'source' => $sources['build'].'setup.options.php',
	),
));

$modx->log(modX::LOG_LEVEL_INFO,'Added package attributes and setup options.');

/* zip up package */
$modx->log(modX::LOG_LEVEL_INFO,'Packing up transport package zip...');
$builder->pack();
$modx->log(modX::LOG_LEVEL_INFO,"\n<br />Package Built.<br />");

$mtime= microtime();
$mtime= explode(" ", $mtime);
$mtime= $mtime[1] + $mtime[0];
$tend= $mtime;
$totalTime= ($tend - $tstart);
$totalTime= sprintf("%2.4f s", $totalTime);

$signature = $builder->getSignature();
if (defined('PKG_AUTO_INSTALL') && PKG_AUTO_INSTALL) {
	$sig = explode('-',$signature);
	$versionSignature = explode('.',$sig[1]);

	/* @var modTransportPackage $package */
	if (!$package = $modx->getObject('transport.modTransportPackage', array('signature' => $signature))) {
		$package = $modx->newObject('transport.modTransportPackage');
		$package->set('signature', $signature);
		$package->fromArray(array(
			'created' => date('Y-m-d h:i:s'),
			'updated' => null,
			'state' => 1,
			'workspace' => 1,
			'provider' => 0,
			'source' => $signature.'.transport.zip',
			'package_name' => $sig[0],
			'version_major' => $versionSignature[0],
			'version_minor' => !empty($versionSignature[1]) ? $versionSignature[1] : 0,
			'version_patch' => !empty($versionSignature[2]) ? $versionSignature[2] : 0,
		));
		if (!empty($sig[2])) {
			$r = preg_split('/([0-9]+)/',$sig[2],-1,PREG_SPLIT_DELIM_CAPTURE);
			if (is_array($r) && !empty($r)) {
				$package->set('release',$r[0]);
				$package->set('release_index',(isset($r[1]) ? $r[1] : '0'));
			} else {
				$package->set('release',$sig[2]);
			}
		}
		$package->save();
	}
	$package->install();
}
if (!empty($_GET['download'])) {
	echo '<script>document.location.href = "/core/packages/' . $signature.'.transport.zip' . '";</script>';
}

$modx->log(modX::LOG_LEVEL_INFO,"\n<br />Execution time: {$totalTime}\n");
echo '</pre>';