<?php
declare(strict_types=1);
namespace Application\Controller;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Application\Services\Calendar;

class CalendarController extends AbstractActionController
{
    protected $cal;
    public function __construct(Calendar $cal)
    {
        $this->cal = $cal;
    }

    public function indexAction()
    {
        $year = $this->params()->fromQuery('year', Date('Y'));
        $cal = $this->cal->getCalendar((int)$year);
        return new ViewModel(['cal'=>$cal], ['year'=>$year]);
    }
}