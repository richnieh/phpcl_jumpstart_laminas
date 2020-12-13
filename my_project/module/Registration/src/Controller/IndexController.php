<?php
declare(strict_types=1);
namespace Registration\Controller;
use Laminas\Form\Form;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
class IndexController extends AbstractActionController
{
    protected $regFormFromConfig;
    public function __construct(
        Form $regFormFromConfig
    )
    {
        $this->regFormFromConfig = $regFormFromConfig;
    }

    public function indexAction()
    {
        return new ViewModel([
            'regFormFromConfig'=>$this->regFormFromConfig,
        ]);
    }
}