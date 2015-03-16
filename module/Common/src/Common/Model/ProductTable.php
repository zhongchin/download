<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 15-1-17
 * Time: 下午3:31
 */

namespace Common\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\Sql\Predicate\Expression;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\AbstractTableGateway;

class ProductTable extends AbstractTableGateway implements AdapterAwareInterface
{
    protected $table = 'products';

    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->initialize();
    }

    public function getProductByCid($cid)
    {
        return $this->select(array('c_id' => $cid));
    }

    public function getCategoryByPid($pid, $langId)
    {

        $select = new Select();
        $select->from(array('a' => 'products'));
        $select->join(array('b' => 'product_categories'), 'a.c_id=b.c_id')
            ->join(array('c' => 'product_category_lang'), 'b.c_id=c.c_id')
            ->where(array('a.p_id' => $pid, 'c.lang_id' => $langId));
        return $this->selectWith($select);
    }

    public function getProductById($id)
    {
        return $this->select(array('p_id' => $id));
    }

    public function getProductDocPaginator($pid, $langId)
    {
        $select = new Select();
        $select->from(array('a' => 'download'));
        $select->join(array('b' => 'langs'), 'a.lang_id=b.lang_id', array('name', 'code'));
        $select->join(array('c' => 'down_type_lang'), 'a.d_type_id=c.d_type_id', array('down_type_code'));
        $select->order(new Expression("a.lang_id=" . (int)$langId . ' DESC'));
        $select->where(array('a.p_id' => $pid, 'c.lang_id' => (int)$langId));
        $DbSelect = new \Zend\Paginator\Adapter\DbSelect($select, $this->adapter);
        return new \Zend\Paginator\Paginator($DbSelect);
    }

    public function fetchAllByLangId($lang_id)
    {
        $select = new Select();
        $select->from(array('a' => 'products'));
        $select->join(array('b' => 'product_category_lang'), 'a.c_id=b.c_id', '*', $select::JOIN_LEFT);
        $select->join(array('c' => 'search_key'), 'a.p_id=c.p_id',array('keyword'=> new \Zend\Db\Sql\Expression("count(*)")),$select::JOIN_LEFT);
        $select->join(array('d' => 'download'), 'd.p_id=a.p_id', array('filecount' => new \Zend\Db\Sql\Expression("count(*)")), $select::JOIN_LEFT);
        $select->group(array('d.p_id','c.p_id'));
        $select->where(array('b.lang_id' => $lang_id));
        $Dbselect=new \Zend\Paginator\Adapter\DbSelect($select,$this->adapter);
        return new \Zend\Paginator\Paginator($Dbselect);
    }
}