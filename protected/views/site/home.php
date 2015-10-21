<?php
/* @var $model Utente */
?>

<h1>Home page</h1>

<?php echo CHtml::link('Crea nuovo utente', array('/utente')); ?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'UtenteID',
        'Nome',
        'Cognome',
        array(
            'header' => 'Indirizzo email',
            'name' => 'Email',
            'value' => 'CHtml::link($data->Email,array("/utente/$data->UtenteID"))',
            'type' => 'raw',
        ),
        'Abilitato',
        array(
            'name' => 'RuoloSearch',
            'header' => 'Ruolo',
            'value' => 'strtoupper($data->Ruolo->Descrizione)',
        ),
    ),
));
?>