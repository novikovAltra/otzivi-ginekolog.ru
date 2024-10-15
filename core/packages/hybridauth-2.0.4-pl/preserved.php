<?php return array (
  'e3176237f2964b7bbe59ff6d2506ceb8' => 
  array (
    'criteria' => 
    array (
      'name' => 'hybridauth',
    ),
    'object' => 
    array (
      'name' => 'hybridauth',
      'path' => '{core_path}components/hybridauth/',
      'assets_path' => '',
    ),
  ),
  '3d04f6e317c25c777a27282d6550b459' => 
  array (
    'criteria' => 
    array (
      'key' => 'ha.keys.Yandex',
    ),
    'object' => 
    array (
      'key' => 'ha.keys.Yandex',
      'value' => '{"id":"12345","secret":"12345"}',
      'xtype' => 'textfield',
      'namespace' => 'hybridauth',
      'area' => 'ha.keys',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '75581bba5ff4a467c6c3b85d5d50db0c' => 
  array (
    'criteria' => 
    array (
      'key' => 'ha.keys.Twitter',
    ),
    'object' => 
    array (
      'key' => 'ha.keys.Twitter',
      'value' => '{"key":"GEkP9xEzCZU2yooYbE9Ltbmmr","secret":"GGB0rChclVimeAnGWor46ZOILl1foifTNUetKQX9otdh2Zvlc6"}',
      'xtype' => 'textfield',
      'namespace' => 'hybridauth',
      'area' => 'ha.keys',
      'editedon' => '2016-09-05 13:48:02',
    ),
  ),
  '4d4d7dcd39eafe0a998a50b5959f2f27' => 
  array (
    'criteria' => 
    array (
      'key' => 'ha.keys.Google',
    ),
    'object' => 
    array (
      'key' => 'ha.keys.Google',
      'value' => '{"id":"12345","secret":"12345"}',
      'xtype' => 'textfield',
      'namespace' => 'hybridauth',
      'area' => 'ha.keys',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  'efd858fb36f8477f2a2680182aa111af' => 
  array (
    'criteria' => 
    array (
      'key' => 'ha.keys.Facebook',
    ),
    'object' => 
    array (
      'key' => 'ha.keys.Facebook',
      'value' => '{"id":"498836130307308","secret":"e70b253aa8adb3903d4055806ce66dfd"}',
      'xtype' => 'textfield',
      'namespace' => 'hybridauth',
      'area' => 'ha.keys',
      'editedon' => '2016-09-05 13:37:03',
    ),
  ),
  'b168bba4c6b0a40fea15417ee2c4aaa8' => 
  array (
    'criteria' => 
    array (
      'key' => 'ha.keys.Vkontakte',
    ),
    'object' => 
    array (
      'key' => 'ha.keys.Vkontakte',
      'value' => '{"id":"5563407","secret":"z8cf9qOUxW8qCPqcw0qX"}',
      'xtype' => 'textfield',
      'namespace' => 'hybridauth',
      'area' => 'ha.keys',
      'editedon' => '2016-09-05 13:48:02',
    ),
  ),
  '789b427c71f62372f5212af07e249245' => 
  array (
    'criteria' => 
    array (
      'key' => 'ha.register_users',
    ),
    'object' => 
    array (
      'key' => 'ha.register_users',
      'value' => '',
      'xtype' => 'combo-boolean',
      'namespace' => 'hybridauth',
      'area' => 'ha.main',
      'editedon' => '2016-08-08 10:36:54',
    ),
  ),
  '448d26ec5a4da02a1229557a3020c90c' => 
  array (
    'criteria' => 
    array (
      'key' => 'ha.frontend_css',
    ),
    'object' => 
    array (
      'key' => 'ha.frontend_css',
      'value' => '[[+assetsUrl]]css/web/default.css',
      'xtype' => 'textfield',
      'namespace' => 'hybridauth',
      'area' => 'ha.main',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  'e8fe80b53ae0fb6d0f8d63fa9383f87e' => 
  array (
    'criteria' => 
    array (
      'category' => 'HybridAuth',
    ),
    'object' => 
    array (
      'id' => 16,
      'parent' => 0,
      'category' => 'HybridAuth',
      'rank' => 0,
    ),
  ),
  'c5173b51932cc39d8a157321e9b5fd69' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.HybridAuth.login',
    ),
    'object' => 
    array (
      'id' => 81,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.HybridAuth.login',
      'description' => 'Chunk for guest',
      'editor_type' => 0,
      'category' => 16,
      'cache_type' => 0,
      'snippet' => '[[%ha.login_intro]]
<br/>
[[+providers]]

[[+error:notempty=`<div class="alert alert-block alert-error">[[+error]]</div>`]]',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/hybridauth/elements/chunks/chunk.login.tpl',
      'content' => '[[%ha.login_intro]]
<br/>
[[+providers]]

[[+error:notempty=`<div class="alert alert-block alert-error">[[+error]]</div>`]]',
    ),
  ),
  'db82ec148bbee77e45aa65a86c4d01cf' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.HybridAuth.logout',
    ),
    'object' => 
    array (
      'id' => 82,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.HybridAuth.logout',
      'description' => 'Chunk for logged in',
      'editor_type' => 0,
      'category' => 16,
      'cache_type' => 0,
      'snippet' => '<div class="hybridauth">
	<img src="[[+gravatar]]?s=75" alt="[[+username]]" title="[[+fullname]]"  class="ha-avatar" />

	<span class="ha-info">
		[[%ha.greeting]] <b>[[+username]]</b> ([[+fullname]])! <a href="[[+logout_url]]">[[%ha.logout]]</a>
		<br/><br/>
		<small>[[%ha.providers_available]]</small><br/>
		[[+providers]]
	</span>

</div>

[[+error:notempty=`<div class="alert alert-block alert-error">[[+error]]</div>`]]
',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/hybridauth/elements/chunks/chunk.logout.tpl',
      'content' => '<div class="hybridauth">
	<img src="[[+gravatar]]?s=75" alt="[[+username]]" title="[[+fullname]]"  class="ha-avatar" />

	<span class="ha-info">
		[[%ha.greeting]] <b>[[+username]]</b> ([[+fullname]])! <a href="[[+logout_url]]">[[%ha.logout]]</a>
		<br/><br/>
		<small>[[%ha.providers_available]]</small><br/>
		[[+providers]]
	</span>

</div>

[[+error:notempty=`<div class="alert alert-block alert-error">[[+error]]</div>`]]
',
    ),
  ),
  'cf0852a622e4267300c5c9dadb08d440' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.HybridAuth.profile',
    ),
    'object' => 
    array (
      'id' => 83,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.HybridAuth.profile',
      'description' => 'Chunk for profile update',
      'editor_type' => 0,
      'category' => 16,
      'cache_type' => 0,
      'snippet' => '<form action="[[~[[*id]]]]" method="post" class="form-horizontal">

	<div class="control-group">
		<label class="control-label">[[%ha.gravatar]]</label>
		<div class="controls">
			<img src="[[+gravatar]]?s=100" alt="[[+email]]" title="[[+email]]"  style="margin-left:40px;" />
			<br/><small>[[%ha.gravatar_desc]]</small>
		</div>
	</div>

	<div class="control-group[[+error.username:notempty=` error`]]">
		<label class="control-label">[[%ha.username]]</label>
		<div class="controls">
			<input type="text" name="username" value="[[+username]]" />
			<span class="help-inline">[[+error.username]]</span>
		</div>
	</div>
	
	<div class="control-group[[+error.fullname:notempty=` error`]]">
		<label class="control-label">[[%ha.fullname]]</label>
		<div class="controls">
			<input type="text" name="fullname" value="[[+fullname]]" />
			<span class="help-inline">[[+error.fullname]]</span>
		</div>
	</div>
	
	<div class="control-group[[+error.email:notempty=` error`]]">
		<label class="control-label">[[%ha.email]]</label>
		<div class="controls">
			<input type="text" name="email" value="[[+email]]" />
			<span class="help-inline">[[+error.email]]</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">[[%ha.providers_available]]</label>
		<div class="controls">
			[[+providers]]
		</div>
	</div>

	<input type="hidden" name="hauth_action" value="updateProfile" />
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">[[%ha.save_profile]]</button>
		&nbsp;&nbsp;
		<a href="[[+logout_url]]" class="btn btn-danger">[[%ha.logout]]</a>
	</div>
</form>
[[+success:is=`1`:then=`<div class="alert alert-block">[[%ha.profile_update_success]]</div>`]]
[[+success:is=`0`:then=`<div class="alert alert-block alert-error">[[%ha.profile_update_error]] [[+error.message]]</div>`]]',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/hybridauth/elements/chunks/chunk.profile.tpl',
      'content' => '<form action="[[~[[*id]]]]" method="post" class="form-horizontal">

	<div class="control-group">
		<label class="control-label">[[%ha.gravatar]]</label>
		<div class="controls">
			<img src="[[+gravatar]]?s=100" alt="[[+email]]" title="[[+email]]"  style="margin-left:40px;" />
			<br/><small>[[%ha.gravatar_desc]]</small>
		</div>
	</div>

	<div class="control-group[[+error.username:notempty=` error`]]">
		<label class="control-label">[[%ha.username]]</label>
		<div class="controls">
			<input type="text" name="username" value="[[+username]]" />
			<span class="help-inline">[[+error.username]]</span>
		</div>
	</div>
	
	<div class="control-group[[+error.fullname:notempty=` error`]]">
		<label class="control-label">[[%ha.fullname]]</label>
		<div class="controls">
			<input type="text" name="fullname" value="[[+fullname]]" />
			<span class="help-inline">[[+error.fullname]]</span>
		</div>
	</div>
	
	<div class="control-group[[+error.email:notempty=` error`]]">
		<label class="control-label">[[%ha.email]]</label>
		<div class="controls">
			<input type="text" name="email" value="[[+email]]" />
			<span class="help-inline">[[+error.email]]</span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">[[%ha.providers_available]]</label>
		<div class="controls">
			[[+providers]]
		</div>
	</div>

	<input type="hidden" name="hauth_action" value="updateProfile" />
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">[[%ha.save_profile]]</button>
		&nbsp;&nbsp;
		<a href="[[+logout_url]]" class="btn btn-danger">[[%ha.logout]]</a>
	</div>
</form>
[[+success:is=`1`:then=`<div class="alert alert-block">[[%ha.profile_update_success]]</div>`]]
[[+success:is=`0`:then=`<div class="alert alert-block alert-error">[[%ha.profile_update_error]] [[+error.message]]</div>`]]',
    ),
  ),
  'd4c0f7d60b0d484bc1bebc1c7bc5964b' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.HybridAuth.provider',
    ),
    'object' => 
    array (
      'id' => 84,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.HybridAuth.provider',
      'description' => 'Chunk for authorization provider',
      'editor_type' => 0,
      'category' => 16,
      'cache_type' => 0,
      'snippet' => '<a href="[[+login_url]]&amp;provider=[[+title]]" class="ha-icon [[+provider]]" rel="nofollow" title="[[+title]]">[[+title]]</a>
',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/hybridauth/elements/chunks/chunk.provider.tpl',
      'content' => '<a href="[[+login_url]]&amp;provider=[[+title]]" class="ha-icon [[+provider]]" rel="nofollow" title="[[+title]]">[[+title]]</a>
',
    ),
  ),
  '4f6a6f84ace9b96670437afd6ffcdefd' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.HybridAuth.provider.active',
    ),
    'object' => 
    array (
      'id' => 85,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.HybridAuth.provider.active',
      'description' => 'Chunk for active authorization provider',
      'editor_type' => 0,
      'category' => 16,
      'cache_type' => 0,
      'snippet' => '<span class="ha-icon active [[+provider]]" title="[[+title]]">[[+title]]</span>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/hybridauth/elements/chunks/chunk.provider_active.tpl',
      'content' => '<span class="ha-icon active [[+provider]]" title="[[+title]]">[[+title]]</span>',
    ),
  ),
  'faece1a1212365cc15a37fcdae15f234' => 
  array (
    'criteria' => 
    array (
      'name' => 'HybridAuth',
    ),
    'object' => 
    array (
      'id' => 47,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'HybridAuth',
      'description' => 'Social authorization',
      'editor_type' => 0,
      'category' => 16,
      'cache_type' => 0,
      'snippet' => '/** @var array $scriptProperties */

$modx->error->message = null;
if (!$modx->loadClass(\'hybridauth\', MODX_CORE_PATH . \'components/hybridauth/model/hybridauth/\', false, true)) {
	return;
}
$HybridAuth = new HybridAuth($modx, $scriptProperties);
$HybridAuth->initialize($modx->context->key);

if ($modx->error->hasError()) {
	return $modx->error->message;
}
// For compatibility with old snippet
elseif (!empty($action)) {
	$tmp = strtolower($action);
	if ($tmp == \'getprofile\' || $tmp == \'updateprofile\') {
		return $modx->runSnippet(\'haProfile\', $scriptProperties);
	}
}

if (empty($loginTpl)) {
	$loginTpl = \'tpl.HybridAuth.login\';
}
if (empty($logoutTpl)) {
	$logoutTpl = \'tpl.HybridAuth.logout\';
}
if (empty($providerTpl)) {
	$providerTpl = \'tpl.HybridAuth.provider\';
}
if (empty($activeProviderTpl)) {
	$activeProviderTpl = \'tpl.HybridAuth.provider.active\';
}

$url = $HybridAuth->getUrl();
$error = \'\';
if (!empty($_SESSION[\'HA\'][\'error\'])) {
	$error = $_SESSION[\'HA\'][\'error\'];
	unset($_SESSION[\'HA\'][\'error\']);
}

if ($modx->user->isAuthenticated($modx->context->key)) {
	$add = array();
	if ($services = $modx->user->getMany(\'Services\')) {
		/* @var haUserService $service */
		foreach ($services as $service) {
			$add = array_merge($add, $service->toArray(strtolower($service->get(\'provider\') . \'.\')));
		}
	}

	$user = $modx->user->toArray();
	$profile = $modx->user->Profile->toArray();
	unset($profile[\'id\']);
	$arr = array_merge(
		$user,
		$profile,
		$add,
		array(
			\'login_url\' => $url . \'login\',
			\'logout_url\' => $url . \'logout\',
			\'providers\' => $HybridAuth->getProvidersLinks($providerTpl, $activeProviderTpl),
			\'error\' => $error,
			\'gravatar\' => \'https://gravatar.com/avatar/\' . md5(strtolower($profile[\'email\'])),
		)
	);

	return $modx->getChunk($logoutTpl, $arr);
}
else {
	$arr = array(
		\'login_url\' => $url . \'login\',
		\'logout_url\' => $url . \'logout\',
		\'providers\' => $HybridAuth->getProvidersLinks($providerTpl, $activeProviderTpl),
		\'error\' => $error,
	);

	return $modx->getChunk($loginTpl, $arr);
}',
      'locked' => 0,
      'properties' => 'a:12:{s:9:"providers";a:7:{s:4:"name";s:9:"providers";s:4:"desc";s:12:"ha.providers";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:10:"rememberme";a:7:{s:4:"name";s:10:"rememberme";s:4:"desc";s:13:"ha.rememberme";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:1;s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:8:"loginTpl";a:7:{s:4:"name";s:8:"loginTpl";s:4:"desc";s:11:"ha.loginTpl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:20:"tpl.HybridAuth.login";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:9:"logoutTpl";a:7:{s:4:"name";s:9:"logoutTpl";s:4:"desc";s:12:"ha.logoutTpl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:21:"tpl.HybridAuth.logout";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:11:"providerTpl";a:7:{s:4:"name";s:11:"providerTpl";s:4:"desc";s:14:"ha.providerTpl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:23:"tpl.HybridAuth.provider";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:17:"activeProviderTpl";a:7:{s:4:"name";s:17:"activeProviderTpl";s:4:"desc";s:20:"ha.activeProviderTpl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:30:"tpl.HybridAuth.provider.active";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:6:"groups";a:7:{s:4:"name";s:6:"groups";s:4:"desc";s:9:"ha.groups";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:12:"loginContext";a:7:{s:4:"name";s:12:"loginContext";s:4:"desc";s:15:"ha.loginContext";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:11:"addContexts";a:7:{s:4:"name";s:11:"addContexts";s:4:"desc";s:14:"ha.addContexts";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:15:"loginResourceId";a:7:{s:4:"name";s:15:"loginResourceId";s:4:"desc";s:18:"ha.loginResourceId";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:0;s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:16:"logoutResourceId";a:7:{s:4:"name";s:16:"logoutResourceId";s:4:"desc";s:19:"ha.logoutResourceId";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:0;s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:11:"redirectUri";a:7:{s:4:"name";s:11:"redirectUri";s:4:"desc";s:14:"ha.redirectUri";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/hybridauth/elements/snippets/snippet.hybridauth.php',
      'content' => '/** @var array $scriptProperties */

$modx->error->message = null;
if (!$modx->loadClass(\'hybridauth\', MODX_CORE_PATH . \'components/hybridauth/model/hybridauth/\', false, true)) {
	return;
}
$HybridAuth = new HybridAuth($modx, $scriptProperties);
$HybridAuth->initialize($modx->context->key);

if ($modx->error->hasError()) {
	return $modx->error->message;
}
// For compatibility with old snippet
elseif (!empty($action)) {
	$tmp = strtolower($action);
	if ($tmp == \'getprofile\' || $tmp == \'updateprofile\') {
		return $modx->runSnippet(\'haProfile\', $scriptProperties);
	}
}

if (empty($loginTpl)) {
	$loginTpl = \'tpl.HybridAuth.login\';
}
if (empty($logoutTpl)) {
	$logoutTpl = \'tpl.HybridAuth.logout\';
}
if (empty($providerTpl)) {
	$providerTpl = \'tpl.HybridAuth.provider\';
}
if (empty($activeProviderTpl)) {
	$activeProviderTpl = \'tpl.HybridAuth.provider.active\';
}

$url = $HybridAuth->getUrl();
$error = \'\';
if (!empty($_SESSION[\'HA\'][\'error\'])) {
	$error = $_SESSION[\'HA\'][\'error\'];
	unset($_SESSION[\'HA\'][\'error\']);
}

if ($modx->user->isAuthenticated($modx->context->key)) {
	$add = array();
	if ($services = $modx->user->getMany(\'Services\')) {
		/* @var haUserService $service */
		foreach ($services as $service) {
			$add = array_merge($add, $service->toArray(strtolower($service->get(\'provider\') . \'.\')));
		}
	}

	$user = $modx->user->toArray();
	$profile = $modx->user->Profile->toArray();
	unset($profile[\'id\']);
	$arr = array_merge(
		$user,
		$profile,
		$add,
		array(
			\'login_url\' => $url . \'login\',
			\'logout_url\' => $url . \'logout\',
			\'providers\' => $HybridAuth->getProvidersLinks($providerTpl, $activeProviderTpl),
			\'error\' => $error,
			\'gravatar\' => \'https://gravatar.com/avatar/\' . md5(strtolower($profile[\'email\'])),
		)
	);

	return $modx->getChunk($logoutTpl, $arr);
}
else {
	$arr = array(
		\'login_url\' => $url . \'login\',
		\'logout_url\' => $url . \'logout\',
		\'providers\' => $HybridAuth->getProvidersLinks($providerTpl, $activeProviderTpl),
		\'error\' => $error,
	);

	return $modx->getChunk($loginTpl, $arr);
}',
    ),
  ),
  '35e5be8b9956add896bc3a764fd58c1f' => 
  array (
    'criteria' => 
    array (
      'name' => 'haProfile',
    ),
    'object' => 
    array (
      'id' => 48,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'haProfile',
      'description' => 'Update your profile',
      'editor_type' => 0,
      'category' => 16,
      'cache_type' => 0,
      'snippet' => '/** @var array $scriptProperties */

$modx->error->message = null;
if (!$modx->loadClass(\'hybridauth\', MODX_CORE_PATH . \'components/hybridauth/model/hybridauth/\', false, true)) {
	return;
}
$HybridAuth = new HybridAuth($modx, $scriptProperties);
$HybridAuth->initialize($modx->context->key);

if ($modx->error->hasError()) {
	return $modx->error->message;
}
elseif (!$modx->user->isAuthenticated($modx->context->key)) {
	return $modx->lexicon(\'ha_err_not_logged_in\');
}

if (empty($profileTpl)) {
	$profileTpl = \'tpl.HybridAuth.profile\';
}
if (empty($profileFields)) {
	$profileFields = \'username:25,email:50,fullname:50,phone:12,mobilephone:12,dob:10,gender,address,country,city,state,zip,fax,photo,comment,website\';
}
if (empty($requiredFields)) {
	$requiredFields = \'username,email,fullname\';
}
if (empty($providerTpl)) {
	$providerTpl = \'tpl.HybridAuth.provider\';
}
if (empty($activeProviderTpl)) {
	$activeProviderTpl = \'tpl.HybridAuth.provider.active\';
}
$data = array();

// Update of profile
if ((!empty($_REQUEST[\'action\']) && strtolower($_REQUEST[\'action\']) == \'updateprofile\') || (!empty($_REQUEST[\'hauth_action\']) && strtolower($_REQUEST[\'hauth_action\']) == \'updateprofile\')) {
	$profileFields = array_map(\'trim\', explode(\',\', $profileFields));
	foreach ($profileFields as $field) {
		if (strpos($field, \':\') !== false) {
			list($key, $length) = explode(\':\', $field);
		}
		else {
			$key = $field;
			$length = 0;
		}

		if (isset($_REQUEST[$key])) {
			if ($key == \'comment\') {
				$data[$key] = empty($length) ? $_REQUEST[$key] : substr($_REQUEST[$key], $length);
			}
			else {
				$data[$key] = $HybridAuth->Sanitize($_REQUEST[$key], $length);
			}
		}
	}

	$data[\'requiredFields\'] = array_map(\'trim\', explode(\',\', $requiredFields));

	/** @var modProcessorResponse $response */
	$response = $HybridAuth->runProcessor(\'web/user/update\', $data);
	if ($response->isError()) {
		$data[\'error.message\'] = $response->getMessage();
		foreach ($response->errors as $error) {
			$data[\'error.\' . $error->field] = $error->message;
		}
	}
	$data[\'success\'] = (integer)!$response->isError();
}

$add = array();
if ($services = $modx->user->getMany(\'Services\')) {
	/* @var haUserService $service */
	foreach ($services as $service) {
		$add = array_merge($add, $service->toArray(strtolower($service->get(\'provider\') . \'.\')));
	}
}

$url = $HybridAuth->getUrl();
$user = $modx->user->toArray();
$profile = $modx->user->Profile->toArray();
$data = array_merge(
	$user,
	$profile,
	$add,
	$data,
	array(
		\'login_url\' => $url . \'login\',
		\'logout_url\' => $url . \'logout\',
		\'providers\' => $HybridAuth->getProvidersLinks($providerTpl, $activeProviderTpl),
		\'gravatar\' => \'https://gravatar.com/avatar/\' . md5(strtolower($profile[\'email\'])),
	)
);

return $modx->getChunk($profileTpl, $data);',
      'locked' => 0,
      'properties' => 'a:5:{s:10:"profileTpl";a:7:{s:4:"name";s:10:"profileTpl";s:4:"desc";s:13:"ha.profileTpl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:22:"tpl.HybridAuth.profile";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:13:"profileFields";a:7:{s:4:"name";s:13:"profileFields";s:4:"desc";s:16:"ha.profileFields";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:127:"username:25,email:50,fullname:50,phone:12,mobilephone:12,dob:10,gender,address,country,city,state,zip,fax,photo,comment,website";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:14:"requiredFields";a:7:{s:4:"name";s:14:"requiredFields";s:4:"desc";s:17:"ha.requiredFields";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:23:"username,email,fullname";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:11:"providerTpl";a:7:{s:4:"name";s:11:"providerTpl";s:4:"desc";s:14:"ha.providerTpl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:23:"tpl.HybridAuth.provider";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}s:17:"activeProviderTpl";a:7:{s:4:"name";s:17:"activeProviderTpl";s:4:"desc";s:20:"ha.activeProviderTpl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:30:"tpl.HybridAuth.provider.active";s:7:"lexicon";s:21:"hybridauth:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/hybridauth/elements/snippets/snippet.haprofile.php',
      'content' => '/** @var array $scriptProperties */

$modx->error->message = null;
if (!$modx->loadClass(\'hybridauth\', MODX_CORE_PATH . \'components/hybridauth/model/hybridauth/\', false, true)) {
	return;
}
$HybridAuth = new HybridAuth($modx, $scriptProperties);
$HybridAuth->initialize($modx->context->key);

if ($modx->error->hasError()) {
	return $modx->error->message;
}
elseif (!$modx->user->isAuthenticated($modx->context->key)) {
	return $modx->lexicon(\'ha_err_not_logged_in\');
}

if (empty($profileTpl)) {
	$profileTpl = \'tpl.HybridAuth.profile\';
}
if (empty($profileFields)) {
	$profileFields = \'username:25,email:50,fullname:50,phone:12,mobilephone:12,dob:10,gender,address,country,city,state,zip,fax,photo,comment,website\';
}
if (empty($requiredFields)) {
	$requiredFields = \'username,email,fullname\';
}
if (empty($providerTpl)) {
	$providerTpl = \'tpl.HybridAuth.provider\';
}
if (empty($activeProviderTpl)) {
	$activeProviderTpl = \'tpl.HybridAuth.provider.active\';
}
$data = array();

// Update of profile
if ((!empty($_REQUEST[\'action\']) && strtolower($_REQUEST[\'action\']) == \'updateprofile\') || (!empty($_REQUEST[\'hauth_action\']) && strtolower($_REQUEST[\'hauth_action\']) == \'updateprofile\')) {
	$profileFields = array_map(\'trim\', explode(\',\', $profileFields));
	foreach ($profileFields as $field) {
		if (strpos($field, \':\') !== false) {
			list($key, $length) = explode(\':\', $field);
		}
		else {
			$key = $field;
			$length = 0;
		}

		if (isset($_REQUEST[$key])) {
			if ($key == \'comment\') {
				$data[$key] = empty($length) ? $_REQUEST[$key] : substr($_REQUEST[$key], $length);
			}
			else {
				$data[$key] = $HybridAuth->Sanitize($_REQUEST[$key], $length);
			}
		}
	}

	$data[\'requiredFields\'] = array_map(\'trim\', explode(\',\', $requiredFields));

	/** @var modProcessorResponse $response */
	$response = $HybridAuth->runProcessor(\'web/user/update\', $data);
	if ($response->isError()) {
		$data[\'error.message\'] = $response->getMessage();
		foreach ($response->errors as $error) {
			$data[\'error.\' . $error->field] = $error->message;
		}
	}
	$data[\'success\'] = (integer)!$response->isError();
}

$add = array();
if ($services = $modx->user->getMany(\'Services\')) {
	/* @var haUserService $service */
	foreach ($services as $service) {
		$add = array_merge($add, $service->toArray(strtolower($service->get(\'provider\') . \'.\')));
	}
}

$url = $HybridAuth->getUrl();
$user = $modx->user->toArray();
$profile = $modx->user->Profile->toArray();
$data = array_merge(
	$user,
	$profile,
	$add,
	$data,
	array(
		\'login_url\' => $url . \'login\',
		\'logout_url\' => $url . \'logout\',
		\'providers\' => $HybridAuth->getProvidersLinks($providerTpl, $activeProviderTpl),
		\'gravatar\' => \'https://gravatar.com/avatar/\' . md5(strtolower($profile[\'email\'])),
	)
);

return $modx->getChunk($profileTpl, $data);',
    ),
  ),
  'd0b7cbc5eb9b8a89672cb5012ad4bab9' => 
  array (
    'criteria' => 
    array (
      'name' => 'HybridAuth',
    ),
    'object' => 
    array (
      'id' => 9,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'HybridAuth',
      'description' => '',
      'editor_type' => 0,
      'category' => 16,
      'cache_type' => 0,
      'plugincode' => 'if (!$modx->loadClass(\'hybridauth\', $modx->getOption(\'hybridauth.core_path\', null, $modx->getOption(\'core_path\', null, MODX_CORE_PATH) . \'components/hybridauth/\') . \'model/hybridauth/\', false, true)) {
	return;
}

switch ($modx->event->name) {

	case \'OnHandleRequest\':
		if ($modx->context->key != \'web\' && !$modx->user->id) {
			if ($user = $modx->getAuthenticatedUser($modx->context->key)) {
				$modx->user = $user;
				$modx->getUser($modx->context->key);
			}
		}

		if ($modx->user->isAuthenticated($modx->context->key)) {
			if (!$modx->user->active || $modx->user->Profile->blocked) {
				$modx->runProcessor(\'security/logout\');
				$modx->sendRedirect($modx->makeUrl($modx->getOption(\'site_start\'), \'\', \'\', \'full\'));
			}
		}

		if (!empty($_REQUEST[\'hauth_action\']) || !empty($_REQUEST[\'hauth_start\']) || !empty($_REQUEST[\'hauth_done\'])) {
			$config = !empty($_SESSION[\'HybridAuth\'][$modx->context->key])
				? $_SESSION[\'HybridAuth\'][$modx->context->key]
				: array();
			$HybridAuth = new HybridAuth($modx, $config);

			if (!empty($_REQUEST[\'hauth_action\'])) {
				switch ($_REQUEST[\'hauth_action\']) {
					case \'login\':
						$HybridAuth->Login(@$_REQUEST[\'provider\']);
						break;
					case \'logout\':
						$HybridAuth->Logout();
						break;
				}
			}
			else {
				$HybridAuth->processAuth();
			}
		}
		break;

	case \'OnWebAuthentication\':
		$modx->event->_output = !empty($_SESSION[\'HybridAuth\'][\'verified\']);
		unset($_SESSION[\'HybridAuth\'][\'verified\']);
		break;

	case \'OnUserFormPrerender\':
		/** @var modUser $user */
		if (!isset($user) || $user->get(\'id\') < 1) {
			return;
		}
		$HybridAuth = new HybridAuth($modx);
		$modx->controller->addJavascript($HybridAuth->config[\'jsUrl\'] . \'mgr/hybridauth.js\');
		$modx->controller->addJavascript($HybridAuth->config[\'jsUrl\'] . \'mgr/service/grids.js\');
		$modx->controller->addLexiconTopic(\'hybridauth:default\');

		if ($modx->getCount(\'modPlugin\', array(\'name\' => \'AjaxManager\', \'disabled\' => false))) {
			$modx->controller->addHtml(\'
			<script type="text/javascript">
				HybridAuth.config = \' . $modx->toJSON($HybridAuth->config) . \';
				Ext.onReady(function() {
					window.setTimeout(function() {
						var tab = Ext.getCmp("modx-user-tabs");
						if (!tab) {return;}
						tab.add({
							title: _("ha.services"),
							border: false,
							items: [{
								layout: "anchor",
								border: false,
								items: [{
									html: _("ha.services_tip"),
									border: false,
									bodyCssClass: "panel-desc"
								}, {
									xtype: "hybridauth-grid-services",
									anchor: "100%",
									cls: "main-wrapper",
									userId: \' . intval($user->get(\'id\')) . \'
								}]
							}]
						});
					}, 10);
				});
			</script>\'
			);
		}
		else {
			$modx->controller->addHtml(\'
			<script type="text/javascript">
				HybridAuth.config = \' . $modx->toJSON($HybridAuth->config) . \';
				Ext.ComponentMgr.onAvailable("modx-user-tabs", function() {
					this.on("beforerender", function() {
						this.add({
							title: _("ha.services"),
							border: false,
							items: [{
								layout: "anchor",
								border: false,
								items: [{
									html: _("ha.services_tip"),
									border: false,
									bodyCssClass: "panel-desc"
								}, {
									xtype: "hybridauth-grid-services",
									anchor: "100%",
									cls: "main-wrapper",
									userId: \' . intval($user->get(\'id\')) . \'
								}]
							}]
						});
					});
				});
			</script>\'
			);
		}
		break;
}',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/hybridauth/elements/plugins/plugin.hybridauth.php',
      'content' => 'if (!$modx->loadClass(\'hybridauth\', $modx->getOption(\'hybridauth.core_path\', null, $modx->getOption(\'core_path\', null, MODX_CORE_PATH) . \'components/hybridauth/\') . \'model/hybridauth/\', false, true)) {
	return;
}

switch ($modx->event->name) {

	case \'OnHandleRequest\':
		if ($modx->context->key != \'web\' && !$modx->user->id) {
			if ($user = $modx->getAuthenticatedUser($modx->context->key)) {
				$modx->user = $user;
				$modx->getUser($modx->context->key);
			}
		}

		if ($modx->user->isAuthenticated($modx->context->key)) {
			if (!$modx->user->active || $modx->user->Profile->blocked) {
				$modx->runProcessor(\'security/logout\');
				$modx->sendRedirect($modx->makeUrl($modx->getOption(\'site_start\'), \'\', \'\', \'full\'));
			}
		}

		if (!empty($_REQUEST[\'hauth_action\']) || !empty($_REQUEST[\'hauth_start\']) || !empty($_REQUEST[\'hauth_done\'])) {
			$config = !empty($_SESSION[\'HybridAuth\'][$modx->context->key])
				? $_SESSION[\'HybridAuth\'][$modx->context->key]
				: array();
			$HybridAuth = new HybridAuth($modx, $config);

			if (!empty($_REQUEST[\'hauth_action\'])) {
				switch ($_REQUEST[\'hauth_action\']) {
					case \'login\':
						$HybridAuth->Login(@$_REQUEST[\'provider\']);
						break;
					case \'logout\':
						$HybridAuth->Logout();
						break;
				}
			}
			else {
				$HybridAuth->processAuth();
			}
		}
		break;

	case \'OnWebAuthentication\':
		$modx->event->_output = !empty($_SESSION[\'HybridAuth\'][\'verified\']);
		unset($_SESSION[\'HybridAuth\'][\'verified\']);
		break;

	case \'OnUserFormPrerender\':
		/** @var modUser $user */
		if (!isset($user) || $user->get(\'id\') < 1) {
			return;
		}
		$HybridAuth = new HybridAuth($modx);
		$modx->controller->addJavascript($HybridAuth->config[\'jsUrl\'] . \'mgr/hybridauth.js\');
		$modx->controller->addJavascript($HybridAuth->config[\'jsUrl\'] . \'mgr/service/grids.js\');
		$modx->controller->addLexiconTopic(\'hybridauth:default\');

		if ($modx->getCount(\'modPlugin\', array(\'name\' => \'AjaxManager\', \'disabled\' => false))) {
			$modx->controller->addHtml(\'
			<script type="text/javascript">
				HybridAuth.config = \' . $modx->toJSON($HybridAuth->config) . \';
				Ext.onReady(function() {
					window.setTimeout(function() {
						var tab = Ext.getCmp("modx-user-tabs");
						if (!tab) {return;}
						tab.add({
							title: _("ha.services"),
							border: false,
							items: [{
								layout: "anchor",
								border: false,
								items: [{
									html: _("ha.services_tip"),
									border: false,
									bodyCssClass: "panel-desc"
								}, {
									xtype: "hybridauth-grid-services",
									anchor: "100%",
									cls: "main-wrapper",
									userId: \' . intval($user->get(\'id\')) . \'
								}]
							}]
						});
					}, 10);
				});
			</script>\'
			);
		}
		else {
			$modx->controller->addHtml(\'
			<script type="text/javascript">
				HybridAuth.config = \' . $modx->toJSON($HybridAuth->config) . \';
				Ext.ComponentMgr.onAvailable("modx-user-tabs", function() {
					this.on("beforerender", function() {
						this.add({
							title: _("ha.services"),
							border: false,
							items: [{
								layout: "anchor",
								border: false,
								items: [{
									html: _("ha.services_tip"),
									border: false,
									bodyCssClass: "panel-desc"
								}, {
									xtype: "hybridauth-grid-services",
									anchor: "100%",
									cls: "main-wrapper",
									userId: \' . intval($user->get(\'id\')) . \'
								}]
							}]
						});
					});
				});
			</script>\'
			);
		}
		break;
}',
    ),
  ),
  '3c05255c36212f03713916cb977b03fd' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 9,
      'event' => 'OnHandleRequest',
    ),
    'object' => 
    array (
      'pluginid' => 9,
      'event' => 'OnHandleRequest',
      'priority' => 10,
      'propertyset' => 0,
    ),
  ),
  '978f7fc84aa524d322a2dec5088c23a3' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 9,
      'event' => 'OnUserFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 9,
      'event' => 'OnUserFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'a9818a209c96bbf9f0fb97d6b897d2d5' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 9,
      'event' => 'OnWebAuthentication',
    ),
    'object' => 
    array (
      'pluginid' => 9,
      'event' => 'OnWebAuthentication',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
);