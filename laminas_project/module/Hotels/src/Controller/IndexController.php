<?php
declare(strict_types=1);
namespace Hotels\Controller;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $hotelName = $this->params()->fromQuery('hotelName');
        $container = $this->getEvent()->getApplication()->getServiceManager();
        $adapter   = $container->get('adapter');
        $sql       = "SELECT * FROM hotels WHERE hotelName LIKE ? ORDER BY streetAddress";
        $hotels    = $adapter->query($sql, [$hotelName]);
        return new ViewModel(['hotels'=>$hotels,'hotelName'=>$hotelName]);
    }
}