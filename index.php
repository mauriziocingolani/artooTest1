<?php

$yii = dirname(__FILE__) . '/../yii-framework/yii.php';
$config = array(
    'timeZone' => 'europe/rome',
    'import' => array(
        'application.models.*',
    ),
    'preload' => array('log'),
    'components' => array(
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'utenti' => 'site/index',
                'utente' => 'site/utente',
                'utente/<utenteid:[0-9]+>' => 'site/utente',
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=utenti',
            'username' => 'maurizio',
            'password' => 'maurizio',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CProfileLogRoute',
                    'levels' => '',
                    'enabled' => true,
                ),
                array(
                    'class' => 'CWebLogRoute',
                    'enabled' => true,
                ),
            ),
        ),
    ),
);

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

include_once($yii);
Yii::createWebApplication($config)->run();
