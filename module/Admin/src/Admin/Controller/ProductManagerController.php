<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15-3-7
 * Time: 下午9:54
 */

namespace Admin\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductManagerController extends AbstractActionController
{
    public function indexAction()
    {
        $productTable = $this->getProductTable();
        $lang = $this->params('lang');
        $langId = $this->getLangId($lang);
        $page = $this->params('page');
        $products = $productTable->fetchAllByLangId($langId->lang_id);
        $products->setCurrentPageNumber($page);
     //   $products->setItemCountPerPage(10);
        var_dump($products);exit;
        return new ViewModel(array(
            'products' => $products
        ));

    }

    public function  getProductTable()
    {
        return $this->getServiceLocator()->get('Common\Model\ProductTable');
    }

    public function getLangId($code)
    {
        $langTable = $this->getServiceLocator()->get('Common\Model\LangTable');
        return $langTable->getLangByCode($code)->current();
    }

    public function productAction()
    {
    }

    public function addAction()
    {
    }

    public function deleteAction()
    {

    }
}