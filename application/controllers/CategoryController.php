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
        $this->view->headTitle('Categories');
    }
    
    public function editAction()
    {
        $form = new App_Form_Category_Edit();
        
        if ($this->_request->getParam('id')) {
            $categoryTable = new App_Model_CategoryTable();
            $category = $categoryTable->getInstance()->find($this->_request->getParam('id'));
        } else {
            $category = new App_Model_Category();
        }
        
        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $category->fromArray($form->getValues())->save();
        }
        
        $form->populate($category->toArray());
        $this->view->form = $form;
    }
    
    public function deleteAction()
    {
        // Delete a cateogry
    }
}