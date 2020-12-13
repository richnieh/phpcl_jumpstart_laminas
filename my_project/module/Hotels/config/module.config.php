<?php
declare(strict_types=1);
namespace Hotels;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
return [
    'router' => [
        'routes' => [
            'hotels' => [
                'type'    => Segment::class,
                'options' => [
                    // add additional params to "route" key if needed
                    'route'    => '/hotels[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\Adapter::class => Service\AdapterFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [__DIR__ . '/../view'],
    ],
];