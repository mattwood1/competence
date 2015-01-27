<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function loginAction()
    {
        $form = new ACL_Form_Login();
        
        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            // process authentication
            $this->_performLogin($this->_request->getPost());
            
//            $auth->logIn($form->username, $form->password);
        }
        
        $this->view->form = $form;
    }
    
    protected function _performLogin( $credentials )
    {
        // get out auth adapter
        $authAdapter = $this->_getAuthAdapter();

        //var_dump($credentials, $authAdapter);exit;

        // set credentials
        $authAdapter->setIdentity  ($credentials['username']);
        $authAdapter->setCredential($credentials['password']);

        // attempt authentication
        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate( $authAdapter );

        // successful login
        if($result->isValid()) {
            $user = $authAdapter->getResultRowObject();
            //$this->_flash('Log in sucess', Coda_Helper_Flash::SUCCESS);
            return $user;
        }
        //$this->_flash('Log in failed', Coda_Helper_Flash::ERROR);
        return false;
    }

    
    protected function _getAuthAdapter() {

        $authAdapter = new ACL_Model_Table(Doctrine_Core::getConnectionByTableName('App_Model_User'));

        $authAdapter
            ->setTableName('App_Model_User')
            ->setIdentityColumn('username')
            ->setCredentialColumn('password')
            ->setCredentialTreatment('MD5(?)');

        return $authAdapter;
    }
}