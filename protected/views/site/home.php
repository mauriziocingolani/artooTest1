<?php
/* @var $utenti Utente[] */
?>

<h1>Home page</h1>

<?php echo CHtml::link('Crea nuovo utente', array('/utente')); ?>

<table>
    <thead>
        <tr>
            <td><?php echo Utente::model()->getAttributeLabel('UtenteID'); ?></td>
            <td><?php echo Utente::model()->getAttributeLabel('Nome'); ?></td>
            <td><?php echo Utente::model()->getAttributeLabel('Cognome'); ?></td>
            <td><?php echo Utente::model()->getAttributeLabel('Email'); ?></td>
            <td><?php echo Utente::model()->getAttributeLabel('Abilitato'); ?></td>
            <td>Ruolo</td>
            <td />
        </tr>
    </thead>
    <?php foreach ($utenti as $u) : ?>
        <tr>
            <td><?php echo $u->UtenteID; ?></td>
            <td><?php echo $u->Nome; ?></td>
            <td><?php echo $u->Cognome; ?></td>
            <td><?php echo $u->Email; ?></td>
            <td><?php echo $u->Abilitato; ?></td>
            <td><?php echo $u->Ruolo->Descrizione . ' (' . $u->RuoloID . ')'; ?></td>
            <td><a href="/ArtooTest1/utente/<?php echo $u->UtenteID; ?>">Modifica</a></td>
        </tr>
    <?php endforeach; ?>
</table>