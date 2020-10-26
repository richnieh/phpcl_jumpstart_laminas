<?php
namespace Login\Forms;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Form\Annotation\AnnotationBuilder;

class MyFormFromAnnoFactory extends FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $builder = new AnnotationBuilder();
        return $builder->createForm(MyFormFromAnno::class);
    }

}