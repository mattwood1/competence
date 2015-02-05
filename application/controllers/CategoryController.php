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

        $categoryTable = new App_Model_CategoryTable();
        $categories = $categoryTable->getInstance()->findAll();

        $this->view->categories = $categories;
    }

    public function editAction()
    {
        $this->view->headTitle('Edit Categories');
        $form = new App_Form_Category_Edit();

        if ($this->_request->getParam('id')) {
            $categoryTable = new App_Model_CategoryTable();
            $category = $categoryTable->getInstance()->find($this->_request->getParam('id'));
        } else {
            $category = new App_Model_Category();
        }

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $category->fromArray($form->getValues());
            $category->save();

            $this->_helper->flash->addInfo($category->name . ' has been saved');
            $this->_helper->redirector->gotoRoute(array('controller' => 'category', 'action' => 'index'), null, true);
        }

        $form->populate($category->toArray());
        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $categoryTable = new App_Model_CategoryTable();
        $category = $categoryTable->getInstance()->find($this->_request->getParam('id'));
//        $category->delete();

        $this->_helper->flash->addWarning($category->name . ' has been deleted');

        $this->_helper->redirector->gotoRoute(array('controller' => 'category', 'action' => 'index'), null, true);
    }

}