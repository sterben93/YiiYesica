<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'Branches' => [
            'class' => 'backend\modules\Branches\ModulesBranches',
        ],
        'gridview' =>  [
        'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
    ],
        'settings' => [
            'class' => 'backend\modules\settings\Settings',
        ],
        ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'authManager'=>[
            'class'=>'yii\rbac\DbManager',
            'defaultRoles'=>['guest'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        //www.google.com/settings/security/lesssecureapps
        'mailer'=>[
            'class'=>'yii\swiftmailer\Mailer',
            'useFileTransport'=>false,
            'transport'=>[
                   'class' => 'Swift_SmtpTransport',
                //host outlook: smpt-mail.outlook.com(587)
                //host hotmail: smpt-live.com(465) 
            'host'=>'smtp.gmail.com',
            'username' => 'rous.archer@gmail.com',
            'password' => 'newyork3041',
            'port' => '587', // El puerto 25 es un puerto común también
            'encryption' => 'tls',
            ]
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
