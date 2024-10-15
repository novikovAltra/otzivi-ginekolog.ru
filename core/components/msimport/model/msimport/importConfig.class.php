<?php

/* class for collecting import settings and verify their */
class importConfig {

    public $ParentProcess;
    public $modelPath;
    public $catalogId;
    public $parent;
    public $subParent;
    public $importResourceSheme;
    public $importProductSheme;
    public $importCategorySheme;
    public $resourceDefault;
    public $productDefault;
    public $categoryDefault;
    public $subCategorysField;
    public $removeMissing;
    public $removeMissingCategory;
    public $productTVsSheme;
    public $categoryTVsSheme;
    public $pathToImages = 'assets/components/msimport/import_images/';
    public $pathToConfig = 'assets/components/msimport/config/';
    public $uniqueField = 1;
    public $showInTreeDefault = 0;
    public $aliasMaxLength = 255;
    public $historyPath;
    public $fieldsPretreatment = array();
    public $categoryClass = 'msCategory';
    public $resourceClass = 'msProduct';
    public $categoryTemplate;
    public $productTemplate;
    public $pathToTables;
    public $publishDefault;
    public $ignoredColumns;
    public $isHeadersSet = true;
    public $removeOldImages = false;
    private $allovedToSetAsUniqueFild = array(
        'pagetitle',
        'id',
        'alias',
        'uri',
        'longtitle'
    );

    public function __construct(msImport &$ParentProcess) {
        $this->ParentProcess = &$ParentProcess;
        $this->pathToTables = $this->ParentProcess->modx->getOption('assets_path').'components/msimport/files/';
        if(isset($_SESSION['import']['config']) && !empty($_SESSION['import']['config'])) $this->fromSession();
        else{
            $namespace = $this->ParentProcess->modx->getObject('modNamespace', 'msimport');
            $basePath = str_replace("{core_path}", $this->ParentProcess->modx->getOption('core_path'), $namespace->get('path'));
            $this->modelPath = $basePath . 'model/';
            $this->historyPath = $this->ParentProcess->modx->getOption('assets_path').'components/msimport/history/';

            $this->setFromModx();
            if ($configFile = $this->ParentProcess->modx->getOption('import_configuration_file_path')) {
                $configFile = $this->ParentProcess->modx->getOption('base_path') . $this->pathToConfig . $configFile;
                if(file_exists($configFile))
                    $this->setFromFile($configFile);
                else
                    $this->saveToFile($configFile);
            }
            $this->verifyConfig();
        }
    }

    public function setFromFile($configFile) {
        if (!include $configFile)
            return $this->ParentProcess->Log->error('Не удалось подключить файл конфигурации импорта', __METHOD__, __LINE__);
        if (isset($categoryClass))
            $this->categoryClass = $categoryClass;
        if (isset($resourceClass))
            $this->resourceClass = $resourceClass;
        if (isset($importResourceSheme))
            $this->importResourceSheme = $importResourceSheme;
        if (isset($importProductSheme))
            $this->importProductSheme = $importProductSheme;
        if (isset($importCategorySheme))
            $this->importCategorySheme = $importCategorySheme;
        if (isset($resourceDefault))
            $this->resourceDefault = $resourceDefault;
        if (isset($productDefault))
            $this->productDefault = $productDefault;
        if (isset($categoryDefault))
            $this->categoryDefault = $categoryDefault;
        if (isset($subCategorysField))
            $this->subCategorysField = $subCategorysField;
        if (isset($catalogId) && $cId = intval($catalogId))
            $this->catalogId = $cId;
        if (isset($removeMissing))
            $this->removeMissing = $removeMissing;
        if (isset($removeMissingCategory))
            $this->removeMissingCategory = $removeMissingCategory;
        if (isset($productTVsSheme))
            $this->productTVsSheme = $productTVsSheme;
        if (isset($categoryTVsSheme))
            $this->categoryTVsSheme = $categoryTVsSheme;
        if (isset($pathToImages))
            $this->pathToImages = $pathToImages;
        if (isset($fieldsPretreatment))
            $this->fieldsPretreatment = $fieldsPretreatment;
        if (isset($uniqueField))
            $this->uniqueField = $uniqueField;
        if (isset($categoryTemplate))
            $this->categoryTemplate = $categoryTemplate;
        if (isset($productTemplate))
            $this->productTemplate = $productTemplate;
        if (isset($ignoredColumns))
            $this->ignoredColumns = $ignoredColumns;
        if (isset($isHeadersSet))
            $this->isHeadersSet = $isHeadersSet;
        if (isset($removeOldImages))
            $this->removeOldImages = $removeOldImages;
        return true;
    }

