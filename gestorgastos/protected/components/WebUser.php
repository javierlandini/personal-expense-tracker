<?php
/**
 * Class to add additional attributes to the global Yii::app()->user object.
 *
 * @author Javier
 */
class WebUser extends CWebUser {
    private $_isAdmin;
    public function isAdmin() {
        //var_dump(Yii::app()->getSession());
        //return Yii::app()->getSession()->isAdmin();
        return 1;
        return $this->_isAdmin;
    }
    
    public function login($identity, $duration = 0) {
        $this->_isAdmin = $identity->isAdmin();
        return parent::login($identity, $duration);
    }
}

?>
