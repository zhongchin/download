<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15-3-5
 * Time: 下午7:51
 */

namespace Common\View\Renderer;


use Zend\View\Model\ModelInterface;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Exception;

class SmartyRenderer extends PhpRenderer
{

    protected $smarty;
    protected $config;

    private $__file = null;
    private $__templates = array();
    private $__template = array();
    private $__content = '';
    private $__varsCache=array();
    public function  setSmarty($smarty){
        $this->smarty=$smarty;
        $this->smarty->assign('this',$this);

    }
    public function getEngine(){
        return $this->smarty;
    }
    public function render($nameOrModel, $values = null)
    {

        if ($nameOrModel instanceof ModelInterface) {
            $model = $nameOrModel;
            $nameOrModel = $model->getTemplate();
            if (empty($nameOrModel)) {
                throw new Exception\DomainException(sprintf(
                    '%s: received View Model argument, but template is empty',
                    __METHOD__
                ));
            }
            $options = $model->getOptions();
            foreach ($options as $setting => $value)
            {
                $method = 'set' . $setting;
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
                unset($method, $setting, $value);
            }
            unset($options);

            // Give view model awareness via ViewModel helper
            $helper = $this->plugin('view_model');
            $helper->setCurrent($model);
            $values = $model->getVariables();
            unset($model);
        }

        // find the script file name using the parent private method
        $this->addTemplate($nameOrModel);
        unset($nameOrModel); // remove $name from local scope
        $this->__varsCache[] = $this->vars();
        if (null !== $values) {
            $this->setVars($values);
        }
        unset($values);
        // extract all assigned vars (pre-escaped), but not 'this'.
        // assigns to a double-underscored variable, to prevent naming collisions
        $__vars = $this->vars()->getArrayCopy();
        $helper=$this->getHelperPluginManager();
        $this->setHelperPluginManager($helper);
        $__vars['this'] = $this;

        $this->smarty->assign($__vars);


       /* while ($this->__template = array_pop($this->__templates))
        {
            $this->__file = $this->resolver($this->__template);
            if (!$this->__file) {
                throw new Exception\RuntimeException(sprintf(
                    '%s: Unable to render template "%s"; resolver could not resolve to a file',
                    __METHOD__,
                    $this->__template
                ));
            }
            $tmplDir = dirname(dirname($this->__file));
            $this->smarty->setTemplateDir($tmplDir);
            $this->__content = $this->smarty->fetch($this->__file);
        }
        return $this->getFilterChain()->filter($this->__content); // filter output*/
        while ($this->__template = array_pop($this->__templates)) {
            $this->__file = $this->resolver($this->__template);
            if (!$this->__file) {
                throw new Exception\RuntimeException(sprintf(
                    '%s: Unable to render template "%s"; resolver could not resolve to a file',
                    __METHOD__,
                    $this->__template
                ));
            }

            try {
                ob_start();
                $includeReturn = include $this->__file;
                $this->__content = ob_get_clean();
            } catch (\Exception $ex) {
                ob_end_clean();
                throw $ex;
            }
            if ($includeReturn === false && empty($this->__content)) {
                throw new Exception\UnexpectedValueException(sprintf(
                    '%s: Unable to render template "%s"; file include failed',
                    __METHOD__,
                    $this->__file
                ));
            }
            $tmplDir = dirname(dirname($this->__file));
            $this->smarty->addTemplateDir($tmplDir);
            $this->__content = $this->smarty->fetch($this->__file);
        }

        $this->setVars(array_pop($this->__varsCache));

        return $this->getFilterChain()->filter($this->__content); // filter output

    }


    public function __clone()
    {
        $this->smarty = clone $this->smarty;
        $this->smarty->assign('this', $this);
    }

    public function addTemplate($template)
    {
        $this->__templates[] = $template;
        return $this;
    }
} 