<?php
include_once dirname(dirname(__FILE__)) . '/model/msimport/msImport.class.php';

$model = new msImport($modx);
return $model->initialize('mgr');