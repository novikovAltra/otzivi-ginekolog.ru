<?php
$model = new msImport($modx);
if(!isset($_POST["filename"])){
    return $modx->error->failure("Всё сломалось");
}
$res = $model->Tools->Parser->getSheets($_POST["filename"]);
if ($model->Log->hasFatalError) {
    return $modx->error->failure($res['message']);
}
else {
    return $modx->error->success(json_encode(array('count' => $res['message'])));
}