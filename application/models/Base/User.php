<?php

Doctrine_Manager::getInstance()->bindComponent('App_Model_User', 'doctrine');

/**
 * EM_Model_Base_User
 * Table definition base class for User model
 * @uses Doctrine_Record
 * @author Dan Haworth <dan@xigen.co.uk>
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

        $this->hasColumn('salt', 'string', 32, array(
            'type'          => 'string',
            'length'        => '32'
        ));

        $this->hasColumn('address1', 'string', 255, array(
            'type'          => 'string',
            'length'        => '255'
        ));

        $this->hasColumn('address2', 'string', 255, array(
            'type'          => 'string',
            'length'        => '255'
        ));

        $this->hasColumn('address3', 'string', 255, array(
            'type'          => 'string',
            'length'        => '255'
        ));

        $this->hasColumn('address4', 'string', 255, array(
            'type'          => 'string',
            'length'        => '255'
        ));

        $this->hasColumn('address5', 'string', 255, array(
            'type'          => 'string',
            'length'        => '255'
        ));

        $this->hasColumn('postcode', 'string', 255, array(
            'type'          => 'string',
            'length'        => '255'
        ));

        $this->hasColumn('company', 'string', 255, array(
            'type'          => 'string',
            'length'        => '255'
        ));

        $this->hasColumn('tel_phone', 'string', 255, array(
            'type'          => 'string',
            'length'        => '255'
        ));

        $this->hasColumn('tel_extension', 'string', 255, array(
            'type'          => 'string',
            'length'        => '255'
        ));

        $this->hasColumn('tel_mobile', 'string', 255, array(
            'type'          => 'string',
            'length'        => '255'
        ));

        $this->hasColumn('default_filters', 'string');

        $this->hasColumn('team_id', 'integer', 4, array(
            'type'          => 'integer',
            'length'        => '4'
        ));

        $this->hasColumn('personal_message', 'string');

        $this->hasColumn('logged_in', 'timestamp');
        $this->hasColumn('last_logged_in', 'timestamp');
    }

    /**
     * setUp
     * Sets up table behaviour and relations.
     * @access public
     * @return void
     */
    public function setUp()
    {
        // Created / Modified field behaviour.
        $this->actAs('Timestampable');
        $this->actAs('Auditable');
        $this->actAs('IndexedArray');

        $this->hasMany('EM_Model_Role as roles', array(
           'local'      => 'user_id',
           'foreign'    => 'role_id',
           'refClass'   => 'EM_Model_RelUserRole'
        ));

        $this->hasMany('EM_Model_BusinessUnit as business_units', array(
           'local'      => 'user_id',
           'foreign'    => 'business_unit_id',
           'refClass'   => 'EM_Model_RelUserBusinessUnit'
        ));

        $this->hasMany('EM_Model_Country as countries', array(
           'local'      => 'user_id',
           'foreign'    => 'country_id',
           'refClass'   => 'EM_Model_RelUserCountry'
        ));

        $this->hasMany('EM_Model_Audit as audits', array(
           'local'      => 'id',
           'foreign'    => 'user_id'
        ));

        $this->hasMany('EM_Model_Asset as assets', array(
           'local'      => 'id',
           'foreign'    => 'user_id'
        ));

        $this->hasMany('EM_Model_Lock as locks', array(
           'local'      => 'id',
           'foreign'    => 'user_id'
        ));

        $this->hasMany('EM_Model_Notification as notifications', array(
            'local'    => 'id',
            'foreign'  => 'user_id'
        ));

        $this->hasMany('EM_Model_AssetWorkflowItem as workflow_items', array(
            'local'    => 'id',
            'foreign'  => 'user_id'
        ));

        $this->hasMany('EM_Model_AssetTypeWorkflowItem as type_workflow_items', array(
            'local'    => 'id',
            'foreign'  => 'user_id'
        ));

        $this->hasOne('EM_Model_Team as team', array(
            'local'    => 'team_id',
            'foreign'  => 'id'
        ));

        $this->hasMany('EM_Model_AssetComment as comments', array(
            'local'     => 'id',
            'foreign'   => 'asset_id',
            'orderBy'   => 'created_at'
        ));
    }
}
