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
        if ($utenteid == null) :
            $utente = new Utente;
        else :
            $utente = Utente::GetUtenteByPk($utenteid);
        endif;
        if (Yii::app()->getRequest()->isPostRequest) :
            $isNew = $utente->isNewRecord;
            $utente->setAttributes($_POST['Utente']);
            try {
                if ($utente->save()) :
                    $user = Yii::app()->user;
                    if ($isNew) :
                        $user->setFlash('success', 'Utente creato!!!');
                        return $this->redirect(array('/utente/' . Yii::app()->db->lastInsertID));
                    else :
                        $user->setFlash('success', 'Utente modificato!!!');
                        return $this->refresh();
                    endif;
                endif;
            } catch (CDbException $ex) {
                Yii::app()->user->setFlash('error', 'ERRORE: ' . $ex->getMessage());
            } catch (Exception $ex) {
                
            }

        endif;
        $this->render('utente', array('utente' => $utente));
    }

}
