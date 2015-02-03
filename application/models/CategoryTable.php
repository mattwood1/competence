<?php
/**
* App_Model_CustomerTable
* Table for for Customer model
* @uses Doctrine_Table
* @author James Matthews
*/

class App_Model_CategoryTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('App_Model_Category');
    }
}