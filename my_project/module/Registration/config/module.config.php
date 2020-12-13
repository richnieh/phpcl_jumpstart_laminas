<?php
declare(strict_types=1);
namespace Registration;
use Laminas\Filter\StringToLower;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\I18n\Validator\Alnum;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Laminas\Form\Element;
use Laminas\Validator\EmailAddress;
use Laminas\Validator\Regex;
use Laminas\Validator\StringLength;

return [
    'router' => [
        'routes' => [
            'registration' => [
                'type'    => Segment::class,
                'options' => [
                    // add additional params to "route" key if needed
                    'route'    => '/registration[/:action]',
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
            Form\RegFormFromConfig::class => Form\RegFormFromConfigFactory::class,
        ],
        'services'  => [
            'reg-form-config' => [
                'elements' => [
                    ['spec'=> [
                        'type'       => Element\Text::class,
                        'name'       => 'username',
                        'options'    => ['label'=> 'Username'],
                        'attributes' => [
                            'size'=>20,
                            'placeholder'=>'Please insert your username',
                        ],
                    ],
                    ],
                    ['spec'=> [
                        'type'       => Element\Email::class,
                        'name'       => 'email',
                        'options'    => ['label'=> 'Email'],
                        'attributes' => [
                            'size'=>40,
                            'placeholder'=>'Please insert your contact email address',
                        ],
                    ],
                    ],
                    ['spec'=> [
                        'type'       => Element\Text::class,
                        'name'       => 'phone_number',
                        'options'    => ['label'=> 'Contact phone number'],
                        'attributes' => [
                            'title'=> 'Enter contact phone number',
                            'size'=>20,
                            'placeholder'=>'Please insert your contact phone number in +nn-nnn-nnn-nnnn format',
                        ],
                        'label_attributes' => ['style'=>'display:block'],
                    ],
                    ],
                    ['spec'=> [
                        'type'       => Element\Password::class,
                        'name'       => 'password',
                        'options'    => ['label'=> 'Password'],
                        'attributes' => [
                            'title'=> 'Password',
                            'size'=>20,
                            'placeholder'=>'Insert password here',
                        ],
                    ],
                    ],
                    ['spec'=> [
                        'type'       => Element\Submit::class,
                        'name'       => 'Submit',
                        'attributes' => [
                            'value'=> 'Register',
                        ],
                    ],
                    ],
                ],
                'input_filter' => [
                    'username' => [
                        'name'      => 'username',
                        'required'  => true,
                        'validators'=> [
                            [
                                'name' => Alnum::class,
                                'options' => [
                                    'allowWhiteSpace' => true,
                                ],
                            ],
                            [
                                'name' => StringLength::class,
                                'options' => 8,
                            ],
                        ],
                        'filters'   => [
                            ['name' => StripTags::class],
                            ['name' => StringTrim::class],
                            ['name' => StringToLower::class],
                        ],
                    ],
                    'email' => [
                        'name'      => 'email',
                        'required'  => true,
                        'validators'=> [
                            ['name' => EmailAddress::class],
                        ],
                        'filters'   => [
                            ['name' => StripTags::class],
                            ['name' => StringTrim::class],
                        ],
                        'error_message' => 'Please input valid email address'
                    ],
                    'phone_number' => [
                        'name'      => 'phone_number',
                        'validator' => [
                            [
                                'name'    => Regex::class,
                                'options' => [
                                    ['/^\+d{2}(-\d{3,4})+$/'],
                                ],
                            ],
                        ],
                        'error_message' => 'Please input it in a valid format',
                    ],
                    'Password' => [
                        'name'       => 'password',
                        'required'   => true,
                        'validators' => [
                            [
                                'name' => StringLength::class,
                                'options' => ['min'=>8],
                            ],
                            [
                                'name' => Regex::class,
                                'options' => [
                                    ['/^(?=.*\d)(?=.*\W)(?=.*[a-z])(?=.*[A-Z]).{8,})$/'],
                                ],
                            ],
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