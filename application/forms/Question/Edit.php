<?php
class App_Form_Question_Edit extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->addElement("text", "name", array(
            "label" => "Name",
            "required" => true,
            "placeholder" => "Name for the question"
        ))

        ->addElement("select", "categoryid", array(
            "label" => "Category",
            "required" => true,
            "multiOptions" => App_Model_CategoryTable::getInstance()->fetchPairs()
        ))

        ->addElement("select", "type", array(
            "label" => "Question Type",
            "required" => true,
            "multiOptions" => App_Model_QuestionTable::$_type
        ))

        ->addElement("select", "level", array(
            "label" => "Question Type",
            "required" => true,
            "multiOptions" => App_Model_QuestionTable::$_level
        ))

        ->addElement("textarea", "question", array(
            "label" => "Question",
            "required" => true,
            "rows" => 3,
            "placeholder" => "Your Question"
        ))

        ->addElement("textarea", "answers", array(
            "label" => "Possible Answers",
            "rows" => 5,
        ))

        ->addElement("submit", "submit", array(
            "label" => "Save"
        ));
    }
}