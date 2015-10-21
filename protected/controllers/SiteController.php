<?php

class SiteController extends CController {

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('denied', 'error', 'index'),
            ),
            array('deny',
                'deniedCallback' => array($this, 'actionDenied'),
            ),
        );
    }

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function actionIndex() {
        $model = new Utente('search');
        $model->unsetAttributes();
        if (isset($_GET['Utente'])) :
            $model->attributes = $_GET['Utente'];
        endif;
        $this->render('home', array('model' => $model));
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

    public function actionDenied() {
        throw new CHttpException(403, 'Non sei autorizzato a visualizzare questa pagina.');
    }

}
