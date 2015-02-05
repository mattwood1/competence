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
        $this->view->headTitle('Edit Question');

        $form = new App_Form_Question_Edit();

        $this->view->form = $form;
    }

    public function deleteAction()
    {

    }

    public function publishAction()
    {
        // Make this question available to intreviewees.
    }
}