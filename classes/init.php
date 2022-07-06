<?php
require_once 'Database.php';
require_once 'Config.php';
require_once 'Router.php';


$GLOBALS = [
    'paths' =>
        [
            '' => [
                'path' => 'news.php',
                'independent' => true,
            ],
            '/view' => [
                'path' => 'view.php',
                'independent' => false,
            ],
            '/view/edit' => [
                'path' => 'edit.php',
                'independent' => false,
            ]
        ],
];

