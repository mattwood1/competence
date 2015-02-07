<?php
/**
* App_Model_CustomerTable
* Table for for Customer model
* @uses Doctrine_Table
* @author James Matthews
*/

class App_Model_QuestionTable extends Doctrine_Table
{
    
    public static $_level = array(
        1 => 'Easy',
        2 => 'Medium',
        3 => 'Difficult',
        4 => 'Hard'
    );
    
    public static $_type = array(
        "single" => "Single Choice",
        "multi" => "Multiple Choice",
        "text" => "Free Text",
        "code" => "Code Text"
    );
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('App_Model_Question');
    }
}