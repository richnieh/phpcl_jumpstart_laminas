<?php
namespace Login\Forms;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class MyFormFromClassFactory extends FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL)
    {
        return new $requestedName('login-my-form-from-class');
    }

}