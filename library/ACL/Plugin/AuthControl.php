<?php
class ACL_Plugin_AuthControl extends Zend_Controller_Plugin_Abstract
{
    protected $_auth;
    protected $_redirect;

    public function __construct()
    {
        $this->_auth     = PDF_Model_Authentication::getInstance();
        $this->_redirect = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
    }

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        if (!$this->_auth->authoriseRequest($request)) {

            if ($this->_auth->isLoggedIn()) {
                $this->_redirect->gotoRoute(array('module' => 'default', 'controller' => 'auth', 'action' => 'forbidden'));
            } else {
                $this->_redirect->gotoRoute(array('module' => 'default', 'controller' => 'auth', 'action' => 'login'));
            }
        }
    }
}