    public function saveToFile($configFile){
        $file_content = "<?php\n";
        $file_content .= '$categoryClass = "'.$this->categoryClass."\";\n";
        $file_content .= '$resourceClass = "'.$this->resourceClass."\";\n";
        if (!empty($this->importResourceSheme))
            $file_content .= '$importResourceSheme = '.var_export($this->importResourceSheme, true).";\n";
        if (!empty($this->importProductSheme))
            $file_content .= '$importProductSheme = '.var_export($this->importProductSheme, true).";\n";
        if (!empty($this->importCategorySheme))
            $file_content .= '$importCategorySheme = '.var_export($this->importCategorySheme, true).";\n";
        if (!empty($this->resourceDefault))
            $file_content .= '$resourceDefault = '.var_export($this->resourceDefault, true).";\n";
        if (!empty($this->productDefault))
            $file_content .= '$productDefault = '.var_export($this->productDefault, true).";\n";
        if (!empty($this->categoryDefault))
            $file_content .= '$categoryDefault = '.var_export($this->categoryDefault, true).";\n";
        if ($this->subCategorysField)
            $file_content .= '$subCategorysField = "'.$this->subCategorysField."\";\n";
        if ($this->catalogId && $cId = intval($this->catalogId))
            $file_content .= '$catalogId = '.$cId.";\n";
        if (isset($this->removeMissing)) {
            $removeMissing = $this->removeMissing ? 'true' : 'false';
            $file_content .= '$removeMissing = ' . $removeMissing . ";\n";
        }
        if (isset($this->removeMissingCategory)) {
            $removeMissingCategory = $this->removeMissingCategory ? 'true' : 'false';
            $file_content .= '$removeMissingCategory = ' . $removeMissingCategory . ";\n";
        }
        if (!empty($this->productTVsSheme))
            $file_content .= '$productTVsSheme = '.var_export($this->productTVsSheme, true).";\n";
        if (!empty($this->categoryTVsSheme))
            $file_content .= '$categoryTVsSheme = '.var_export($this->categoryTVsSheme, true).";\n";
        if ($this->pathToImages)
            $file_content .= '$pathToImages = "'.$this->pathToImages."\";\n";
        if ($this->pathToConfig)
            $file_content .= '$pathToConfig = "'.$this->pathToConfig."\";\n";
        if (!empty($this->fieldsPretreatment))
            $file_content .= '$fieldsPretreatment = '.var_export($this->fieldsPretreatment, true).";\n";
        if ($this->uniqueField)
            $file_content .= '$uniqueField = "'.$this->uniqueField."\";\n";
        if ($this->categoryTemplate)
            $file_content .= '$categoryTemplate = '.$this->categoryTemplate.";\n";
        if ($this->productTemplate)
            $file_content .= '$productTemplate = '.$this->productTemplate.";\n";
        if (!empty($this->ignoredColumns))
            $file_content .= '$ignoredColumns = '.var_export($this->ignoredColumns, true).";\n";
        if (!empty($this->isHeadersSet))
            $file_content .= '$isHeadersSet = '.var_export($this->isHeadersSet, true).";\n";
        if (!empty($this->removeOldImages))
            $file_content .= '$removeOldImages = '.var_export($this->removeOldImages, true).";\n";

        file_put_contents($configFile, $file_content);

        return true;
    }

