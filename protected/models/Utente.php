<?php

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

    public function tableName() {
        return 'utenti';
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

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

}
