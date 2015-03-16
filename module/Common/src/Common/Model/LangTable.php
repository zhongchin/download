<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 15-1-17
 * Time: 上午10:08
 */

namespace Common\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\AbstractTableGateway;

class LangTable extends AbstractTableGateway implements AdapterAwareInterface
{
    protected $table='langs';

    public function setDbAdapter(Adapter $adapter){
         $this->adapter=$adapter;
        $this->initialize();
    }
    public function getLangByCode($code){
        return $this->select(array('code'=>$code));
    }
    public function getLangs(){
        return $this->select();
    }
    public function getEnableLang(){
        return $this->select(array('is_enable'=>1));
    }
    public function getDefaultLang(){
        return $this->select(array('is_default'=>1));
    }

} 