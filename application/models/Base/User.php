<?php

Doctrine_Manager::getInstance()->bindComponent('App_Model_User', 'doctrine');

/**
 * App_Model_Base_User
 * Table definition base class for User model
 * @uses Doctrine_Record
 * @author Matthew Wood <matthew@xigen.co.uk>
 */
class App_Model_Base_User extends Doctrine_Record
{

    /**
     * setTableDefinition
     * Defines the table structure to the doctrine ORM.
     * @access public
     * @return void
     */
    public function setTableDefinition()
    {
        $this->setTableName('users');

        $this->hasColumn('id', 'integer', 4, array(
            'type'          => 'integer',
            'unsigned'      => true,
            'primary'       => true,
            'autoincrement' => true,
            'length'        => 4
        ));

        $this->hasColumn('firstname', 'string', 50, array(
            'type'          => 'string',
            'length'        => '50'
        ));

        $this->hasColumn('surname', 'string', 50, array(
            'type'          => 'string',
            'length'        => '50'
        ));

        $this->hasColumn('email_address', 'string', 255, array(
            'type'          => 'string',
            'length'        => '255'
        ));

        $this->hasColumn('password', 'string', 128, array(
            'type'          => 'string',
            'length'        => '128'
        ));

        $this->hasColumn('role', 'string', 50, array(
            'type'          => 'string',
            'length'        => '50'
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
