<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function indexAction()
    {
        $this->view->headTitle('Users');
        
        $users = App_Model_UserTable::getInstance()->findAll();
        
        $this->view->users = $users;
    }

    public function editAction()
    {
        $this->view->headTitle('Edit User');
        $form = new App_Form_User_Edit();
        
        if ($this->_request->getParam('id')) {
            $user = App_Model_UserTable::getInstance()->find($this->_request->getParam('id'));
        } else {
            $user = new App_Model_User();
        }

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $user->fromArray($form->getValues());
            $user->save();

            $this->_helper->flash->addInfo($user->firstname . ' ' . $user->surname . ' has been saved');
            $this->_helper->redirector->gotoRoute(array('controller' => 'user', 'action' => 'index'), null, true);
        }

        $form->populate($user->toArray());
        
        $this->view->form = $form;
    }
    
    public function deleteAction()
    {
        
    }
    
}