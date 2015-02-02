<?php

Doctrine_Manager::getInstance()->bindComponent('App_Model_Category', 'doctrine');

/**
 * App_Model_Base_User
 * Table definition base class for User model
 * @uses Doctrine_Record
 * @author Matthew Wood <matthew@xigen.co.uk>
 */
class App_Model_Base_Category extends Doctrine_Record
{

    /**
     * setTableDefinition
     * Defines the table structure to the doctrine ORM.
     * @access public
     * @return void
     */
    public function setTableDefinition()
    {
        $this->setTableName('categories');

        $this->hasColumn('id', 'integer', 4, array(
            'type'          => 'integer',
            'unsigned'      => true,
            'primary'       => true,
            'autoincrement' => true,
            'length'        => 4
        ));

        $this->hasColumn('name', 'string', 5000, array(
            'type'          => 'string',
            'length'        => '5000'
        ));

        $this->hasColumn('created', 'timestamp');
        $this->hasColumn('modified', 'timestamp');
    }

    /**
     * setUp
     * Sets up table behaviour and relations.
     * @access public
     * @return void
     */
    public function setUp()
    {

    }
}
