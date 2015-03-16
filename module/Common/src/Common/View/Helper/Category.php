<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 15-1-15
 * Time: 下午5:35
 */

namespace Common\View\Helper;


use Zend\View\Helper\AbstractHelper;

class Category extends AbstractHelper
{
    public $categoryTable;
    public $sm;
    public $e;

    public function __construct($pluginManager, $e)
    {
        $this->sm = $pluginManager->getServiceLocator();
        $this->e = $e;
        $this->categoryTable = $this->sm->get('Front\Model\CategoryTable');
    }

    public function getCurLang()
    {
        $routeMatch = $this->e->getRouteMatch();
        $curLang = $routeMatch->getParam('lang');
        if (!$curLang) {
            $curLang = 'en';
        }
        return $curLang;
    }

    public function getCurCategory()
    {
        $routeMatch = $this->e->getRouteMatch();
        $routeName = $routeMatch->getMatchedRouteName();
        if (strtolower($routeName) == 'category') {
            $cid = $routeMatch->getParam('id');
            $this->categoryTable->getCategory($cid);


        }
    }

    public function getCurCategoryId()
    {
        $routeMatch = $this->e->getRouteMatch();
        $cid = $routeMatch->getParam('id');
        return $cid;
    }

    public function getAllCategory()
    {
        $curLang = $this->getCurLang();
        $categoryObj = $this->categoryTable->getAllCategoryByLang($curLang);
        return $categoryObj->toArray();

    }

} 