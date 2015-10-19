<?php

class SiteController extends CController {

    public function actionIndex() {
        $this->render('home');
    }

    public function actionError() {
        $error = Yii::app()->getErrorHandler()->error;
        $this->render('error', $error);
    }

}
