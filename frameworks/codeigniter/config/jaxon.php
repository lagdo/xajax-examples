<?php

$config['app'] = array(
    'classes' => array(
        array(
            'directory' => rtrim(APPPATH, '/') . '/jaxon/classes',
            'namespace' => '\\Jaxon\\App',
            // 'separator' => '', // '.' or '_'
            // 'protected.' => array(),
        ),
    ),
);
$config['lib'] = array(
    'core' => array(
        'language' => 'en',
        'encoding' => 'UTF-8',
        'request' => array(
            'uri' => 'jaxon/process',
        ),
        'prefix' => array(
            'class' => '',
        ),
        'debug' => array(
            'on' => false,
            'verbose' => false,
        ),
        'error' => array(
            'handle' => false,
        ),
    ),
    'js' => array(
        'lib' => array(
            // 'uri' => '',
        ),
        'app' => array(
            // 'uri' => '',
            // 'dir' => '',
            'extern' => false,
            'minify' => false,
            'options' => '',
        ),
    ),
    'dialogs' => array(
        'libraries' => array('pgwjs'),
        'default' => array(
            'modal' => 'bootstrap',
            'alert' => 'toastr',
        ),
        'toastr' => array(
            'options' => array(
                'closeButton' => true,
                'positionClass' => 'toast-top-center'
            ),
        ),
        'assets' => array(
            'include' => array(
                'all' => true,
            ),
        ),
    ),
);
