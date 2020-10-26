<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use PhpParser\Node\Stmt\Return_;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $name = $this->params()->fromRoute('name','DEFAULT');
        return new ViewModel(['name'=>$name]);
    }

    public function listAction()
    {
        $name = $this->params()->fromQuery('name','DEFAULT');
        return new ViewModel(['name'=>$name]);
    }
}
