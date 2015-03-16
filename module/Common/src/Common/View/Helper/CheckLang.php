<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 15-1-15
 * Time: 下午2:27
 */
namespace Common\View\Helper;

class CheckLang extends \Zend\View\Helper\AbstractHelper
{
    public $langs = array();
    public $template;

    public function __construct($pluginManager)
    {
        $sm= $pluginManager->getServiceLocator();
        $adapter=$sm->get('Zend\Db\Adapter\Adapter');
        $result = $adapter->query('SELECT * from langs where is_enable=1');

        foreach ($result->execute() as $key => $value) {
            $this->langs[] = $value;
        }
        $config=$sm->get('config');
        $langTemplate=$config['view_manager']['template_map'];
        $this->template=$langTemplate['common\lang'];


    }

    public function __invoke()
    {
        $engine=$this->view->getEngine();
         include $this->template;
         return "";
    }

} 