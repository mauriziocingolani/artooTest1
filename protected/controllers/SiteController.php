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
        if (Yii::app()->getRequest()->isPostRequest) :
            $utente->setAttributes($_POST['Utente']);
            if ($utente->validate()) :
                $utente->save(false);
            endif;
        endif;
        $this->render('utente', array('utente' => $utente));
    }

}
