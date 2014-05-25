<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
if(Yii::app()->user->isGuest) {
    $this->renderPartial('login',array("model"=>new LoginForm));
} else {
    $this->widget('application.components.CDivMenu',
            array(
                'items' => array(
                    array('label' => 'Gastos', 'url' => array('/gasto')),
                    array('label' => 'Categorías de gastos', 'url' => array('/categoria')),
                    array('label' => 'Usuarios', 'url' => array('/usuario'))
                )
            ));
    //print_r(Yii::app()->user->getFlashes());
}
?>
