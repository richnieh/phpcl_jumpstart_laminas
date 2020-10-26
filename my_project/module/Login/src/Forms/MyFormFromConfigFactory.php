<?php
namespace Login\Forms;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Form\Factory;

class MyFormFromConfigFactory extends FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $factory = new Factory();
        return $factory->createForm($container->get('login-form-config'));
    }

}