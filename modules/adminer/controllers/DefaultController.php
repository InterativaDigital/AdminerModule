<?php

class DefaultController extends CController
{
    public function actionIndex()
    {
        require_once Yii::app()->params['adminerPath'] . "/adminer.php";
    }
}