<?php
namespace Registration\Forms;

use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Form\Factory;

class FormFromConfigFactory extends FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $factory = new Factory();
        return $factory->createForm($container->get('registration-form-config'));
    }

}