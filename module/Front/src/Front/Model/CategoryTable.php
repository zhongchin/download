<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 15-1-15
 * Time: 下午5:39
 */

namespace Front\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class CategoryTable extends AbstractTableGateway implements AdapterAwareInterface
{
    protected $table = 'product_categories';

    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->initialize();
    }
    public function fetchAll(){
        return $this->select();
    }

    public function getCategory($cid, $lang)
    {
        $select = new Select();
        $select->from(array('a' => $this->table))
            ->join(array('b' => 'product_category_lang'), 'a.c_id=b.c_id')
            ->join(array('c' => 'langs'), 'c.lang_id=b.lang_id')
            ->where('a.c_id=' . $cid, 'c.code=' . $lang);

        return $this->selectWith($select);
    }

    public function getAllCategoryByLang($lang)
    {
        $select = new Select();
        $select->from(array('a' => $this->table));
        $select->join(array('b' => 'product_category_lang'), 'a.c_id=b.c_id');
        $select->join(array('c' => 'langs'), 'c.lang_id=b.lang_id');
        $select->where(array('c.code' => $lang));
        return $this->selectWith($select);
    }
    public function getCatProductPaginator($cid){
        $select=new Select();
        $select->from('products')->where(array('c_id'=>$cid));
        $dbSelect=new DbSelect($select,$this->adapter);
        return new Paginator($dbSelect);
    }

} 