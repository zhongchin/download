<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15-1-23
 * Time: 下午11:12
 */

namespace Common\Model;


use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\AbstractTableGateway;

class  DownLoadTable  extends AbstractTableGateway implements AdapterAwareInterface
{
    protected $table='download';
   public function setDbAdapter(Adapter $adapter){
       $this->adapter=$adapter;
       $this->initialize();
   }
    public function getDocById($d_id){
        return $this->select(array("d_id"=>$d_id));
    }
    public function getAllInfoById($d_id,$langId){
            $select=new Select();
            $select->from(array('a'=>$this->table));
            $select->join(array('b'=>'down_type_lang'),'a.d_type_id=b.d_type_id');
            $select->join(array('c'=>'langs'),'a.lang_id=c.lang_id');
            $select->where(array('a.d_id'=>$d_id,'b.lang_id'=>$langId));
            return $this->selectWith($select);

    }
    public function getDocUrlById($d_id){
         $select=new Select();
         $select->from(array('a'=>'download'))
           ->join(array('b'=>'products'),'a.p_id=b.p_id')
           ->join(array('c'=>'product_categories'),'b.c_id=c.c_id')
          ->join(array('d'=>'down_type'),'d.d_type_id=a.d_type_id')
             ->where(array('a.d_id'=>$d_id));
       return $this->selectWith($select);

    }
} 