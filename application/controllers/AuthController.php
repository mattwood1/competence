<?php

class AuthController extends Zend_Controller_Action
{
    protected $_auth;

    public function init()
    {
        /* Initialize action controller here */

        $this->_auth = ACL_Model_Authentication::getInstance();
    }

    public function loginAction()
    {
        $form = new ACL_Form_Login();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

            // process authentication
            switch($this->_auth->logIn($form->getValue('emailaddress'), $form->getValue('password'))) {
                case ACL_Model_Authentication::LOGIN_MISSING_CREDENTIALS :
                    $this->_helper->flash->addError('Some login details are missing');
                    break;

                case ACL_Model_Authentication::LOGIN_INVALID_CREDENTIALS :
                    $this->_helper->flash->addError('Invalid login details');
                    break;

                case ACL_Model_Authentication::LOGIN_ACCOUNT_LOCKED :
                    $this->_helper->flash->addWarning('This account has been locked');
                    break;

                case ACL_Model_Authentication::LOGIN_SUCCESS :
                    $this->_helper->redirector->gotoRoute(array('controller' => 'index', 'action' => 'index'),null, true);
                    break;
            }
        }

        $this->view->headTitle('Log in');
        $this->view->form = $form;
    }
    
    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector->gotoRoute(array('controller' => 'auth', 'action' => 'login'), null, true);
    }
    
    public function forgottonAction()
    {
        $form = new ACL_Form_Forgotton();
        
        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $user = App_Model_UserTable::getInstance()->findOneByEmailaddress($form->getValue('emailaddress'));
            
            $user->updated_at = date("Y-m-d h:i:s");
            $user->save();
            
            
            _d($user);
        }
        
        $this->view->form = $form;
    }
    
    public function forbiddenAction()
    {
        
    }

}