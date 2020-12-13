<?php
declare(strict_types=1);
namespace Application\Controller;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
class ListController extends AbstractActionController
{
    protected $list;
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public function indexAction()
    {
        return new ViewModel(['list'=>$this->list]);
    }
}