    public function setFromModx() {
        $this->categoryClass = $this->ParentProcess->modx->getOption('import_category_class', null, $this->categoryClass);
        $this->resourceClass = $this->ParentProcess->modx->getOption('import_resource_class', null, $this->resourceClass);
        $this->importResourceSheme = (array) json_decode($this->ParentProcess->modx->getOption('import_product_resource_fields_relation'));
        $this->importProductSheme = (array) json_decode($this->ParentProcess->modx->getOption('import_product_ms2_fields_relation'));
        $this->importCategorySheme = (array) json_decode($this->ParentProcess->modx->getOption('import_category_fields_relation'));
        $this->resourceDefault = (array) json_decode($this->ParentProcess->modx->getOption('import_product_resource_fields'));
        $this->productDefault = (array) json_decode($this->ParentProcess->modx->getOption('import_product_ms2_fields'));
        $this->categoryDefault = (array) json_decode($this->ParentProcess->modx->getOption('import_category_resource_fields'));
        $this->subCategorysField = $this->ParentProcess->modx->getOption('import_subcategoryes_field');
        $this->catalogId = intval($this->ParentProcess->modx->getOption('import_catalog_id'));
        $this->parent = $this->catalogId;
        $this->subParent = $this->catalogId;
        $this->removeMissing = $this->ParentProcess->modx->getOption('import_remove_missing_products');
        $this->removeMissingCategory = $this->ParentProcess->modx->getOption('import_remove_missing_category');
        $this->productTVsSheme = (array) json_decode($this->ParentProcess->modx->getOption('import_product_tvs_sheme'));
        $this->categoryTVsSheme = (array) json_decode($this->ParentProcess->modx->getOption('import_category_tvs_sheme'));
        $this->pathToImages = $this->ParentProcess->modx->getOption('import_path_to_images');
        $this->fieldsPretreatment = (array) json_decode($this->ParentProcess->modx->getOption('import_fields_pretreatment'));
        $this->uniqueField = $this->ParentProcess->modx->getOption('import_unique_field');

        $this->showInTreeDefault = $this->ParentProcess->modx->getOption('ms2_product_show_in_tree_default');
        $AML = $this->ParentProcess->modx->getOption('friendly_alias_max_length');
        if($AML > 0)
            $this->aliasMaxLength = $AML;
        $this->publishDefault = $this->ParentProcess->modx->getOption('publish_default');
        $this->ignoredColumns = (array) json_decode($this->ParentProcess->modx->getOption('import_ignored_columns'));
        $this->isHeadersSet = $this->ParentProcess->modx->getOption('import_is_headers_set');
        $this->removeOldImages = $this->ParentProcess->modx->getOption('import_remove_old_images');
        return true;
    }

