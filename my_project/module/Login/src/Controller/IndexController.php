<?php
declare(strict_types=1);
namespace Login\Controller;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Laminas\Form\Form;
class IndexController extends AbstractActionController
{
    protected $formAnno;
    public function __construct(Form $formAnno)
    {
        $this->fromAnno = $formAnno;
    }

    public function indexAction()
    {
        return new ViewModel(
            [
                'formAnno' => $this->formAnno,
            ]
        );
    }
}