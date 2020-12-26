<?php
return [
    'id' => 'crmapp',
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['*']
        ],
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['*']
        ],
        'api' => [
            'class' => 'app\api\ApiModule'
        ]
    ],
    'bootstrap' => ['debug'],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'customer/<id:\d+>' => 'customer-records/view',
                [
                    'class' => 'app\utilities\UsernameUrlRule'
                ]
            ]
        ],
        'view' => [
            'theme' => [
                'class' => yii\base\Theme::className(),
                'basePath' => '@app/themes/snowy',
            ],
            'renderers' => [
                'md' => [
                    'class' => 'app\utilities\MarkdownRenderer'
                ]
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'your secret key here',
        ],
        'response' => [
            'formatters' => [
                'yaml' => [
                    'class' => 'app\utilities\YamlResponseFormatter'
                ]
            ]
        ],
        'user' => [
            'identityClass' => 'app\models\user\UserRecord'
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'mail' => [
            'class' => yii\swiftmailer\Mailer::className(),
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => 'noreply@crmapp.me'
            ],
            'transport' => [
                'class' => 'Swift_MailTransport',
            ],
        ],
        'log' => [
            'traceLevel' => 3,
            'targets' => [
                'all_messages' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info', 'trace', 'warning', 'error']
                ],
                'problems' => [
                    'class' => \yii\log\EmailTarget::className(),
                    'levels' => \yii\log\Logger::LEVEL_ERROR,
                    'message' => [
                        'to' => 'pm@crmapp.us'
                    ]
                ]
            ],
        ],
        'assetManager' => [
            'bundles' => (require __DIR__ . '/../assets_compressed.php')
        ],
    ],
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php')
];
