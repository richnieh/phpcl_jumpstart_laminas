<?php
declare(strict_types=1);
namespace Login\Controller;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Laminas\Form\Form;

class IndexController extends AbstractActionController
{
    protected $formFromConfig;
    protected $formFromAnno;
    protected $formFromClass;

    public function __construct(
        Form $formFromConfig,
        Form $formFromAnno,
        Form $formFromClass
    )
    {
        $this->formFromConfig = $formFromConfig;
        $this->formFromAnno   = $formFromAnno;
        $this->formFromClass  = $formFromClass;
    }
    public function indexAction()
    {
        return new ViewModel([
            'formFromConfig'=>$this->formFromConfig,
            'formFromAnno'  =>$this->formFromAnno,
            'formFromClass' =>$this->formFromClass,
        ]);
    }
}