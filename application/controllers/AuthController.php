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
        
        $this->view->form = $form;
    }
}
