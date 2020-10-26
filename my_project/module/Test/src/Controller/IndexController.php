<?php
declare(strict_types=1);
namespace Test\Controller;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
class IndexController extends AbstractActionController
{
    protected $test1;
    protected $test2;

    public function __construct($test1, $test2)
    {
        $this->test1 = $test1;
        $this->test2 = $test2;
    }

    public function indexAction()
    {
        $test1 = $this->test1;
        $test2 = $this->test2;
        return new ViewModel(['test1'=>$test1,'test2'=>$test2]);
    }
}