<?php
use app\engine\Request;
use app\models\repositories\BasketRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;
use app\models\repositories\FeedbackRepository;
use app\models\repositories\OrderRepository;
use app\engine\Db;
/*
define('DS', DIRECTORY_SEPARATOR); // Автозагрузчик композер
define('ROOT_DIR', dirname(__DIR__));
define("TEMPLATES_DIR", dirname(__DIR__) . "/views/");
define("CONTROLLER_NAMESPACE", "app\\controllers\\");
*/
return [
    'root_dir' => dirname(__DIR__),
    'template_dir' => dirname(__DIR__) . "/views/",
    'controllers_namespaces' => "app\\controllers\\",
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'shop3',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        //TODO По хорошему сделать для репозиториев отедьное простое хранилищебез reflection
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
        'feedbackRepository' => [
            'class' => FeedbackRepository::class
        ],
        'orderRepository' => [
            'class' => OrderRepository::class
        ]
    ]
];