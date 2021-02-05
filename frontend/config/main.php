<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => ''
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            
            'showScriptName' => false,
            'enableLanguageDetection' => true,
            'enablePrettyUrl' => true,
            'enableDefaultLanguageUrlCode' => true,
            'languages' => ['uz', 'ru', 'en'],
            // 'enableDefaultLanguageUrlCode' => true,
            'enableLanguagePersistence' => false,
            'rules' => [
            ],
        ],
        
    ],
    'on beforeAction' => function(){
        if(Yii::$app->session->has("lang"))
        \Yii::$app->language = \Yii::$app->session->get("lang");
    },
    'params' => $params,
];
