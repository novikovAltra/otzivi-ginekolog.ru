<?php

$properties = array();

$tmp = array(
	'parents' => array(
		'type' => 'textfield'
		,'value' => ''
	),
	'resources' => array(
		'type' => 'textfield'
		,'value' => ''
	),
	'showLog' => array(
		'type' => 'combo-boolean',
		'value' => false,
	),
	'toPlaceholder' => array(
		'type' => 'textfield',
		'value' => '',
	),

	'tplRow' => array(
		'type' => 'textfield'
		,'value' => 'tpl.ms2Gallery.row'
	),
	'tplOuter' => array(
		'type' => 'textfield'
		,'value' => 'tpl.ms2Gallery.outer'
	),
	'tplEmpty' => array(
		'type' => 'textfield'
		,'value' => 'tpl.ms2Gallery.empty'
	),
	'tplSingle' => array(
		'type' => 'textfield'
		,'value' => ''
	),

	'limit' => array(
		'type' => 'numberfield'
		,'value' => 0
	),
	'offset' => array(
		'type' => 'numberfield'
		,'value' => 0
	),
	'where' => array(
		'type' => 'textfield',
		'value' => '',
	),
	'filetype' => array(
		'type' => 'textfield',
		'value' => '',
	),
	'showInactive' => array(
		'type' => 'combo-boolean',
		'value' => false,
	),

	'sortby' => array(
		'type' => 'textfield'
		,'value' => 'rank'
	),
	'sortdir' => array(
		'type' => 'list',
		'options' => array(
			array('text' => 'ASC','value' => 'ASC'),
			array('text' => 'DESC','value' => 'DESC'),
		),
		'value' => 'ASC',
	),

	'frontend_css' => array(
		'value' => '[[+cssUrl]]web/default.css',
		'xtype' => 'textfield',
	),
	'frontend_js' => array(
		'value' => '[[+jsUrl]]web/default.js',
		'xtype' => 'textfield',
	),

	'tags' => array(
		'value' => '',
		'xtype' => 'textfield',
	),
	'tagsVar' => array(
		'value' => '',
		'xtype' => 'textfield',
	),
	'getTags' => array(
		'value' => false,
		'xtype' => 'combo-boolean',
	),
	'tagsSeparator' => array(
		'value' => ',',
		'xtype' => 'textfield',
	),
);

foreach ($tmp as $k => $v) {
	$properties[] = array_merge(array(
			'name' => $k,
			'desc' => PKG_NAME_LOWER . '_prop_' . $k,
			'lexicon' => PKG_NAME_LOWER . ':properties',
		), $v
	);
}

return $properties;