    private function verifyConfig() {
        if (empty($this->importResourceSheme) && empty($this->resourceDefault)) {
            return $this->ParentProcess->Log->error('Не определена схема соответствия полей файла полям ресурсов, при этом не указаны значения по умолчанию для создаваемых ресурсов. Импорт не может продолжать работу.', __METHOD__, __LINE__);
        }

        if (empty($this->importProductSheme) && empty($this->productDefault)) {
            return $this->ParentProcess->Log->error('Не определена схема соответствия полей файла полям товаров, при этом не указаны значения по умолчанию для создаваемых товаров. Импорт не может продолжать работу.', __METHOD__, __LINE__);
        }

        switch ($this->uniqueField) {
            case 1:
                if (!isset($this->importResourceSheme['pagetitle']))
                    return $this->ParentProcess->Log->error('Не определено поле файла, в котором указаны заголовки. Импорт не может продолжать работу.', __METHOD__, __LINE__);
                $this->uniqueField = 1;
                break;
            case 2:
                if (!isset($this->importProductSheme['article']))
                    return $this->ParentProcess->Log->error('Не определено поле файла, в котором указаны артикулы. Импорт не может продолжать работу.', __METHOD__, __LINE__);
                $this->uniqueField = 2;
                break;
            case 3:
                if (!isset($this->importResourceSheme['pagetitle']))
                    return $this->ParentProcess->Log->error('Не определено поле файла, в котором указаны заголовки. Импорт не может продолжать работу.', __METHOD__, __LINE__);
                if (!isset($this->importProductSheme['article']))
                    return $this->ParentProcess->Log->error('Не определено поле файла, в котором указаны артикулы. Импорт не может продолжать работу.', __METHOD__, __LINE__);
                $this->uniqueField = 3;
                break;
            default:
                // определим является ли уникальное поле TV-параметром
                $is_tv = (strpos($this->uniqueField, 'tv.') !== false);

                if($is_tv) { // если TV
                    $tv_name = trim(str_replace('tv.', '', $this->uniqueField));
                    if (is_numeric($tv_name)){
                        $this->ParentProcess->Log->error('В качестве уникального поля указано недопустимое имя TV. Импорт не может продолжать работу.', __METHOD__, __LINE__);
                        return false;
                    }
                    if (!isset($this->productTVsSheme[$tv_name])){
                        $this->ParentProcess->Log->error('В качестве уникального поля указано имя TV, для которой не указано соответствие со столбцом таблицы. Импорт не может продолжать работу.', __METHOD__, __LINE__);
                        return false;
                    }
                    $uniq_tv = $this->ParentProcess->modx->getObject('modTemplateVar', array('name' => $tv_name));
                    if (!$uniq_tv) {
                        $this->ParentProcess->Log->error('Не найдена TV указанная в качестве уникального поля. Импорт не может продолжать работу.', __METHOD__, __LINE__);
                        return false;
                    }
                }
                else{ // если поле ресурса
                    if(!in_array($this->uniqueField, $this->allovedToSetAsUniqueFild)){
                        $this->ParentProcess->Log->error('В качестве уникального поля указано недопустимое значение. Импорт не может продолжать работу.', __METHOD__, __LINE__);
                        return false;
                    }
                }
        }

        if (!$this->catalogId) {
            $this->ParentProcess->Log->warning('Не указан, или не корректно указан, основной катклог для импорта, импорт будет произведен в корень контекста', __METHOD__, __LINE__);
            $this->catalogId = 0;
        } else {
            $parent_resource = $this->ParentProcess->modx->getObject('modResource', $this->catalogId);
            if (!$parent_resource) {
                $this->ParentProcess->Log->warning('Не удалось найти ресурс, который указан как основной каталог для импорта, импорт будет произведен в корень контекста', __METHOD__, __LINE__);
                $this->catalogId = 0;
            }
        }

        if (!empty($this->fieldsPretreatment)) {
            foreach ($this->fieldsPretreatment as $column => $snippet_name) {
                if (!$this->ParentProcess->Tools->issetSnippet($snippet_name)) {
                    $this->ParentProcess->Log->warning('Не удалось найти сниппет ' . $snippet_name . ' данные из поля ' . $column . ' не будут игнорироваться', __METHOD__, __LINE__);
                    unset($this->fieldsPretreatment[$column]);

                    foreach($this->importResourceSheme as $field => $col){
                        if($col == $column) unset ($this->importResourceSheme[$field]);
                    }
                    foreach($this->importProductSheme as $field => $col){
                        if($col == $column) unset ($this->importProductSheme[$field]);
                    }
                    foreach($this->importCategorySheme as $field => $col){
                        if($col == $column) unset ($this->importCategorySheme[$field]);
                    }
                    foreach($this->resourceDefault as $field => $col){
                        if($col == $column) unset ($this->resourceDefault[$field]);
                    }
                    foreach($this->productDefault as $field => $col){
                        if($col == $column) unset ($this->productDefault[$field]);
                    }
                    foreach($this->categoryDefault as $field => $col){
                        if($col == $column) unset ($this->categoryDefault[$field]);
                    }
                }
            }
        }

        if ($this->path_to_images && !file_exists($this->ParentProcess->modx->getOption('base_path') . $this->path_to_images) && (isset($this->importProductSheme['image']) || isset($this->productDefault['image']))) {
            $this->ParentProcess->Log->warning('Не существует каталог "' . $this->path_to_images . '", в котором должны находится изображения для товаров. Импорт изображений невозможен.', __METHOD__, __LINE__);
            if (isset($this->importProductSheme['image']))
                unset($this->importProductSheme['image']);
            if (isset($this->productDefault['image']))
                unset($this->productDefault['image']);
        }

        if (!isset($this->importResourceSheme['pagetitle']) || !$this->importResourceSheme['pagetitle']) {
            if (isset($this->importProductSheme['article']) && $this->importProductSheme['article']) {
                $this->ParentProcess->Log->warning('Не указано поле с заголовками, в качестве заголовков будут использоваться артикулы.', __METHOD__, __LINE__);
                $this->importResourceSheme['pagetitle'] = $this->importProductSheme['article'];
            } else {
                return $this->ParentProcess->Log->error('Не указано поле с заголовками. Импорт не может продолжать работу.', __METHOD__, __LINE__);
            }
        }

        return true;
    }

