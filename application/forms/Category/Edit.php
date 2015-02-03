<?php
class App_Form_Category_Edit extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->addElement("text", "name", array(
            "label" => "Title",
            "required" => true,
            "placeholder" => "Name for the category"
        ))
        
        ->addElement("submit", "submit", array(
            "label" => "Save"
        ));
    }
}