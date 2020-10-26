<?php
declare(strict_types=1);
namespace Hotels\Controller;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Hotels\Models\HotelsModel;

class IndexController extends AbstractActionController
{
    protected $model = NULL;
    public function __construct(HotelsModel $model)
    {
        $this->model = $model;
    }

    public function indexAction()
    {
        $hotelName  = $this->params()->fromQuery('hotelName', 'DEFAULT');
        $container  = $this->getEvent()->getApplication()->getServiceManager();
        $adapter    = $container->get('adapter');
        $sql        = 'SELECT * FROM hotels WHERE hotelName LIKE ? ORDER BY streetAddress';
        $hotels     = $adapter->query($sql, ['a%']);
        return new ViewModel(['hotels'=>$hotels],['hotelName' => $hotelName]);
    }
    public function countryAction()
    {
        $countryCode = $this->params()->fromQuery('country', 'AU');
        $hotels = $this->model->findByCountry($countryCode);
        $viewModel = new ViewModel(['hotels'=>$hotels],['country'=>$countryCode]);
        $viewModel->setTemplate('hotels/index/index');
        return $viewModel;
    }
}