<?php

$yii = dirname(__FILE__) . '/../yii-framework/yii.php';
$config = array(
    'timeZone' => 'europe/rome',
    'components' => array(
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
    ),
);

include_once($yii);
Yii::createWebApplication($config)->run();
