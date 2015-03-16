<?php

namespace Front\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $sm = null;

    public function indexAction()
    {

        $this->sm = $this->getServiceLocator();
        $categoryTable = $this->sm->get('Front\Model\CategoryTable');
        $routeMatch = $this->getEvent()->getRouteMatch();
        $lang = $routeMatch->getParam('lang');
        $category = $categoryTable->getAllCategoryByLang($lang)->toArray();
        $hotKeys = $this->getHotKey();
        return new ViewModel(array(
            'category' => $category,
            'hotKeys' => $hotKeys,
            'hh' => 'helloworld'
        ));
    }



    public function getHotKey()
    {
        $searchKeyTable = $this->sm->get('Common\Model\SearchKeyTable');
        $hotKey = $searchKeyTable->getHotKey(10, 0)->toArray();
        return $hotKey;
    }

    public function searchAction()
    {
        return new ViewModel();
    }


}

