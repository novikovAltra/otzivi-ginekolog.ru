<?php
$model = new msImport($modx);
$res = $model->Tools->fileUpload();
if ($model->Log->hasFatalError) {
    return $modx->error->failure($res['message']);
}
else {
    return $modx->error->success(json_encode(array('name'=>$res['message'])));
}