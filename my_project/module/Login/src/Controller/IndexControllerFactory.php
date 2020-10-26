<?php
declare(strict_types=1);
namespace Login\Controller;

use Login\Forms\MyFormFromAnno;
use Login\Forms\FormFromClass;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory extends FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedNames, array $options = NULL)
    {
        return new IndexController(
            //$container->get(MyFormFromAnno::class),
            $container->get(FormFromClass::class),
            //$container->get('FormFromConfig')
        );
    }
}