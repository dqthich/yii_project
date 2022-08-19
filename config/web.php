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
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3P1FCLkz7a20gMslCjF-mNr1fRSvCQXG',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'timeZone' => 'America/Los_Angeles',
        'log' => [
            'targets'=>[
                [
                'class' => 'yii\log\DbTarget',
                'levels' => ['error', 'warning', 'trace', 'info'],
                'categories' => ['yii\db\*'],
                ],
            ],
        ],
        'user' => [
            
            'identityClass' => 'app\models\Account',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            //'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure transport
            // for the mailer to send real emails.
            //'useFileTransport' => true,
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'your-host-domain e.g. smtp.gmail.com',
                'username' => 'your-email-or-username',
                'password' => 'your-password',
                'port' => '587',
                'encryption' => 'tls',
                        ],
        ],
        'avatar' => [
            'class' => \zertex\avatar_generator\AvatarGenerator::class,
            'images_folder' => 'path_to_image_files',
            'images_url' => 'url_to_image_files',
            'size_width' => 300,            // default: 300
            'font' => 'path_to_ttf_font',   // default: Play-Bold // may use aliases
            'font_size' => 200,             // default: 200
            'salt' => 'random_salt',        // salt for image file names
            'texture' => ['sun', 'rain'],   // texture name
            'text_over_image' => true,      // draw text over image (for avatar from file)
            'texture_over_image' => true,   // draw texture over image (for avatar from file)
        ],
       
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
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
