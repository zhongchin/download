<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 15-1-17
 * Time: 上午11:48
 */

namespace Common\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\AbstractTableGateway;

class SearchKeyTable extends AbstractTableGateway implements AdapterAwareInterface
{
    protected $table='search_key';
    public function setDbAdapter(Adapter $adapter){
        $this->adapter=$adapter;
        $this->initialize();
    }

    public function getHotKey($limit=5,$offset=0){
        $select=new Select();
        $select->from($this->table);
        $select->order('k_count');
        $select->limit($limit)->offset($offset);

        return $this->selectWith($select);
    }
} 