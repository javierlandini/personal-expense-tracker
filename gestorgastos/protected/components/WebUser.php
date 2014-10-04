<?php
/**
 * Class to add additional attributes to the global Yii::app()->user object.
 *
 * @author Javier
 */
class WebUser extends CWebUser {
    public function isAdmin() {
        return $this->getId() == 1 ? TRUE: FALSE;
    }
    
    public function login($identity, $duration = 0) {
        return parent::login($identity, $duration);
    }
}

?>
