<?php
namespace Application\Factory;

use Application\Models\MyEventsModel;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class MyEventsModelFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return MyEventsModel
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new MyEventsModel($container->get('adapter'));
    }
}
