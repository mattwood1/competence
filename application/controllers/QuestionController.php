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

        $questions = App_Model_QuestionTable::getInstance()->findAll();

        $this->view->questions = $questions;
    }

    public function editAction()
    {
        $this->view->headTitle('Edit Question');
        $form = new App_Form_Question_Edit();

        if ($this->_request->getParam('id')) {
            $question = App_Model_QuestionTable::getInstance()->find($this->_request->getParam('id'));
        } else {
            $question = new App_Model_Question();
        }

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $question->fromArray($form->getValues());
            $question->save();

            $this->_helper->flash->addInfo($question->name . ' has been saved');
            $this->_helper->redirector->gotoRoute(array('controller' => 'question', 'action' => 'index'), null, true);
        }

        $form->populate($question->toArray());
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