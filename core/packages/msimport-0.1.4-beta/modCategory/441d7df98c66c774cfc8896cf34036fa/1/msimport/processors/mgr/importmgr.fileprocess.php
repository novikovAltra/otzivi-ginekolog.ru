<?php
ini_set('display_errors', '1');
$model = new msImport($modx);
if ($model->Log->hasFatalError) {
    return $modx->error->failure('Не удалось начать импорт. Описание проблемы ищите в журнале ошибок.');
}
if(!isset($_POST["filename"])){
    return $modx->error->failure("Не указан файл.");
}
if(!isset($_POST["position"])){
    return $modx->error->failure("Не передан номер строки.");
}
if(!isset($_POST["page"])){
    return $modx->error->failure("Не передан номер листа.");
}
if(!isset($_POST["total"])){
    return $modx->error->failure("Не передано общее количество строк в файле.");
}
if($model->Config->isHeadersSet && $_POST["position"] == 1)
    $position = 2;
else
    $position = $_POST["position"];

$res = $model->Tools->parse_file($_POST["filename"],$position,$_POST["page"],$_POST["total"]);

if ($model->Log->hasFatalError) {
    return $modx->error->failure($res['message']);
}
else {
    return $modx->error->success(json_encode($res));
}