<?php

Doctrine_Manager::getInstance()->bindComponent('App_Model_Question', 'doctrine');

/**
 * App_Model_Base_User
 * Table definition base class for User model
 * @uses Doctrine_Record
 * @author Matthew Wood <matthew@xigen.co.uk>
 */
class App_Model_Base_Question extends Doctrine_Record
{

    /**
     * setTableDefinition
     * Defines the table structure to the doctrine ORM.
     * @access public
     * @return void
     */
    public function setTableDefinition()
    {
        $this->setTableName('questions');

        $this->hasColumn('id', 'integer', 4, array(
            'type'          => 'integer',
            'unsigned'      => true,
            'primary'       => true,
            'autoincrement' => true,
            'length'        => 4
        ));

        $this->hasColumn('name', 'string', 10000, array(
            'type'          => 'string',
            'length'        => '5000'
        ));

        $this->hasColumn('categoryid', 'integer', 4, array(
                'type'          => 'integer',
                'length'        => '4'
        ));

        $this->hasColumn('type', 'string', 10000, array(
                'type'          => 'string',
                'length'        => '10000'
        ));

        $this->hasColumn('level', 'integer', 4, array(
                'type'          => 'integer',
                'length'        => '4'
        ));

        $this->hasColumn('question', 'string', 10000, array(
                'type'          => 'string',
                'length'        => '10000'
        ));

        $this->hasColumn('answers', 'array', 10000, array(
                'type'          => 'array',
                'length'        => '10000'
        ));

        $this->hasColumn('version', 'integer', 10, array(
                'type'          => 'integer',
                'length'        => '10'
        ));

        $this->hasColumn('deleted_at', 'timestamp');
        $this->hasColumn('created_at', 'timestamp');
        $this->hasColumn('updated_at', 'timestamp');
    }

    /**
     * setUp
     * Sets up table behaviour and relations.
     * @access public
     * @return void
     */
    public function setUp()
    {
        $this->actAs('Timestampable');
        $this->actAs('SoftDelete');
        
        $this->actAs('Versionable', array(
                'versionColumn' => 'version',
                'className' => '%CLASS%Version',
                'auditLog' => true
            )
        );
        
        $this->hasOne('App_Model_Category as category', array(
            'local' => 'categoryid',
            'foreign' => 'id'
        ));
    }
}
