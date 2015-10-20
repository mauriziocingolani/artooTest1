<?php

/**
 * @property Ruolo $Ruolo
 */
class Utente extends CActiveRecord {

    public $UtenteID;
    public $RuoloID;
    public $Nome;
    public $Cognome;
    public $Email;
    public $Abilitato;

    public function attributeLabels() {
        return array(
            'UtenteID' => 'ID utente',
            'Nome' => 'Nome di battesimo',
        );
    }

    public function relations() {
        return array(
            'Ruolo' => array(self::BELONGS_TO, 'Ruolo', 'RuoloID'),
//            'Logins' => array(self::HAS_MANY, 'Login', 'logins.UtenteID'),
        );
    }

    public function rules() {
        return array(
            array('Nome, Cognome', 'default'),
            array('Nome, Cognome', 'length', 'max' => 50, 'tooLong' => 'Massimo 50 caratteri!'),
            array('Email', 'email', 'message' => 'Email non valida!!!', 'allowEmpty' => false),
            array('Abilitato', 'boolean'),
            array('RuoloID', 'safe'),
            array('UtenteID, Ruolo', 'safe', 'on' => 'search'),
        );
    }

    public function tableName() {
        return 'utenti';
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Restituisce tutti i record della tabella utenti.
     * @param boolean $soloAbilitati True per restituire solo gli utenti abilitati
     * @return Utente[] Lista degli utenti
     */
    public static function GetTutti($soloAbilitati = false) {
        $criteria = new CDbCriteria;
        $criteria->order = 'UtenteID ASC';
        if ($soloAbilitati === true) :
            $criteria->addCondition('Abilitato=:abilitato');
            $criteria->params = array(':abilitato' => true);
        endif;
        return self::model()->with('Ruolo')->findAll($criteria);
    }

    public static function GetUtenteByPk($utenteid) {
        return self::model()->with('Ruolo')->findByPk($utenteid);
    }

    public function search() {
        $criteria = new CDbCriteria();
        $criteria->with = array('Ruolo');
        $criteria->compare('UtenteID', $this->UtenteID);
        $criteria->compare('Nome', $this->Nome, true);
        $criteria->compare('Cognome', $this->Cognome, true);
        $criteria->compare('Email', $this->Email, true);
        $criteria->compare('Abilitato', $this->Abilitato);
        return new CActiveDataProvider($this, array('criteria' => $criteria));
    }

}
