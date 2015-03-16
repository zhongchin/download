<?php

namespace User\Controller;

use User\Form\SignInForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function loginAction()
    {
        $viewModel = new ViewModel();
        $loginform = new SignInForm();
        $request = $this->getRequest();
//        $this->layout('admin/layout');
        $viewModel->setTerminal(true);
        if ($request->isPost()) {
            $data = $request->getPost();
            $loginform->setInputFilter($loginform->getInputFilter());
            $loginform->setData($data);
            if ($loginform->isValid()) {

            }
        }
        $viewModel->setVariables(array(
            'form' => $loginform
        ));
        return $viewModel;
    }

    public function logoutAction()
    {
       // $url=$this->url()->fromRoute("user-login",array("lang"=>$this->params("lang")));

      return   $this->redirect()->toRoute("user-login",array("lang"=>$this->params("lang")));
      //  return new ViewModel();
    }


}

