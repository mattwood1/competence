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
            $auth = new ACL_Model_Authentication;
            $auth->logIn($form->username, $form->password);
        }
        
        
        $this->view->form = $form;
    }
}