<?php  return 'if($modx->context->key == \'web\'){
    $time_file = MODX_ASSETS_PATH.\'msiLastCheck.txt\';
    if(file_exists($time_file))
        $last_update = file_get_contents($time_file);
    else
        $last_update = 0;
        
    $now = time();
    
    if(($now - intval($last_update)) > 14400){
        $publishon_tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => \'publishon\'));
        $is_published_tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => \'is_published\'));
        
        $q = $modx->newQuery(\'modResource\');
        $q->innerJoin(\'modTemplateVarResource\', \'publishon\', \'publishon.contentid = modResource.id\');
        $q->innerJoin(\'modTemplateVarResource\', \'is_published\', \'is_published.contentid = modResource.id\');
        
        $q->select(array(
           \'modResource.id\'
        ));
        
        
        $q->where(array(
            \'class_key\' => \'Ticket\',
           \'publishon.value:<\' => time(),
           \'publishon.tmplvarid\' => $publishon_tv->id,
           \'is_published.value\' => \'0\',
           \'is_published.tmplvarid\' => $is_published_tv->id
        ));
        
        $q->prepare();
        $q->stmt->execute();
        
        $result = $q->stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($result as $resource_id){
            $resource = $modx->getObject(\'modResource\', $resource_id);
            $resource->setTVValue(\'is_published\', 1);
        }
        
        $modx->cacheManager->clearCache();
        
        file_put_contents($time_file, time());
    }
}
return;
';