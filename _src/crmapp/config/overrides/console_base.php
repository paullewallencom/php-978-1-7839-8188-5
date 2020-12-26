<?php
return [
    'id' => 'crmapp-console',
    'controllerNamespace' => 'app\commands',
    'components' => [
        'authManager' => [
            'class' => '\yii\rbac\DbManager'
        ]
    ],
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'templateFile' => '@app/views/layouts/migration.php'
        ]
    ]
];
