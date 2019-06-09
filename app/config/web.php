<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'template' => ['class' => 'app\components\Template'],
        'permission' => ['class' => 'app\components\Permission'],

        'request' => [
// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1234567890qwertytvgvsdfwadfdf',
            'enableCsrfValidation' => false,

        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'egift2goapp.com',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => 'egiftrewards@egift2goapp.com',
                'password' => 'egiftrewards',
                'port' => '587', // Port 25 is a very common port too
                'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                'login' => 'site/login',
                'signup' => 'site/signup',
                'credential' => 'user/credential',
                'profile' => 'user/profile',
                'authorization/<auth_key>' => 'site/authorization',
                'merchants' => 'site/merchant-list',
                'merchant/<id:\d+>' => 'site/merchant',
                'merchant-egifts/<id:\d+>' => 'site/merchant-egifts',


                // for testing only in email
                'send-email/<auth_key>' => 'site/send-email',

                '<controller>/update-stock/<egift_id:\d+>/<quantity:\d+>' => '<controller>/update-stock',

                '<controller>/egift-user/<from:\d+>' => '<controller>/egift-user',
                '<controller>/egift-user/<from:\d+>/<to:\d+>' => '<controller>/egift-user',
                '<controller>/add-to-blocklist/<user_id:\d+>' => '<controller>/add-to-blocklist',
                '<controller>/set-to-authorized/<user_id:\d+>' => '<controller>/set-to-authorized',
                '<controller>/set-to-unauthorized/<user_id:\d+>' => '<controller>/set-to-unauthorized',

                
                '<controller>' => '<controller>/index',
                '<controller>/<action>/<name: \w+>' => '<controller>/<action>',
                '<controller>/<action>/<id:\d+>' => '<controller>/<action>',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
// configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
// uncomment the following to add your IP if you are not connecting from localhost.
//'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
// uncomment the following to add your IP if you are not connecting from localhost.
//'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
