<?php
/**
* App_Model_CustomerTable
* Table for for Customer model
* @uses Doctrine_Table
* @author James Matthews
*/

class App_Model_UserTable extends Doctrine_Table
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('App_Model_User');
    }
}