<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15-3-5
 * Time: 下午7:59
 */

namespace Common\View\Strategy;

use Common\View\Renderer\SmartyRenderer;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\View\ViewEvent;

class SmartyStrategy implements ListenerAggregateInterface
{
    protected $renderer;
    protected $listeners = array();

    public function __construct(SmartyRenderer $renderer)
    {

        $this->renderer = $renderer;
    }

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach("renderer", array($this, 'selectRenderer'));
        $this->listeners[] = $events->attach('response', array($this, 'injectResponse'));
    }

    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    public function selectRenderer(ViewEvent $e)
    {
        return $this->renderer;
    }
    public function getRenderer(){
        return $this->renderer;
    }

    public function injectResponse(ViewEvent $e)
    {
        $renderer = $e->getRenderer();
        if ($renderer !== $this->renderer) {
            return;
        }
        $result = $e->getResult();
        $response = $e->getResponse();
        $response->setContent($result);
    }


} 