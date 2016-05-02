<?php
return array(
    'modules' => array(
        'Application',
        'Core',
    	'DoctrineModule',
    	'DoctrineORMModule'
        //'Skel'
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
