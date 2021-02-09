<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'rbac' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
	    'mainLayout' => '@app/views/layouts/main.php',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField' => 'id',
                    'usernameField' => 'username',
                ],
            ],
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            // 'baseUrl' => ''
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                   '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/translations',
                    'sourceLanguage' => 'en',
                ],
            ],
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ]
        
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'connectOptions' => [
                'bind' => [
                    'upload.pre mkdir.pre mkfile.pre rename.pre archive.pre ls.pre' => array(
                        'Plugin.Sanitizer.cmdPreprocess'
                    ),
                    'ls' => array(
                        'Plugin.Sanitizer.cmdPostprocess'
                    ),
                    'upload.presave' => array(
                        'Plugin.Sanitizer.onUpLoadPreSave'
                    )
                ],
                'plugin' => [
                    'Sanitizer' => array(
                        'enable' => true,
                        'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
                        'replace'  => '_'    // replace to this
                    )
                ],
            ],
            'roots' => [
                            [
                                'baseUrl'=>'@web',
                                'basePath'=>'@webroot',
                                'path' => 'files/global',
                                'name' => 'Global',
                                'plugin' => [
                                    'Sanitizer' => array(
                                                            'enable' => true,
                                                            'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
                                                            'replace'  => '_'    // replace to this
                                                        )
                                ]
                            ],
            ],
        ],
    ],
    'params' => $params,
];
