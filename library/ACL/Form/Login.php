<?php
class ACL_Form_Login extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->addPrefixPath('Code_Form_Element', 'Code/Form/Element', 'element');

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

        ->addElement("button", "login", array(
            "label" => "Log in",
            "type" => "submit"
        ))

        ->addElement("link", "forgotton", array(
            'value' => "Forgotton Password",
            'class' => "btn btn-default",
            'url' => '/auth/forgotton'
        ))

        ->addElement("link", "register", array(
            'value' => "Register",
            'class' => "btn btn-default",
            'url' => '/auth/register'
        ))
        ;

        $this->addDisplayGroup(
            array('login', 'forgotton', 'register'),
            'actions',
            array(
                'disableLoadDefaultDecorators' => true,
                'decorators' => array('Actions'),
                'class' => 'pull-right'
            )
        );
    }
}
