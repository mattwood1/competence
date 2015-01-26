<?php

/**
 * App_Model_User
 * Model class for User model.
 * @uses App_Model_Base_User
 * @author Dan Haworth <dan@xigen.co.uk>
 */
class App_Model_User extends App_Model_Base_User
{

    public function changePassword($password)
    {

    }

    public function getFullName()
    {
        if ($this->firstname && $this->surname) {

            return sprintf('%s %s', $this->firstname, $this->surname);
        }

        return false;
    }

    public function hasRole($roleName)
    {

    }
}