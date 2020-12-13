<?php

namespace Application\Controller;

use Application\Services\Calendar;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class CalendarControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return CalendarController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CalendarController($container->get(Calendar::class));
    }
}

