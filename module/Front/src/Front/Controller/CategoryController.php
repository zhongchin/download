<?php

namespace Front\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CategoryController extends AbstractActionController
{

    protected $sm = null;

    public function indexAction()
    {
        $this->sm = $this->getServiceLocator();
                $cid = $this->params('id');
               if(!$cid){
                    $this->redirect()->toRoute('home');
               }
                $lang = $this->params('lang');
                $page = $this->params('page', 1);
                $curPage = $this->params('page', 1);

                $categoryTable = $this->sm->get('Front\Model\CategoryTable');
                $category = $categoryTable->getCategory($cid, $lang)->current();

                $productTable = $this->sm->get('Common\Model\ProductTable');
                $CategoryPaginator = $categoryTable->getCatProductPaginator($cid);
                $CategoryPaginator->setCurrentPageNumber($page);
                $products = $CategoryPaginator->setItemCountPerPage(10);

                  return new ViewModel(array(
                    'products' => $products,
                    'category' => $category,
                    'curPage' => $curPage,
                    'paginator'=>$CategoryPaginator,

                    'lang'=>$lang
                ));
    }

    public function getCategory()
    {
        /*   $categoryTable=$sm->get('Front\Model\CategoryTable');
                             $category=$categoryTable->getAllCategoryByLang('sc');
                            var_dump($category->toArray());
                             return new ViewModel();*/
    }

    public function getLangId($code)
    {
        $langTable=$this->sm->get('Common\Model\LangTable');
                return $langTable->getLangByCode($code)->current();
    }

    public function productAction()
    {

                $pid = $this->params('id', 0);
                if(!$pid){
                    $this->redirect()->toRoute('home');
                }
                $this->sm = $this->getServiceLocator();
                $lang=$this->params('lang');
                $langId=$this->getLangId($lang);
                $page = $this->params('page', 1);
                $productTable = $this->sm->get('Common\Model\ProductTable');
                $product=$productTable->getProductById($pid)->current();
                $category = $productTable->getCategoryByPid($pid,$langId->lang_id)->current();
                $pdocPaginator=$productTable->getProductDocPaginator($pid,$langId->lang_id);
                $pdocPaginator->setCurrentPageNumber($page);
                $pdocPaginator->setItemCountPerPage(10);
                return new ViewModel(array(
                    'category'=>$category,
                    'lang'=>$lang,
                    'paginator'=>$pdocPaginator,
                    'product'=>$product
                ));
    }


}

