<?php
class App_Form_Question_Edit extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->addElement("text", "title", array(
            "label" => "Title",
            "required" => true,
            "placeholder" => "Title for the question"
        ))
        
        ->addElement("submit", "submit", array(
            "label" => "Save"
        ));
    }
}