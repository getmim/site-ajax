<?php

return [
    '__name' => 'site-ajax',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/site-ajax.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/site-ajax' => ['install','update','remove'],
        'theme/site/static/js/site-ajax.js' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'site' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'SiteAjax\\Controller' => [
                'type' => 'file',
                'base' => 'modules/site-ajax/controller'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'site' => [
            'siteAjaxSingle' => [
                'path' => [
                    'value' => '/-/site-ajax/(:name)'
                ],
                'handler' => 'SiteAjax\\Controller\\Ajax::single'
            ]
        ]
    ]
];