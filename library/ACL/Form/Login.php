<?php
class ACL_Form_Login extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->setLabelColSize(4);
        $this->setFieldColSize(8);
        $this->setColType('sm');

        $this->addElement("text", "emailaddress", array(
                "label" => "Username",
                "required" => true,
                "placeholder" => "Your email address",
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
