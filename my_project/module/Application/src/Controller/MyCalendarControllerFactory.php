<?php
declare(strict_types=1);
namespace Application\Controller;

use Application\Service\MyCalendar;
//use Psr\Container\ContainerInterface;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
class MyCalendarControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return $requestedName instance
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new MyCalendarController($container->get(MyCalendar::class));
    }
}

