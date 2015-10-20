<?php

class SiteController extends CController {

    public function actionIndex() {
        $utenti = Utente::GetTutti();
        $this->render('home', array('utenti' => $utenti));
    }

    public function actionError() {
        $error = Yii::app()->getErrorHandler()->error;
        $this->render('error', $error);
    }

    public function actionUtente($utenteid = null) {
        $utente = Utente::GetUtenteByPk($utenteid);
        var_dump($utente->Ruolo->Descrizione);
    }

}