    public function saveToSession() {
        $_SESSION['import']['config'] = array(
            'categoryClass' => $this->categoryClass,
            'resourceClass' => $this->resourceClass,
            'modelPath' => $this->modelPath,
            'catalogId' => $this->catalogId,
            'parent' => $this->parent,
            'subParent' => $this->subParent,
            'importResourceSheme' => $this->importResourceSheme,
            'importProductSheme' => $this->importProductSheme,
            'importCategorySheme' => $this->importCategorySheme,
            'resourceDefault' => $this->resourceDefault,
            'productDefault' => $this->productDefault,
            'categoryDefault' => $this->categoryDefault,
            'subCategorysField' => $this->subCategorysField,
            'removeMissing' => $this->removeMissing,
            'removeMissingCategory' => $this->removeMissingCategory,
            'productTVsSheme' => $this->productTVsSheme,
            'categoryTVsSheme' => $this->categoryTVsSheme,
            'pathToImages' => $this->pathToImages,
            'uniqueField' => $this->uniqueField,
            'showInTreeDefault' => $this->showInTreeDefault,
            'aliasMaxLength' => $this->aliasMaxLength,
            'fieldsPretreatment' => $this->fieldsPretreatment,
            'publishDefault' => $this->publishDefault,
            'historyPath' => $this->historyPath,
            'ignoredColumns' => $this->ignoredColumns,
            'isHeadersSet' => $this->isHeadersSet,
            'removeOldImages' => $this->removeOldImages
        );
        return true;
    }


    public function fromSession() {
        $this->categoryClass = $_SESSION['import']['config']['categoryClass'];
        $this->resourceClass = $_SESSION['import']['config']['resourceClass'];
        $this->modelPath = $_SESSION['import']['config']['modelPath'];
        $this->catalogId = $_SESSION['import']['config']['catalogId'];
        $this->parent = $_SESSION['import']['config']['parent'];
        $this->subParent = $_SESSION['import']['config']['subParent'];
        $this->importResourceSheme = $_SESSION['import']['config']['importResourceSheme'];
        $this->importProductSheme = $_SESSION['import']['config']['importProductSheme'];
        $this->importCategorySheme = $_SESSION['import']['config']['importCategorySheme'];
        $this->resourceDefault = $_SESSION['import']['config']['resourceDefault'];
        $this->productDefault = $_SESSION['import']['config']['productDefault'];
        $this->categoryDefault = $_SESSION['import']['config']['categoryDefault'];
        $this->subCategorysField = $_SESSION['import']['config']['subCategorysField'];
        $this->removeMissing = $_SESSION['import']['config']['removeMissing'];
        $this->removeMissingCategory = $_SESSION['import']['config']['removeMissingCategory'];
        $this->productTVsSheme = $_SESSION['import']['config']['productTVsSheme'];
        $this->categoryTVsSheme = $_SESSION['import']['config']['categoryTVsSheme'];
        $this->pathToImages = $_SESSION['import']['config']['pathToImages'];
        $this->uniqueField = $_SESSION['import']['config']['uniqueField'];
        $this->showInTreeDefault = $_SESSION['import']['config']['showInTreeDefault'];
        $this->aliasMaxLength = $_SESSION['import']['config']['aliasMaxLength'];
        $this->fieldsPretreatment = $_SESSION['import']['config']['fieldsPretreatment'];
        $this->publishDefault = $_SESSION['import']['config']['publishDefault'];
        $this->historyPath = $_SESSION['import']['config']['historyPath'];
        $this->ignoredColumns = $_SESSION['import']['config']['ignoredColumns'];
        $this->isHeadersSet = $_SESSION['import']['config']['isHeadersSet'];
        $this->removeOldImages = $_SESSION['import']['config']['removeOldImages'];
        return true;
    }

}
