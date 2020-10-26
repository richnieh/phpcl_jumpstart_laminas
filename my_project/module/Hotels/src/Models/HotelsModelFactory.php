<?php
namespace Hotels\Models;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class HotelsModelFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return HotelsModel
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new HotelsModel($container->get('adapter'));
    }
}
