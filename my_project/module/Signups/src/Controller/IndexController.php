<?php
declare(strict_types=1);
namespace Signups\Controller;
use Application\Models\MyEventsModel;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;


class IndexController extends AbstractActionController
{
    protected $model = NULL;
    public function __construct(MyEventsModel $model)
    {
        $this->model = $model;
    }
    public function indexAction()
    {
        return new ViewModel();
    }
    public function eventsAction()
    {
        $year = $this->params()->fromQuery('year', date('Y'));
        $container = $this->getEvent()->getApplication()->getServiceManager();
        $adapter = $container->get('adapter');
        $sql = "SELECT * FROM events WHERE event_date LIKE ? ORDER BY event_date";
        $events = $adapter->query($sql, [$year.'%']);
        return new ViewModel(['events'=>$events],['year'=>$year]);
    }
    public function eventsUsingTableAction()
    {
        $year = $this->params()->fromQuery('year', date('Y'));
        $events = $this->model->findEventsByYear((int)$year);
        $viewModel = new ViewModel(['events'=>$events],['year'=>$year]);
        $viewModel->setTemplate('signups/index/events');
        return $viewModel;
    }
}