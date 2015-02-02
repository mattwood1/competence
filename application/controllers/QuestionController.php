<?php

class QuestionController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->headTitle('Questions');
    }
    
    public function editAction()
    {
        // Create a new test if id is null
    }
    
    public function deleteAction()
    {
        
    }
    
    public function publishAction()
    {
        // Make this question available to intreviewees.
    }
}