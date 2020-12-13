<?php
declare(strict_types=1);
namespace Hotels\Controller;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $country    = $this->params()->fromQuery('country');
        $container  = $this->getEvent()->getApplication()->getServiceManager();
        $adapter    = $container->get('Hotels\Service\Adapter');
        $sql        = 'SELECT * FROM hotels WHERE country LIKE ? ORDER BY country';
        $hotels     = $adapter->query($sql,[$country.'%']);
        return new ViewModel(['hotels'=>$hotels, 'country'=>$country]);
    }
}