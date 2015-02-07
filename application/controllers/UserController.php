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
    }

    public function editAction()
    {
        // if no id is passed create a new test.
        
        $this->view->headTitle('Edit User');
    }
    
    public function deleteAction()
    {
        
    }
    
}