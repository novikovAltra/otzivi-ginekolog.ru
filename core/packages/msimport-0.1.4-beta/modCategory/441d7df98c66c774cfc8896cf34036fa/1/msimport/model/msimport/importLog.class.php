<?php
/* class for error logging and collection of history import */

class importLog {
    
    public $ParentProcess;
    
    public $add = 0;
    public $change = 0;
    public $errors = array();
    public $hasError = false;
    public $hasFatalError = false;


    public function __construct(msImport &$ParentProcess) {
        $this->ParentProcess = &$ParentProcess;
    }
    
    
    public function error($error, $method, $line = false) {
        $this->hasFatalError = true;
        $this->warning($error, $method, $line, 'FATAL ERROR');
        return array('success' => false, 'message' => $this->getErrorsList());
    }

    public function dump($var, $method, $line = false){
        $method = $line ? $method . ' line ' . $line : $method;
        $this->ParentProcess->modx->log(modX::LOG_LEVEL_ERROR, 'DUMP IMPORT: ' . var_export($var, true) . ' (' . $method . ')');
        return count($this->errors);
    }
    
    public function warning($worning, $method, $line = false, $eroor_level = 'WARNING') {
        $method = $line ? $method . ' line ' . $line : $method;
        $this->ParentProcess->modx->log(modX::LOG_LEVEL_ERROR, $eroor_level.' IMPORT: '.$worning.' ('.$method.')');
        $this->errors[] = $worning.' ('.$method.')';
        $this->hasError = true;
        return count($this->errors);
    }
    
    
    public function getErrorsList($separator = '<br/>') {
        $this->ParentProcess->Tools->clearSession();
        return implode($separator, $this->errors);
    }
    
    public function addToHistory($old_data) {
        if(!isset($_SESSION['import']['history'])) $_SESSION['import']['history'] = array();
        $_SESSION['import']['history'][] = $old_data;
        return true;
    }
    
    public function saveHistory() {
        file_put_contents($this->ParentProcess->Config->historyPath.date('d-m-Y_h-i-s').'.history.php', var_export($_SESSION['import']['history'], true));
    }
}