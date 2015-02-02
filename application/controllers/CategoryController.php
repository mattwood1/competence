<?php

class CategoryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // List the Current categories
        $this->view->headTitle('Welcome');
    }
    
    public function editAction()
    {
        // Create Category if id is null
    }
    
    public function deleteAction()
    {
        // Delete a cateogry
    }
}