<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PagesController extends AbstractActionController
{

    public function homeAction()
    {
        echo "hoe fadsfadf";
    }

    public function categoryAction()
    {
        $lang = $this->params('lang');
        $categoryTable = $this->getCategoryTable();
        $categories = $categoryTable->getAllCategoryByLang($lang);

        return array(
            'categories' => $categories->toArray(),
            'lang' => $lang,
        );
    }

    public function getCategoryTable()
    {
        return $this->getServiceLocator()->get('Front\Model\CategoryTable');
    }

    public function productAction()
    {
        return new ViewModel();
    }


}

