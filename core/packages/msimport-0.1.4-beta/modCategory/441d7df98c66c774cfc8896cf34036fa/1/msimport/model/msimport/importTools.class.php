<?php
/* helper class to import */
class importTools {
    
    public $ParentProcess;
    
    public $product;
    public $itemData;
    public $fileName;
    public $Parser;
    public $endImport;
    public $chenge = 0;
    public $add = 0;
    public $gallery = array();
    public $subCategory = array();
    public $row_position;
    public $page;


    public function __construct(msImport &$ParentProcess) {
        $this->ParentProcess = &$ParentProcess;
        if(isset($_SESSION['import']['file_ext'])){
            $parser_path = dirname(__FILE__).'/parsers/'.$_SESSION['import']['file_ext'].'.importParser.class.php';
            if(!include_once $parser_path){
                return $this->ParentProcess->Log->error('Не удалось подключить файл с определением парсера.', __METHOD__, __LINE__);
            }
            else if(!class_exists('importParser')){
                return $this->ParentProcess->Log->error('Класс-парсер ('.$_SESSION['import']['file_ext'].') для импорта не определен.', __METHOD__, __LINE__);
            }
            $this->Parser = new importParser($this->ParentProcess);
        }
    }
    
    
    public function issetSnippet($snipet_name) {
        $snippet = $this->ParentProcess->modx->getObject('modSnippet', array('name' => $snipet_name));
        if($snippet) return true;
        else return false;
    }
    
    
    public function clearSession() {
        if(isset($_SESSION['import'])) unset($_SESSION['import']);
        return true;
    }
    
    
    public function fileUpload() {
        if(!isset($_FILES['userfile'])){
            return $this->ParentProcess->Log->error('Файл не загружен', __METHOD__, __LINE__);
        }
        else{
            $file_ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
            $file_name = date('Y-m-d-h-i-s', time()).".".$file_ext;
            $file_path = $this->ParentProcess->Config->pathToTables.$file_name;
            
            $parser_path = dirname(__FILE__).'/parsers/'.$file_ext.'.importParser.class.php';
            if(!file_exists($parser_path)){
                return $this->ParentProcess->Log->error('Загруженый файл не поддерживается.', __METHOD__, __LINE__);
            }
            else{
                if(!include_once $parser_path){
                    return $this->ParentProcess->Log->error('Не удалось подключить файл с определением парсера.', __METHOD__, __LINE__);
                }
                else if(!class_exists('importParser')){
                    return $this->ParentProcess->Log->error('Класс-парсер ('.$file_ext.') для импорта не определен.', __METHOD__, __LINE__);
                }
                else if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $file_path)){
                    return $this->ParentProcess->Log->error('Файл не загружен. Возможно проблемы с правами на запись в папку '.$this->ParentProcess->modx->getOption('assets_path').'components/msimport/files/', __METHOD__, __LINE__);
                }
                else{
                    // если предыдущая попытка импорта закончилась ошибкой, или же обновили страницу до того как импорт отработал, в сессии могли остаться данные из таблицы, нужно их удалить
                    if(isset($_SESSION['import']['pages']))
                        unset($_SESSION['import']['pages']);
                    if(isset($_SESSION['import']['sheets']))
                        unset($_SESSION['import']['sheets']);

                    $this->fileName = $file_name;
                    $this->Parser = new importParser($this->ParentProcess);
                    $_SESSION['import']['file_ext'] = $file_ext;
                    if($this->ParentProcess->Config->removeMissing){
                        $this->removeGoods();
                    }
                    $this->ParentProcess->Config->saveToSession();
                    
                    return array('success' => true, 'message' => $file_name);
                }
            }
        }
    }
    
    
    public function removeGoods($resourceClass = NULL) {
        // нужно определить контекст, попробуем сделать это получив сontext_key основного каталога
        $catalog = $this->ParentProcess->modx->getObject($this->ParentProcess->Config->categoryClass, $this->ParentProcess->Config->catalogId);
        if(!$catalog)
            $context = 'web';
        else
            $context = $catalog->context_key;

        // теперь, чтоб удалить ресурсы в основном каталоге, получим их id
        $catalog_resources_ids = $this->ParentProcess->modx->getChildIds($this->ParentProcess->Config->catalogId, 5, array('context' => $context));

        // на случай, если нужно будет удалить и категории во втором проходе, сделаю возможность передать класс удаляемых ресурсов
        if(!$resourceClass)
            $resourceClass = $this->ParentProcess->Config->resourceClass;

        //  сформируем условия для выборки удаляемых ресурсов
        $criteria = array(
            'id:IN' => $catalog_resources_ids
        );
        if($resourceClass == $this->ParentProcess->Config->categoryClass && !$this->ParentProcess->Config->removeMissingCategory)
            $criteria['isfolder'] = 0;

        // получаем ресурсы для удаления
        $products = $this->ParentProcess->modx->getCollection($resourceClass, $criteria);

        // теперь удаляем
        foreach($products as $product){
            $product->deleted = 1;
            if(!$product->save())
                $this->ParentProcess->Log->warning('Не удалось удалить товар '.$product->get('pagetitle').'('.$product->get('id').').', __METHOD__, __LINE__);
        }

        // теперь, если нужно удалять и категории - сделаем это
        if($this->ParentProcess->Config->removeMissingCategory && $resourceClass != $this->ParentProcess->Config->categoryClass)
            $this->removeGoods($this->ParentProcess->Config->categoryClass);
    }
    
    
    public function processRows($sheet, $start, $page, $total) {
        $end = false;
        for ($i = $start; !$end; $i++) {
            $row = $sheet[$i];
            $start = $i;
            if ($i > count($sheet)){
                if (($page + 1) == $total) {
                    $this->endImport = true;
                    $this->ParentProcess->Log->saveHistory();
                    $this->clearSession();
                }
                else{
                    $page++;
                    $start = 2; // устанавливаем позицию начала импорта следующего листа - 2 строка (чтобы пропустить заголовок)
                }
            }
            else {
                $clearedData = $this->processData($row, $i, $page);
            }
            
            /*----- Ограничение добаваляемых за один проход товаров.
             * Если $end станет true то добавляемый товар будет последним в текущем цикле ---------*/

            $end = true; // пока добавляем по одному товару без вариантов

            /*----- /Ограничение добаваляемых за один проход товаров ---------*/
        }

        return array(
            'success' => true,
            'position' => $start,
            'page' => $page,
            'add' => $this->add,
            'change' => $this->change,
            'endImport' => $this->endImport,
            'lposition' => count($sheet)
        );
    }
    

    public function parse_file($file_path, $start, $page, $total) {
        $sheet = $this->Parser->getData($file_path, $page);
        if($this->ParantProcess->Log->hasFatalError) return $sheet;
        return $this->processRows($sheet, $start, $page, $total);
    }

    /**
     * @param $row
     * @param $row_position
     * @param $page
     * @return int
     */
    public function processData($row, $row_position, $page){
        $this->row_position = $row_position;
        $this->page = $page;
        $clearedData = array();

        // проганяем данные через сниппеты
        $modData = $row;
        foreach($row as $field => $field_data){
            if(isset($this->ParentProcess->Config->fieldsPretreatment) && array_key_exists($field, $this->ParentProcess->Config->fieldsPretreatment)){
                $snippet_name = $this->ParentProcess->Config->fieldsPretreatment[$field];
                $tryUpdate = $this->runSnippet($snippet_name, array('in' => $modData[$field], 'field' => $field, 'row' => $modData));
                if(is_array($tryUpdate))
                    $modData = $tryUpdate;
                else
                    $this->ParentProcess->Log->warning('Сниппет '.$snippet_name.' не вернул корректного результата после обработки поля '.$field.' в строке '.$row_position.'. Обработка поля будет пропущена.', __METHOD__, __LINE__);
            }
            else
                $modData[$field] = trim($modData[$field]);

            // если после обработки (а возможно и изначально) поле пустое, то его нужно просто удалить из массива, чтоб не мешалось + таким образом обеспечим возможность оставлять данные без изменений
            if(!$modData[$field] && !is_numeric($modData[$field]))
                unset($modData[$field]);
        }
        $row = $modData;

        if(isset($this->ParentProcess->Config->importCategorySheme['id'])){
            if(!$row[$this->ParentProcess->Config->importCategorySheme['id']] || !ctype_digit($row[$this->ParentProcess->Config->importCategorySheme['id']])){
                unset($row[$this->ParentProcess->Config->importCategorySheme['id']]);
            }
        }

        // если явно не указана категория, нужно её попробовать определить
        if(!$this->ParentProcess->Config->importResourceSheme['parent'])
            $this->ParentProcess->Config->importResourceSheme['parent'] = 'parent';
        $row[$this->ParentProcess->Config->importResourceSheme['parent']] = $this->getCategoryId($row);

        foreach ($this->ParentProcess->Config->importCategorySheme as $field){
            if(isset($row[$field]))
                unset($row[$field]);
        }
        foreach ($this->ParentProcess->Config->categoryTVsSheme as $field){
            if(isset($row[$field]))
                unset($row[$field]);
        }

        // теперь проверим есть ли какие-небудь данные о товаре, кроме тех что мы установили в процессе выполнения метода
        // для начала скопируем все данные в новую временную переменную
        $tmp = $row;
        // теперь удалим добавленные нами данные
        unset($tmp[$this->ParentProcess->Config->importResourceSheme['parent']]);
        // если после этого данных нет - значит товар добавлять не нужно
        if(empty($tmp))
            return 0;

        // если не указан алиас, то нужно алиас таки указать
        if(!isset($this->ParentProcess->Config->importResourceSheme['alias']) || !isset($row[$this->ParentProcess->Config->importResourceSheme['alias']]) || !$row[$this->ParentProcess->Config->importResourceSheme['alias']]) {
            // определяем алиас исходя из указанного уникального поля. Ведь если поле уникально, то и сформированный на его основе алиас - тоже будет уникален
            switch ($this->ParentProcess->Config->uniqueField) {
                case 1: // если уникальным полем указан заголовок
                    if (!$row[$this->ParentProcess->Config->importResourceSheme['pagetitle']]) {
                        $this->ParentProcess->Log->warning('Не указан заголовок в строке ' . $row_position . ' листа ' . $page . '. Эта запись опущена.', __METHOD__, __LINE__);
                        return false;
                    }
                    $clearedData['alias'] = $row[$this->ParentProcess->Config->importResourceSheme['pagetitle']];
                    break;
                case 2: // если уникальным полем указан артикул
                    if (!$row[$this->ParentProcess->Config->importProductSheme['article']]) {
                        $this->ParentProcess->Log->warning('Не указан артикул в строке ' . $row_position . ' листа ' . $page . '. Эта запись опущена.', __METHOD__, __LINE__);
                        return false;
                    }
                    $clearedData['alias'] = $row[$this->ParentProcess->Config->importProductSheme['article']];
                    break;
                case 3: // если уникальным полем указана связка заголовка с артикулом
                    if (!$row[$this->ParentProcess->Config->importProductSheme['article']] && !$row[$this->ParentProcess->Config->importResourceSheme['pagetitle']]) {
                        $this->ParentProcess->Log->warning('Не указаны артикул и заголовок в строке ' . $row_position . ' листа ' . $page . '. Эта запись опущена.', __METHOD__, __LINE__);
                        return false;
                    }
                    if (!$row[$this->ParentProcess->Config->importProductSheme['article']] || !$row[$this->ParentProcess->Config->importResourceSheme['pagetitle']]) {
                        if (!$row[$this->ParentProcess->Config->importProductSheme['article']])
                            $clearedData['alias'] = $row[$this->ParentProcess->Config->importResourceSheme['pagetitle']];
                        if (!$row[$this->ParentProcess->Config->importResourceSheme['pagetitle']])
                            $clearedData['alias'] = $row[$this->ParentProcess->Config->importProductSheme['article']];
                    } else
                        $clearedData['alias'] = $row[$this->ParentProcess->Config->importProductSheme['article']] . '-' . $row[$this->ParentProcess->Config->importResourceSheme['pagetitle']];
                    break;
                default:
                    // определим является ли уникальное поле TV-параметром
                    $is_tv = (strpos($this->ParentProcess->Config->uniqueField, 'tv.') !== false);

                    if ($is_tv) { // если TV
                        $tv_name = trim(str_replace('tv.', '', $this->ParentProcess->Config->uniqueField));
                        if (!$row[$this->ParentProcess->Config->productTVsSheme[$tv_name]]) {
                            $this->ParentProcess->Log->warning('Не указано значение уникального поля в строке ' . $row_position . ' листа ' . $page . '. Эта запись опущена.', __METHOD__, __LINE__);
                            return false;
                        }
                        $clearedData['alias'] = $row[$this->ParentProcess->Config->productTVsSheme[$tv_name]];
                    } else { // если поле ресурса
                        if (!$row[$this->ParentProcess->Config->importResourceSheme[$this->ParentProcess->Config->uniqueField]]) {
                            $this->ParentProcess->Log->warning('Не указано значение уникального поля в строке ' . $row_position . ' листа ' . $page . '. Эта запись опущена.', __METHOD__, __LINE__);
                            return false;
                        }
                        $clearedData['alias'] = $row[$this->ParentProcess->Config->importResourceSheme[$this->ParentProcess->Config->uniqueField]];
                    }
            }
        }

        $clearedData = array_merge($row, $clearedData);

        // формируем массив по которому будем добавлять картинки к товару miniShop2
        if(isset($this->ParentProcess->Config->importProductSheme['image'])){
            if(isset($clearedData[$this->ParentProcess->Config->importProductSheme['image']]) && $clearedData[$this->ParentProcess->Config->importProductSheme['image']]){
                $imgs_path = $this->ParentProcess->modx->getOption('base_path').$this->ParentProcess->Config->pathToImages;
                foreach(explode(',', $clearedData[$this->ParentProcess->Config->importProductSheme['image']]) as $img_name){
                    $img_name = trim($img_name);
                    if(!file_exists($imgs_path.$img_name)){
                        $name_parts = array_reverse(explode('.',$img_name));
                        $extension = $name_parts[0];
                        $file_without_ext = str_replace($extension, '', $img_name);
                        if($extension == strtolower($extension)){
                            $file_name_upper = $file_without_ext.strtoupper($extension);
                            if(file_exists($imgs_path.$file_name_upper)){
                                $this->gallery[] = $file_name_upper;
                            }
                            else
                                $this->ParentProcess->Log->warning('Файл '.$img_name.' не найден и не будет присоединен к ресурсу. Строка '.$this->row_position.' листа '.$this->page.'.', __METHOD__, __LINE__);
                        }
                        else{
                            $file_name_lower = $file_without_ext.strtolower($extension);
                            if(file_exists($imgs_path.$file_name_lower)){
                                $this->gallery[] = $file_name_lower;
                            }
                            else
                                $this->ParentProcess->Log->warning('Файл '.$img_name.' не найден и не будет присоединен к ресурсу. Строка '.$this->row_position.' листа '.$this->page.'.', __METHOD__, __LINE__);
                        }
                    }
                    else $this->gallery[] = $img_name;
                }
            }
            unset($clearedData[$this->ParentProcess->Config->importProductSheme['image']]);
        }

        // собираем массив с объектами допкатегорий miniShop2
        if($this->ParentProcess->Config->subCategorysField && isset($clearedData[$this->ParentProcess->Config->subCategorysField])){
            if($clearedData[$this->ParentProcess->Config->subCategorysField]){
                foreach(explode(',', $clearedData[$this->ParentProcess->Config->subCategorysField]) as $subCategiryId){
                    $subCategiryId = trim($subCategiryId);
                    if($subCategiryId && ctype_digit($subCategiryId)){
                        $subCategiry = $this->ParentProcess->modx->getObject($this->ParentProcess->Config->categoryClass, $subCategiryId);
                        if($subCategiry) $this->subCategory[] = $subCategiry;
                    }
                }
            }
            unset($clearedData[$this->ParentProcess->Config->subCategorysField]);
        }

        // проверяем наличие необходимых полей
        if(!isset($this->ParentProcess->Config->importResourceSheme['pagetitle']))
            $this->ParentProcess->Config->importResourceSheme['pagetitle'] = 'pagetitle';
        if((!isset($clearedData[$this->ParentProcess->Config->importResourceSheme['pagetitle']]) || !$clearedData[$this->ParentProcess->Config->importResourceSheme['pagetitle']]) && isset($clearedData[$this->ParentProcess->Config->importProductSheme['article']]) && $clearedData[$this->ParentProcess->Config->importProductSheme['article']])
            $clearedData[$this->ParentProcess->Config->importResourceSheme['pagetitle']] = $clearedData[$this->ParentProcess->Config->importProductSheme['article']];
        
        $resourceCriteria = array();

        // пытаемся получить уже существующий товар по уникальному полю указанному в настройках
        switch ($this->ParentProcess->Config->uniqueField){
            case 1:
                $resourceCriteria['pagetitle'] = $clearedData[$this->ParentProcess->Config->importResourceSheme['pagetitle']];
                $old_product = $this->ParentProcess->modx->getObject($this->ParentProcess->Config->resourceClass, $resourceCriteria);
                break;
            case 2:
                $resourceCriteria['article'] = $clearedData[$this->ParentProcess->Config->importProductSheme['article']];
                $old_product_data = $this->ParentProcess->modx->getObject('msProductData', $resourceCriteria);
                $old_product = $old_product_data->Product;
                break;
            case 3:
                $resourceCriteria['pagetitle'] = $clearedData[$this->ParentProcess->Config->importResourceSheme['pagetitle']];
                $old_product_ = $this->ParentProcess->modx->getCollection($this->ParentProcess->Config->resourceClass, $resourceCriteria);
                $old_product = false;
                if($old_product_){
                    foreach($old_product_ as $product){
                        if($product->Data->article == $clearedData[$this->ParentProcess->Config->importProductSheme['article']]){
                            $old_product = $product;
                            break;
                        }
                    }
                }
                break;
            default:
                // определим является ли уникальное поле TV-параметром
                $is_tv = (strpos($this->ParentProcess->Config->uniqueField, 'tv.') !== false);

                if($is_tv) { // если TV
                    $tv_name = trim(str_replace('tv.', '', $this->ParentProcess->Config->uniqueField));
                    if (is_numeric($tv_name) || !isset($clearedData[$this->ParentProcess->Config->productTVsSheme[$tv_name]]) || !$clearedData[$this->ParentProcess->Config->productTVsSheme[$tv_name]]) {
                        $this->ParentProcess->Log->warning('Не верно указано значение уникального поля в строке ' . $row_position . ' листа ' . $page . '. Эта запись опущена.', __METHOD__, __LINE__);
                        return false;
                    }
                    $uniq_tv = $this->ParentProcess->modx->getObject('modTemplateVar', array('name' => $tv_name));
                    $tv_value = $clearedData[$this->ParentProcess->Config->productTVsSheme[$tv_name]];
                    $uniq_tv_value = $this->ParentProcess->modx->getObject('modTemplateVarResource', array('tmplvarid' => $uniq_tv->get('id'), 'value' => $tv_value));
                    if ($uniq_tv_value)
                        $old_product = $this->ParentProcess->modx->getObject($this->ParentProcess->Config->resourceClass, $uniq_tv_value->contentid);
                }
                else{ // если поле ресурса
                    $resourceCriteria[$this->ParentProcess->Config->uniqueField] = $clearedData[$this->ParentProcess->Config->importResourceSheme[$this->ParentProcess->Config->uniqueField]];
                    $resourceCriteria['class_key'] = $this->ParentProcess->Config->resourceClass;
                    $old_product = $this->ParentProcess->modx->getObject($this->ParentProcess->Config->resourceClass, $resourceCriteria);
                }
        }

        // если импортируем данные уже созданного товара
        if($old_product){
            if(isset($clearedData['alias']))
                unset($clearedData['alias']);
            if(isset($this->ParentProcess->Config->importResourceSheme['alias']))
                unset($this->ParentProcess->Config->importResourceSheme['alias']);
            foreach($clearedData as $column => $value){
                if(in_array($column, $this->ParentProcess->Config->ignoredColumns))
                    unset($clearedData[$column]);
            }
            $res = $this->updateProduct($old_product, $clearedData);
        }
        // если создаем новый товар
        else{
            if(isset($clearedData['alias'])){
                $clearedData['alias'] = $this->makeAlias($clearedData['alias']);
            }
            else if(isset($this->ParentProcess->Config->importResourceSheme['alias']) && isset($clearedData[$this->ParentProcess->Config->importResourceSheme['alias']]) && $clearedData[$this->ParentProcess->Config->importResourceSheme['alias']])
                $clearedData['alias'] = $this->makeAlias($clearedData[$this->ParentProcess->Config->importResourceSheme['alias']]);
            
            $res = $this->addProduct($clearedData);
        }
        return $res;
    }
    
    
    //Методы для добавления товаров
    
    public function updateProduct($product, $productData, $this_new = false) {
        $resData = array(
            'deleted' => 0
        );

        // внесем данные ресурса в общий массив
        foreach($this->ParentProcess->Config->importResourceSheme as $field => $column){
            if(isset($productData[$column]))
                $resData[$field] = $productData[$column];
        }

        // теперь данные товара
        foreach($this->ParentProcess->Config->importProductSheme as $field => $column){
            if(isset($productData[$column]))
                $resData[$field] = $productData[$column];
        }

        // теперь установим значения TV
        foreach($this->ParentProcess->Config->productTVsSheme as $field => $column){
            if(isset($productData[$column]))
                $product->setTVValue($field, $productData[$column]);
            unset($productData[$column]);
        }

        $resData['id'] = $product->get('id');
        $resData['class_key'] = $this->ParentProcess->Config->resourceClass;

        $tmpResData = $resData;

        $resData = array_merge($this->ParentProcess->Config->resourceDefault, $this->ParentProcess->Config->productDefault, $resData);

        foreach($tmpResData as $key => $val){
            if((is_numeric($val) || is_bool($val)) && intval($val) === 0 && intval($resData[$key]) > 0)
                $resData[$key] = $val;
        }

        $product->fromArray($resData);

        if($product->save()){
            if(!$this_new){
                $this->ParentProcess->Log->addToHistory(date('i:s').' Изменен товар с id '.$product->get('id'));
                $this->change = $this->change + 1;
            }
        }
        
        $new_id = $product->get('id');
        if($this->ParentProcess->Config->resourceClass == 'msProduct') {
            $this->mergeGallery($new_id);
            $this->enjoyProductToSubcategoryes($new_id);
        }
        return $new_id;
    }
    
    
    public function addProduct($productData) {
        $resData = array();
        $resData['alias'] = $productData['alias'];
        $resData['pagetitle'] = $productData[$this->ParentProcess->Config->importResourceSheme['pagetitle']];
        $resData['class_key'] = $this->ParentProcess->Config->resourceClass;
        
        $response = $this->ParentProcess->modx->runProcessor('resource/create', $resData, array('processors_path' => $this->ParentProcess->modx->getOption('core_path').'model/modx/processors/'));
        
        if ($response->isError()) {
            $this->ParentProcess->Log->warning('Не удалось создать товар по данным из строки '.$this->row_position.' листа '.$this->page.'. Описание ошибок процессора: '.var_export($response->getAllErrors(), true), __METHOD__, __LINE__);
            return false;
        }
        else {
            $resource = $response->getObject();
            $this->ParentProcess->Log->addToHistory(date('i:s').' Доваылен товар с id '.$resource['id']);
            $this->add = $this->add + 1;
        }

        $new = $this->ParentProcess->modx->getObject($this->ParentProcess->Config->resourceClass, $resource['id']);

        return $this->updateProduct($new, $productData, true);
    }


    public function mergeGallery($product_id) {
        $i = 0;
        if (!empty($this->gallery)) {

            // если нужно удалять старые изображения, то удалим их перед добавлением новых
            if($this->ParentProcess->Config->removeOldImages) {
                $old_images = $this->ParentProcess->modx->getCollection('msProductFile', array("product_id" => $product_id));
                if ($old_images) {
                    $ids = array();
                    foreach ($old_images as $removed_img) {
                        $ids[] = $removed_img->get('id');
                    }
                    $this->ParentProcess->modx->runProcessor('gallery/remove_multiple', array(
                        'ids' => implode(',', $ids),
                        'product_id' => $product_id
                    ), array('processors_path' => $this->ParentProcess->modx->getOption('core_path') . 'components/minishop2/processors/mgr/')
                    );
                }
            }

            foreach ($this->gallery as $image){
                $path = $this->ParentProcess->modx->getOption('base_path') . $this->ParentProcess->Config->pathToImages;
                $file_img = $path . $image;

                // если мы предварительно удалили все картинки, то пытаться найти изображение с таким именем не имеет смысла
                if(!$this->ParentProcess->Config->removeOldImages) {
                    $old_image = $this->ParentProcess->modx->getObject('msProductFile', array("product_id" => $product_id, "name" => $image));
                    if (count($old_image))
                        return false;
                    else {
                        $old_image = $this->ParentProcess->modx->getObject('msProductFile', array("product_id" => $product_id, "name" => strtolower($image)));
                        if (count($old_image))
                            return false;
                    }
                }

                $response = $this->ParentProcess->modx->runProcessor('gallery/upload', array(
                    'file' => $file_img,
                    'id' => $product_id
                ), array('processors_path' => $this->ParentProcess->modx->getOption('core_path') . 'components/minishop2/processors/mgr/')
                );
                if ($response->isError()) {
                    $this->ParentProcess->Log->warning('Не удалось добавить изображение '.$image.' к товару с id '.$product_id.'. Описание ошибок процессора: '.var_export($response->getAllErrors(), true), __METHOD__, __LINE__);
                }
                else $i++;
            }
        }
        return $i;
    }
    
    
    public function enjoyProductToSubcategoryes($resource_id) {
        if (!empty($this->subCategory)) {
            foreach ($this->subCategory as $sub) {
                $sql = "INSERT INTO ".$this->ParentProcess->modx->getTableName('msCategoryMember')." (`product_id`, `category_id`) VALUES ('" . $resource_id . "','" . $sub->get('id') . "')";
                $stmt = $this->ParentProcess->modx->prepare($sql);
                $stmt->execute();
            }
        }
        return count($this->subCategory);
    }
    

    public function translit($alias){
//        $trans = array("і" => "i", "ї" => "i", "І" => "i", "Ї" => "i", "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "jo", "ж" => "zh", "з" => "z", "и" => "i", "й" => "jj", "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "kh", "ц" => "c", "ч" => "ch", "ш" => "sh", "щ" => "shh", "ъ" => '', "ы" => "y", "ь" => "", "э" => "eh", "ю" => "yu", "я" => "ya", "А" => "A", "Б" => "B", "В" => "V", "Г" => "G", "Д" => "D", "Е" => "E", "Ё" => "JO", "Ж" => "ZH", "З" => "Z", "И" => "I", "Й" => "JJ", "К" => "K", "Л" => "L", "М" => "M", "Н" => "N", "О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T", "У" => "U", "Ф" => "F", "Х" => "KH", "Ц" => "C", "Ч" => "CH", "Ш" => "SH", "Щ" => "SHH", "Ъ" => '', "Ы" => "Y", "Ь" => "", "Э" => "EH", "Ю" => "YU", "Я" => "YA", "'" => "", " " => "_", "<" => "", ">" => "", "[" => "", "]" => "", "+" => "", "," => "", ";" => "", ":" => "", "!" => "", "@" => "", "#" => "", "$" => "", "%" => "", "^" => "", "&" => "and", "?" => "", "." => "", "/" => "-", "|" => "-", '\\' => "-", '"' => '', "'" => '');
        //$alias = strtolower(substr(strtr($title, $trans), 0, $this->ParentProcess->Config->aliasMaxLength));

        $translitClassPath = $this->ParentProcess->modx->getOption(
            'friendly_alias_translit_class_path',
            false,
            $this->ParentProcess->modx->getOption('core_path', false, MODX_CORE_PATH) . 'components/'
        );
        $translitClass = $this->ParentProcess->modx->getOption(
            'friendly_alias_translit_class',
            false,
            'modx.translit.modTransliterate'
        );
        $translitTableName = $this->ParentProcess->modx->getOption(
            'friendly_alias_translit',
            false,
            'russian'
        );
        if ($this->ParentProcess->modx->getService('translit', $translitClass, $translitClassPath, array())) {
            $alias = $this->ParentProcess->modx->translit->translate($alias, $translitTableName);
        }
        $filter = $this->ParentProcess->modx->getOption('friendly_alias_restrict_chars_pattern');
        $trimed_chars = $this->ParentProcess->modx->getOption('friendly_alias_trim_chars');
        $delimeter = $this->ParentProcess->modx->getOption('friendly_alias_word_delimiter');
        $delimeters_filter = $this->ParentProcess->modx->getOption('friendly_alias_word_delimiters');
        $delimeters_filter .= ' ';
        $alias = preg_replace($filter, '', $alias);
        $alias = trim($alias, $trimed_chars);
        $alias = str_replace(str_split($delimeters_filter), $delimeter, $alias);
        return $alias;
    }

    public function makeAlias($alias, $iteration = 0) {
        if ($iteration) {
            if($iteration > 1) {
                $alias = explode('-', $alias);
                array_pop($alias);
                $alias[] = $iteration;
                $alias = implode('-', $alias);
            }
            else
                $alias .= '-' . $iteration;
        }
        else{
            $title = str_replace("\r\n", '', $alias);
            $title = str_replace("\n", '', $title);
            $alias = $this->translit($title);
        }
            
        $check = $this->ParentProcess->modx->getObject('modResource', array('alias' => $alias));

        if ($check){
            return $this->makeAlias($alias, $iteration + 1);
        }
        else{
            return $alias;
        }
    }
    
    
    public function getCategoryId($productData) {
        $parent = NULL;

        // сначала попробуем получить категорию исходя из данных товара
        if(isset($this->ParentProcess->Config->importResourceSheme['parent']) && isset($productData[$this->ParentProcess->Config->importResourceSheme['parent']]) && $productData[$this->ParentProcess->Config->importResourceSheme['parent']]){
            $category = $this->ParentProcess->modx->getObject($this->ParentProcess->Config->categoryClass, intval($productData[$this->ParentProcess->Config->importResourceSheme['parent']]));
            if(!$category)
                $this->ParentProcess->Log->warning('Не удалось найти категории по полю parent товара в строке '.$this->row_position.' листа '.$this->page.'. Импорт попытается найти категорию по id в данных категории.', __METHOD__, __LINE__);
            else{
                $this->updateCategory($category, $productData);
                $parent = $category->get('id');
            }
        }
        // в случае, если не указана категория в данных товара, или же не получилось её получить, пробуем сделать это опираясь на id в данных категории
        if(!$parent && isset($this->ParentProcess->Config->importCategorySheme['id']) && isset($productData[$this->ParentProcess->Config->importCategorySheme['id']]) && $productData[$this->ParentProcess->Config->importCategorySheme['id']]){
            $category = $this->ParentProcess->modx->getObject($this->ParentProcess->Config->categoryClass, intval($productData[$this->ParentProcess->Config->importCategorySheme['id']]));
            if(!$category)
                $this->ParentProcess->Log->warning('Не удалось найти категории по id в строке '.$this->row_position.' листа '.$this->page.'. Импорт попытается найти категорию по заголовку.', __METHOD__, __LINE__);
            else{
                $this->updateCategory($category, $productData);
                $parent = $category->get('id');
            }
        }

        // в случае, если и теперь ничего не вышло, пробуем найти категорию опираясь на pagetitle в данных категории
        if(!$parent && isset($this->ParentProcess->Config->importCategorySheme['pagetitle']) && isset($productData[$this->ParentProcess->Config->importCategorySheme['pagetitle']]) && $productData[$this->ParentProcess->Config->importCategorySheme['pagetitle']]){
            $category = $this->ParentProcess->modx->getObject($this->ParentProcess->Config->categoryClass, array('pagetitle' => $productData[$this->ParentProcess->Config->importCategorySheme['pagetitle']], 'class_key' => $this->ParentProcess->Config->categoryClass));
            if(!$category)
                $parent = $this->creteCategory($productData);
            else{
                $this->updateCategory($category, $productData);
                $parent = $category->get('id');
            }
            if(!$parent){
                $this->ParentProcess->Log->warning('Не указан заголовок для категории в строке '.$this->row_position.' листа '.$this->page.', создать её невозможно. Импорт товара будет произведен в основной каталог для импорта.', __METHOD__, __LINE__);
            }
        }
        if(!$parent){
            $parent = $this->ParentProcess->Config->catalogId;
        }
        return $parent;
    }
    
    
    public function creteCategory($productData) {
        $resData = array();
        foreach($this->ParentProcess->Config->importCategorySheme as $field => $column){
            if(isset($productData[$this->ParentProcess->Config->importCategorySheme[$field]]))
                $resData[$field] = $productData[$this->ParentProcess->Config->importCategorySheme[$field]];
        }

        $tvsData = array();
        foreach($this->ParentProcess->Config->categoryTVsSheme as $field => $column){
            if(isset($productData[$column]))
                $tvsData[$field] = $productData[$column];
            unset($productData[$column]);
        }
        
        if(!isset($resData['alias']) || !$resData['alias']) $resData['alias'] = $this->makeAlias($resData['pagetitle']);
        else $resData['alias'] = $this->makeAlias($resData['alias']);
        
        $classDefault = array(
            'parent' => $this->ParentProcess->Config->catalogId,
            'published' => $this->ParentProcess->Config->publishDefault,
            'class_key' => $this->ParentProcess->Config->categoryClass,
            'isfolder' => true
        );
        
        $resData = array_merge($classDefault, $this->ParentProcess->Config->categoryDefault, $resData);

        $response = $this->ParentProcess->modx->runProcessor('resource/create', $resData);
        if ($response->isError()) {
            $this->ParentProcess->Log->warning('Не удалось содать категорию по данным в строке '.$this->row_position.' листа '.$this->page.'. Товар будет добавлен в основной каталог для импорта. Описание ошибок процессора: '.var_export($response->getAllErrors(), true), __METHOD__, __LINE__);
            return $this->ParentProcess->Config->parent;
        }

        $this->add = $this->add + 1;

        $cat = $response->getObject();

        $category = $this->ParentProcess->modx->getObject($this->ParentProcess->Config->categoryClass, $cat['id']);
        if($category) {
            foreach ($tvsData as $field => $column) {
                $category->setTVValue($field, $column);
            }
        }
        return $cat['id'];
    }
    
    
    public function updateCategory($category, $productData) {
        $resData = array();
        foreach($this->ParentProcess->Config->importCategorySheme as $field => $column){
            if(isset($productData[$this->ParentProcess->Config->importCategorySheme[$field]]) && !in_array($column, $this->ParentProcess->Config->ignoredColumns))
                $resData[$field] = $productData[$this->ParentProcess->Config->importCategorySheme[$field]];
        }

        foreach($this->ParentProcess->Config->categoryTVsSheme as $field => $column){
            if(isset($productData[$column]))
                $category->setTVValue($field, $productData[$column]);
            unset($productData[$column]);
        }
        
        $resData = array_merge(array('deleted' => 0), $this->ParentProcess->Config->categoryDefault, $resData);
        
        $category->fromArray($resData);
        $category->save();

        return $category->get('id');
    }
    
    
    public function runSnippet($snippet_name, $params = array()) {
        if(isset($params['row']))
            $params['row'] = json_encode($params['row']);
        try {
            $result = $this->ParentProcess->modx->runSnippet($snippet_name, $params);
        } catch (Exception $exc) {
            $this->ParentProcess->Log->warning($exc->getTraceAsString(), __METHOD__, __LINE__);
            return false;
        }
        if(isset($params['row']))
            $result = json_decode($result, true);
        return $result;
    }
}