<?php
class ACL_Form_Login extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->setColType('sm');

        $this->addElement("text", "emailaddress", array(
                "label" => "Username",
                "required" => true,
                "placeholder" => "Your email address",
                'decorators' => array('ViewHelper')
        ))

        ->addElement("password", "password", array(
                "label" => "Password",
                "required" => true,
                "placeholder" => "Your password",
        ))

        ->addElement("submit", "login", array(
            "label" => "Log in"
        ));
    }
}
