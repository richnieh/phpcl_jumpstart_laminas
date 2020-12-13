<?php
namespace Login\Forms;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
class FormFromClassFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return $requestedName instance
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $loginForm = new $requestedName('login-form-from-class');
        $loginForm->setInputFilter($container->get(FormClassFilter::class));
        return $loginForm;
    }
}
