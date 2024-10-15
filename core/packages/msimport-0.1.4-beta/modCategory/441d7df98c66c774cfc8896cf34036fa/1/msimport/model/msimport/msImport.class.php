<?php
/* new main class for import */

require_once dirname(__FILE__).'/importConfig.class.php';
require_once dirname(__FILE__).'/importTools.class.php';
require_once dirname(__FILE__).'/importLog.class.php';


class msImport {
    
    public $modx;
    public $Config;
    public $Tools;
    public $Log;
    public $config = array();
            
    function __construct(modX &$modx, array $config=array()) {
        $this->modx =& $modx;
        
        if(!isset($_SESSION['import'])) $_SESSION['import'] = array();
        $this->Tools = new importTools($this);
        $this->Log = new importLog($this);
        $this->Config = new importConfig($this, $config);
        
        $namespace = $this->modx->getObject('modNamespace', 'msimport');
        
        $basePath = str_replace("{core_path}",$this->modx->getOption('core_path'),$namespace->get('path'));
        $assetsUrl = $this->modx->getOption('assets_url').'components/msimport/';
        
        $this->config = array_merge(array(
            'basePath' => $basePath,
            'corePath' => $basePath,
            'modelPath' => $basePath.'model/',
            'processorsPath' => $basePath.'processors/',
            'jsUrl' => $assetsUrl.'js/',
            'cssUrl' => $assetsUrl.'css/',
            'assetsUrl' => $assetsUrl,
            'connectorUrl' => $assetsUrl.'connector.php',
        ), $config);

        $this->modx->addPackage('msImport', $this->config['modelPath'], 'import_');
    }

    /**
     * Initializes the class into the proper context
     *
     * @access public
     * @param string $ctx
     * @return string $output
     */
    public function initialize($ctx='web') {
        switch ($ctx) {
            case 'mgr':
                $this->modx->lexicon->load('msimport:default');
                include_once dirname(__FILE__) . "/importControllerRequest.class.php";
                $this->request = new importControllerRequest($this);
                return $this->request->handleRequest();
                break;
            default: break;
        }
        return true;
    }
}
?>