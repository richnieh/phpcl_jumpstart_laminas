<?php
declare(strict_types=1);
namespace Application\Controller;
use Application\Service\MyCalendar;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class MyCalendarController extends AbstractActionController
{
    protected $cal;
    public function __construct(MyCalendar $cal)
    {
        $this->cal = $cal;
    }

    public function indexAction()
    {
        $year = $this->params()->fromQuery('year', date('Y'));
        $cal = $this->cal->getCalendar((int)$year);
        return new ViewModel(['cal'=>$cal]);
    }
}