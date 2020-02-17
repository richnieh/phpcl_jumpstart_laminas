<?php
declare(strict_types=1);
namespace Signups;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
return [
    'router' => [
        'routes' => [
            'signups' => [
                'type'    => Segment::class,
                'options' => [
                    // add additional params to "route" key if needed
                    'route'    => '/signups[/:action]',
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
    'view_manager' => [
        'template_path_stack' => [__DIR__ . '/../view'],
    ],
    'service_manager' => [
        'factories' => [
            'Signups\Service\Adapter' => Factory\AdapterFactory::class,
        ],
    ],
];