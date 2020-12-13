<?php
declare(strict_types=1);
namespace Signups\Controller;
use Application\Models\EventsModel;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $eventsModel;
    public function __construct(EventsModel $eventsModel)
    {
        $this->eventsModel = $eventsModel;
    }

    public function indexAction()
    {
        return new ViewModel();
    }
    public function eventsAction(){
        $year       = $this->params()->fromQuery('year',date("Y"));
        $container  = $this->getEvent()->getApplication()->getServiceManager();
        $adapter    = $container->get('Application\Services\Adapter');
        $sql        = "SELECT * FROM events WHERE event_date LIKE ? ORDER BY event_date";
        $events     = $adapter->query($sql, [$year.'%']);
        return new ViewModel(['events'=>$events],['year'=>$year]);
    }
    public function eventsUsingTableAction()
    {
        $year       = $this->params()->fromQuery('year',date('Y'));
        $events     = $this->eventsModel->findEventsByYear((int)$year);
        $viewModel  = new ViewModel(['events'=>$events, 'year'=>$year]);
        $viewModel->setTemplate('signups/index/events');
        return $viewModel;
    }
}