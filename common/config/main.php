<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'modules' => [
            'banner' => [
                'class' => 'floor12\banner\Module',
            ],
            'files' => [
                'class' => 'floor12\files\Module',
            ],
        ],
    ]
];
