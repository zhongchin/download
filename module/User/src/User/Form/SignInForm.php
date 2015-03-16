<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 14-12-19
 * Time: 上午8:55
 */

namespace User\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Factory as InputFactory;

class SignInForm extends Form implements InputFilterAwareInterface
{
    protected $inputFilter;

    public function __construct($name = null)
    {
        parent::__construct($name = "login");
        $this->add(array(
            'name' => 'username',
            'type' => 'text',
            'options' => array(
                'label' => 'User Name',
            ),
            'attributes'=>array(
                'class'=>'form-control'
            )
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'password',
            'options' => array(
                'label' => 'Password'
            ),
            'attributes'=>array(
                'class'=>'form-control'
            )
        ));
        $this->add(array(
            'type'=>'submit',
            'name'=>'login',
            'options'=>array(
                'label'=>'login'
            ),
            'attributes'=>array(
                'value'=>'Login',
                'class'=>'btn btn-primary'
            )
        ));
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
            $inputFilter->add($factory->createInput(array(
                    'name' => 'username',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'stripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array('name' => 'NotEmpty'),
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'min' => '5',
                                'max' => '20'
                            )
                        ),
                    ),
                )
            ));
            $inputFilter->add($factory->createInput(array(
                    'name' => 'password',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'stripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array('name' => 'NotEmpty'),
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'min' => '6',
                                'max' => '20'
                            )
                        ),
                    ),
                )
            ));
            $this->inputFilter=$inputFilter;
        }

        return $this->inputFilter;

    }

} 