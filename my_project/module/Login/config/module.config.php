<?php
declare(strict_types=1);
namespace Login;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\I18n\Validator\Alnum;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Laminas\Form\Element;
use Laminas\Validator\EmailAddress;
use Laminas\Validator\StringLength;

return [
    'router' => [
        'routes' => [
            'login' => [
                'type'    => Segment::class,
                'options' => [
                    // add additional params to "route" key if needed
                    'route'    => '/login[/:action]',
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
            Controller\IndexController::class => Controller\IndexControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Forms\FormFromConfig::class => Forms\FormFromConfigFactory::class,
            Forms\FormFromAnno::class   => Forms\FormFromAnnoFactory::class,
            Forms\FormFromClass::class  => Forms\FormFromClassFactory::class,
            Forms\FormClassFilter::class => InvokableFactory::class,
        ],
        'services' => [
            'login-form-config' => [
                'elements' => [
                    [
                        'spec' => [
                            'type'       => Element\Email::class,
                            'name'       => 'email',
                            'options'    => ['label'=>'Email'],
                            'attributes' => [
                                'size' => 40,
                                'placeholder' => 'Please insert your email as username',
                            ],
                        ],
                    ],
                    [
                        'spec' => [
                            'type'       => Element\Password::class,
                            'name'       => 'password',
                            'options'    => ['label'=>'Password'],
                            'attributes' => ['size' => 20,],
                        ],
                    ],
                    [
                        'spec' => [
                            'type'       => Element\Submit::class,
                            'name'       => 'login',
                            'attributes' => ['value' => 'Login',],
                        ],
                    ],
                ],
                'input_filter' => [
                    'email' => [
                        'name'       => 'email',
                        'required'   => true,
                        'validators' => [
                            ['name'=>EmailAddress::class],
                        ],
                        'error_message' => 'Email address is required as the user name',
                        'filters'    => [
                            ['name' => StripTags::class],
                            ['name' => StringTrim::class],
                        ],
                    ],
                    'password' => [
                        'name'       => 'password',
                        'required'   => true,
                        'validators' => [
                            ['name'=>StringLength::class],
                            ['name'=>Alnum::class],
                        ],
                        'error_message' => 'Password needs to be in alphabet or numbers',
                        'filters'    => [
                            ['name' => StripTags::class],
                            ['name' => StringTrim::class],
                        ],
                    ],
                ],
            ],
        ],

    ],
    'view_manager' => [
        'template_path_stack' => [__DIR__ . '/../view'],
    ],
];