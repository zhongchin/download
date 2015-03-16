<?php

namespace Front\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DetailController extends AbstractActionController
{
     protected $sm;

    public function indexAction()
    {
        return new ViewModel();
    }
    public function getLangId($code)
    {
        $langTable=$this->sm->get('Common\Model\LangTable');
        return $langTable->getLangByCode($code)->current();
    }

    public function detailAction()
    {
        $id =$this->params('id',0);
        if(!$id){
            return  $this->redirect()->toRoute('home');
        }
        $langCode=$this->params("lang");
       $this->sm=$this->getServiceLocator();
       $productTable=$this->sm->get('Common\Model\ProductTable');
       $downloadTable=$this->sm->get('Common\Model\DownLoadTable');

       $langId=$this->getLangId($langCode);
       $docinfo=$downloadTable->getAllInfoById($id,$langId->lang_id);

        $detail=$docinfo->current();
        $category = $productTable->getCategoryByPid($detail->p_id,$langId->lang_id)->current();

        return new ViewModel(array(
             "detail"=>$detail,
              'category'=>$category,
               'cid'=>$category->c_id,
            ));
    }

    public function downAction()
    {
          $viewModel=new ViewModel();
          $viewModel->setTerminal(true);
          $d_id=$this->params('id',0);
         $this->sm=$this->getServiceLocator();
         $productTable=$this->sm->get('Common\Model\ProductTable');
          $downloadTable=$this->sm->get('Common\Model\DownLoadTable');
           $doc=$downloadTable->getDocUrlById($d_id)->current();


        $filePath=$_SERVER['DOCUMENT_ROOT'].'/documents/'.$doc['c_folder'].'/'.$doc['sku'].'/'.$doc['d_url'];
          if(!file_exists($filePath)){

              echo "<script type='text/javascript'>alert("."'document not file'".");
              history.back();
                </script>";
              exit;
          }else{
                $fileInfo=getimagesize($filePath);
              header("content-type:".$fileInfo['mime']);
              header("content-disposition:attachment;filename=".$doc['d_url']);
              readfile($filePath);
          }

          exit;
    }


}

