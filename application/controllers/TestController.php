<?php

class TestController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function indexAction()
    {
        // Display a list of tests and statuses (taken, to be taken, deleted)
        
        // if user is interviewee show tests to take assigned to user
    }

    public function takeAction()
    {
        $this->view->headTitle('Welcome');
    }

    public function editAction()
    {
        // if no id is passed create a new test.
        
        $this->view->headTitle('Edit Test');
    }
    
    public function resultAction()
    {
        // Get the results of a test
        
        $this->view->headTitle('Test Result');
    }
    
    public function deleteAction()
    {
        
    }
    
    public function restoreAction()
    {
        // Restore a deleted test
    }
    
}