<?php
class App_Form_User_Edit extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->addElement("text", "firstname", array(
            "label" => "First Name",
            "required" => true,
            "placeholder" => "Name for the question"
        ))

        ->addElement("text", "surname", array(
            "label" => "Surname",
            "required" => true,
            "multiOptions" => App_Model_CategoryTable::getInstance()->fetchPairs()
        ))

        ->addElement("select", "role", array(
            "label" => "Role",
            "required" => true,
            "multiOptions" => array(
                'interviewee' => 'Interviewee',
                'staff'       => 'Staff',
                'manager'     => 'Manager'
            )
        ))

        ->addElement("submit", "submit", array(
            "label" => "Save"
        ));
    }
}