<?php
$categoryClass = "modResource";
$resourceClass = "Ticket";
$importResourceSheme = array (
  'parent' => 'vB',
  'pagetitle' => 'A',
  'content' => 'C',
  'alias' => 'vA',
);
$importProductSheme = array ();
$importCategorySheme = array (
  'alias' => 'B',
);
$resourceDefault = array (
  'show_in_tree' => '1',
  'template' => '6',
  'published' => '0',
);
$productDefault = array ();
$categoryDefault = array (
  'published' => '1',
  'template' => '7',
);
$removeMissing = false;
$removeMissingCategory = false;
$productTVsSheme = array (
  'author' => 'A',
  'publishon' => 'vC_publishon',
  'is_published' => 'vC_is_published',
  'publishdate' => 'D',
);
$categoryTVsSheme = array ();
$pathToImages = "assets/components/msimport/import_images/";
$pathToConfig = "assets/components/msimport/config/";
$fieldsPretreatment = array (
  'A' => 'msiMakeAlias',
  'B' => 'msiGetParent',
  'D' => 'msiSetPublishDate',
  'C' => 'msiPreCreateTicket',
);
$uniqueField = "alias";
$ignoredColumns = array (
  0 => 'alias',
);
$isHeadersSet = '1';
