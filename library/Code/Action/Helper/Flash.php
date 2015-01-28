<?php

/**
 * Zend_Controller_Action_Helper_Messenger
 *
 * Adds a message to the flash messenger stack.
 *
 * @uses Zend_Controller_Action_Helper_Abstract
 * @author Dan Haworth <dan@xigen.co.uk>
 */

class Code_Action_Helper_Flash extends Zend_Controller_Action_Helper_Abstract
{
    const MESSAGE_INFO    = 'info';
    const MESSAGE_SUCCESS = 'success';
    const MESSAGE_WARNING = 'warning';
    const MESSAGE_ERROR   = 'danger';

    /**
     * _flash_messenger - Reference to a static flash messenger object.
     *
     * @var mixed
     * @access protected
     */
    protected $_flash_messenger;

    /**
     * __construct Class constructor
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        $this->_flash_messenger = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');
    }

    /**
     * direct Sets a flash message
     *
     * @param string $message
     * @param string $type
     * @access public
     * @return void
     */
    public function direct($message, $type)
    {
        $this->_flash_messenger->addMessage($message, $type);
    }

    /**
     * addInfo Adds an informative message to the stack
     *
     * @param string $message
     * @access public
     * @return void
     */
    public function addInfo($message)
    {
        $this->direct($message, self::MESSAGE_INFO);
    }

    /**
     * addSuccess Adds a success message to the stack
     *
     * @param string $message
     * @access public
     * @return void
     */
    public function addSuccess($message)
    {
        $this->direct($message, self::MESSAGE_SUCCESS);
    }

    /**
     * addWarning Adds a warning message to the stack
     *
     * @param string $message
     * @access public
     * @return void
     */
    public function addWarning($message)
    {
        $this->direct($message, self::MESSAGE_WARNING);
    }

    /**
     * addError Adds an error message to the stack
     *
     * @param string $message
     * @access public
     * @return void
     */
    public function addError($message)
    {
        $this->direct($message, self::MESSAGE_ERROR);
    }
}
