<?php
class App_Form_User_Edit extends Twitter_Bootstrap_Form_Horizontal
{
    protected $_disabled = true;
    
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
                
        ->addElement("text", "emailaddress", array(
            "label" => "Email",
            "required" => true
        ))
                
        ->addElement("password", "passwordReset", array(
            "label" => "Password",
            "required" => true,
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