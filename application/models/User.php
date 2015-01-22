<?php

/**
 * App_Model_User
 * Model class for User model.
 * @uses App_Model_Base_User
 * @author Dan Haworth <dan@xigen.co.uk>
 */
class App_Model_User extends App_Model_Base_User
{

    protected $_visible_locales;

    public function changePassword($password)
    {
        $this->salt = openssl_random_pseudo_bytes(32);
        $this->password = $this->genPasswordHash($password);
    }

    // generates a salted password hash for this record
    public function genPasswordHash($password)
    {
        $config = Zend_Registry::get('config');
        return hash('sha512', $this->salt . $config->epson->password->peanuts . $password);
    }

    public function getFullName()
    {
        if ($this->firstname && $this->surname) {

            return sprintf('%s %s', $this->firstname, $this->surname);
        }

        return false;
    }

    public function getRelationList($rel)
    {
        $ids = array();

        foreach ($this->$rel as $relation) {

            $ids[] = $relation->id;
        }

        return implode(', ', $ids);
    }

    public function hasRole($roleName)
    {
        foreach ($this->roles as $role) {

            if ($role->name == $roleName || $role->id == $roleName) {

                return true;
            }
        }

        return false;
    }

    public function getAssetFields()
    {
        $fields = array();

        if ($this->hasRole('Administrator')) {

            foreach (EM_Model_RoleTable::definedFields() as $key => $val) {

                $fields[$key] = 'editable';
            }
        }
        else {

            foreach (EM_Model_RoleTable::definedFields() as $key => $val) {

                $fields[$key] = 'hidden';
            }

            foreach ($this->roles as $role) {

                if ($vis = unserialize($role->asset_fields)) {

                    foreach ($vis as $name => $func) {

                        if (array_key_exists($name, $fields)) {

                            if (array_search($func, EM_Model_RoleTable::definedFieldsRadio()) > array_search($fields[$name], EM_Model_RoleTable::definedFieldsRadio())) {

                                $fields[$name] = $func;
                            }
                        }
                    }
                }
            }
        }

        return $fields;
    }

    public function getVisibleFilters()
    {
        $filters = array();

        foreach ($this->roles as $role) {

            if ($vis = unserialize($role->visibility)) {

                if (is_array($vis['filters'])) {

                    $filters = array_merge($filters, $vis['filters']);
                }
            }
        }

        return array_unique($filters);
    }

    public function getVisibleColumns()
    {
        $columns = array();

        foreach ($this->roles as $role) {

            if ($vis = unserialize($role->visibility)) {

                if (is_array($vis['columns'])) {

                    $columns = array_merge($columns, $vis['columns']);
                }
            }
        }

        return array_unique($columns);
    }

    public function getVisibleLocales()
    {

        if (!$this->_visible_locales) {

            $this->_visible_locales = array();

            $query = Doctrine_Query::create()
                ->select('l.id')
                ->from('EM_Model_Locale l')
                ->leftJoin('l.country c')
                ->leftJoin('c.users u')
                ->where('u.id = ?', $this->id);

            foreach ($query->execute(array(), Doctrine_Core::HYDRATE_ARRAY) as $row) {

                $this->_visible_locales[] = $row['id'];
            }

            if (!count($this->_visible_locales)) {

                // no visible locales, assign all to user
                foreach (EM_Model_LocaleTable::getInstance()->findAll() as $locale) {

                    $this->_visible_locales[] = $locale->id;
                }
            }
        }

        return $this->_visible_locales;
    }

    public function getRestrictedLocales()
    {
        $locales = array();

        foreach ($this->countries as $country) {

            foreach ($country->locales as $locale) {

                $locales[] = $locale->id;
            }
        }

        return $locales;
    }
}
