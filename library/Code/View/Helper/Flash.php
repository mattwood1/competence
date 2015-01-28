<?php

class Code_View_Helper_Flash extends Zend_View_Helper_Abstract
{
    public function flash()
    {
        $types = array(
            'info'    => 'fa-info-circle',
            'success' => 'fa-check-square',
            'warning' => 'fa-exclamation-triangle',
            'danger'  => 'fa-minus-circle'
        );

        $fm = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');

        ob_start();

        foreach ($types as $type => $icon) {

            $messages = array_merge($fm->getMessages($type), $fm->getCurrentMessages($type));

            if (count($messages)) {
            ?>
            <div class="row flash-message <?php echo $type ?>">
                <div class="col-sd-12">
                    <div class="alert alert-<?php echo $type ?>">
                        <i class="fa <?php echo $icon ?>"></i>
                        <?php
                            foreach ($messages as $message) {
                        ?>
                        <?php echo $message ?>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            }

            $fm->clearCurrentMessages($type);
        }

        return ob_get_clean();
    }
}
