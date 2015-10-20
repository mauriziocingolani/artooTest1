<?php
/* @var $utente Utente */
/* @var $this SiteController */
/* @var $form CActiveForm */
?>

<h1>Utente</h1>

<?php $form = $this->beginWidget('CActiveForm'); ?>

<p>* campi obbligatori</p>

<div>
    <?php echo $form->labelEx($utente, 'Nome'); ?><br />
    <?php echo $form->textField($utente, 'Nome'); ?><br />
    <?php echo $form->error($utente, 'Nome'); ?>
</div>
<div>
    <?php echo $form->labelEx($utente, 'Cognome'); ?><br />
    <?php echo $form->textField($utente, 'Cognome'); ?>
</div>
<div>
    <?php echo $form->labelEx($utente, 'Email'); ?><br />
    <?php echo $form->emailField($utente, 'Email'); ?>
</div>
<div>
    <?php echo $form->labelEx($utente, 'Abilitato'); ?><br />
    <?php echo $form->checkBox($utente, 'Abilitato'); ?>
</div>

<div>
    <?php echo CHtml::submitButton('Salva'); ?>
</div>

<?php $this->endWidget(); ?>
