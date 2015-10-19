<?php

class SiteController extends CController {

    public function actionIndex() {
        $utenti = Utente::model()->findAll(array(
            'condition' => 'Abilitato=1',
            'order' => 'UtenteID ASC',
        ));
        $this->render('home', array('utenti' => $utenti));
    }

    public function actionError() {
        $error = Yii::app()->getErrorHandler()->error;
        $this->render('error', $error);
    }

    public function actionUtente($utenteid = null) {
        $utente = Utente::model()->findByPk($utenteid);
        var_dump($utente->Ruolo->Descrizione);
    }

}
