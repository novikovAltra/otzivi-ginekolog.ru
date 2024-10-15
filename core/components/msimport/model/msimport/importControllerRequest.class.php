<?php

require_once MODX_CORE_PATH . 'model/modx/modrequest.class.php';

/**
 * Encapsulates the interaction of MODx manager with an HTTP request.
 *
 * {@inheritdoc}
 *
 * @package mpormgr
 * @extends modRequest
 */
class importControllerRequest extends modRequest {

    public $discuss = null;
    public $actionVar = 'action';
    public $defaultAction = 'msImport';

    function __construct(msImport &$msImport) {
        parent::__construct($msImport->modx);
        $this->msImport =& $msImport;
    }

    /**
     * Extends modRequest::handleRequest and loads the proper error handler and
     * actionVar value.
     */
    public function handleRequest() {
        $this->loadErrorHandler();

        // save page to manager object. allow custom actionVar choice for extending classes
        $this->action = isset($_REQUEST[$this->actionVar]) ? $_REQUEST[$this->actionVar] : $this->defaultAction;

        return $this->_prepareResponse();
    }

    /**
     * Prepares the MODx response to a mgr request that is being handled.
     *
     * @access public
     * @return boolean True if the response is properly prepared.
     */
    protected function _prepareResponse() {
        $modx =& $this->modx;
        $msImport =& $this->msImport;

        $viewHeader = include $this->msImport->config['corePath'].'controllers/mgr/msImport_header.php';

        $f = $this->msImport->config['corePath'].'controllers/mgr/'.$this->action.'.php';

        if(file_exists($f)) {
            $viewOutput = include $f;
        }
        else {
            $viewOutput = 'Action not found: '.$f;
        }

        return $viewHeader.$viewOutput;
    }
}

?>