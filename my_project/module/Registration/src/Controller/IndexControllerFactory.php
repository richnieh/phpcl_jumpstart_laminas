<?php
namespace Registration\Controller;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return IndexController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IndexController(
            $container->get(\Registration\Form\RegFormFromConfig::class),
            //$container->get(\Registration\Form\FormFromAnno::class),
            //$container->get(\Registration\Form\FormFromClass::class)
        );
    }
}
