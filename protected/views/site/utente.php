<?php
/* @var $utente Utente */
/* @var $this SiteController */
/* @var $form CActiveForm */
?>

<h1>Utente</h1>

<div class="form>">

    <?php $form = $this->beginWidget('CActiveForm'); ?>

    <?php if ($message = Yii::app()->user->getFlash('success')) : ?>
        <div class="flash-success"><?php echo $message; ?></div>
    <?php elseif ($message = Yii::app()->user->getFlash('error')) : ?>
        <div class="flash-error"><?php echo $message; ?></div>
    <?php endif; ?>

    <p>* campi obbligatori</p>

    <div class="row">
        <?php echo $form->labelEx($utente, 'Nome'); ?><br />
        <?php echo $form->textField($utente, 'Nome'); ?><br />
        <?php echo $form->error($utente, 'Nome'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($utente, 'Cognome'); ?><br />
        <?php echo $form->textField($utente, 'Cognome'); ?>
        <?php echo $form->error($utente, 'Cognome'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($utente, 'Email'); ?><br />
        <?php echo $form->emailField($utente, 'Email'); ?>
        <?php echo $form->error($utente, 'Email'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($utente, 'Abilitato'); ?><br />
        <?php echo $form->checkBox($utente, 'Abilitato'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($utente, 'RuoloID'); ?><br />
        <?php echo $form->dropDownList($utente, 'RuoloID', CHtml::listData(Ruolo::GetTutti(), 'RuoloID', 'Descrizione')); ?><br />
    </div>

    <div class="buttons">
        <?php echo CHtml::submitButton('Salva'); ?>
    </div>

</div>

<?php $this->endWidget(); ?>
