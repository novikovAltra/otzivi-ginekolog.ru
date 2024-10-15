<?php

class importParser {

    public $assets_path;

    public function __construct($parentProcess) {
        $this->ParentProcess = $parentProcess;
        $this->assets_path = dirname(dirname(dirname(dirname(__FILE__)))) . '/assets/';
    }

    public function getSheets($filename) {

        if (!include_once $this->assets_path . 'PHPExcel.php'){
            return $this->ParentProcess->Log->error('Не удалось подключить файл ' . $this->assets_path . 'PHPExcel.php. Получить данных для импорта невозможно.', __METHOD__);
        }
        
        if (!include_once $this->assets_path . 'PHPExcel/IOFactory.php'){
            return $this->ParentProcess->Log->error('Не удалось подключить файл ' . $this->assets_path . 'PHPExcel/IOFactory.php. Получить данные для импорта невозможно.', __METHOD__);
        }
        
        $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
        $cacheSettings = array( 'memoryCacheSize' => '32MB');
        PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
        
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load($this->ParentProcess->modx->getOption('assets_path') . 'components/msimport/files/' . $filename);
        
        $total = $objPHPExcel->getSheetCount();
        $sheets = array();
        for ($i = 0; $i < $total; $i++) {
            $objWorksheet = $objPHPExcel->setActiveSheetIndex($i);
            $pagetitle = $objWorksheet->getTitle();
            $sheets[$i] = $pagetitle;
        }
        $_SESSION['import']['sheets'] = $sheets;

        return array('success' => true, 'message' => $total);
    }

    public function getData($filename = NULL, $page = 0) {
        
        if (!$filename)
            return $this->ParentProcess->Log->error('Не передан путь к таблице с данными для импорта. Работа импорта остановлена при попытке обработать лист #' . intval($page) + 1 . '.', __METHOD__);
        $file_path = $this->ParentProcess->Config->pathToTables.$filename;
        if(!file_exists($file_path))
            return $this->ParentProcess->Log->error('Не верный путь к таблице с данными для импорта. Работа импорта остановлена при попытке обработать лист #' . intval($page) + 1 . '.', __METHOD__);
        if (isset($_SESSION['import']['pages'][$page])) {
            $sheet = $_SESSION['import']['pages'][$page];
        }
        else {
            
            if (!include_once $this->assets_path . 'PHPExcel.php')
                return $this->ParentProcess->Log->error('Не удалось подключить файл ' . $this->assets_path . 'PHPExcel.php. Получить данных для импорта невозможно.', __METHOD__);
            
            if (!include_once $this->assets_path . 'PHPExcel/IOFactory.php')
                return $this->ParentProcess->Log->error('Не удалось подключить файл ' . $this->assets_path . 'PHPExcel/IOFactory.php. Получить данных для импорта невозможно.', __METHOD__);
            
        
            $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
            $cacheSettings = array( 'memoryCacheSize' => '32MB');
            PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
            
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($file_path);
            $objPHPExcel->setActiveSheetIndex($page);
            
            $sheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

            $_SESSION['import']['pages'][$page] = $sheet;
        }
        
        return $sheet;
    }

}
