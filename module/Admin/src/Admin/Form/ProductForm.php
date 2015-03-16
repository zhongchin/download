<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15-3-17
 * Time: 上午12:58
 */

namespace Admin\Form;


use Zend\Form\Form;

class ProductForm extends Form
{
    public function __construct($name="product")
    {
        parent::__construct($name);
        $this->add(array(
            'type'=>"text",
            'name'=>'sku',
            'options'=>array(
                'label'=>'sku',
            ),
        ));
       $this->add(array(
           'type'=>'text',
           'name'=>'p_name',
           'options'=>array(
               'label'=>"product name"
           )
       ));
        $this->add(array(
            'type'=>'select',
        ));


    }
}