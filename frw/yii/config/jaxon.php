<?php

$directory = rtrim(\Yii::getAlias('@app'), '/') . '/jaxon/classes';

return [
    'app' => [
        'directories' => [
            $directory => [
                'namespace' => '\\Jaxon\\App',
                // 'separator' => '', // '.' or '_'
                // 'protected' => [],
            ],
        ],
    ],
    'lib' => [
        'core' => [
            'language' => 'en',
            'encoding' => 'UTF-8',
            'request' => [
                'uri' => 'jaxon',
            ],
            'prefix' => [
                'class' => '',
            ],
            'debug' => [
                'on' => false,
                'verbose' => false,
            ],
            'error' => [
                'handle' => false,
            ],
        ],
        'js' => [
            'lib' => [
                // 'uri' => '/jaxon/lib',
            ],
            'app' => [
                // 'uri' => '',
                // 'dir' => '',
                'export' => false,
                'minify' => false,
            ],
        ],
        'dialogs' => [
            'libraries' => ['pgwjs'],
            'default' => [
                'modal' => 'bootstrap',
                'alert' => 'toastr',
            ],
            'toastr' => [
                'options' => [
                    'closeButton' => true,
                    'positionClass' => 'toast-top-center'
                ],
            ],
            'assets' => [
                'include' => [
                    'all' => true,
                ],
            ],
        ],
    ],
];
