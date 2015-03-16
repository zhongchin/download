<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15-3-8
 * Time: 下午11:04
 */

namespace Admin\Model;


class Product
{
    protected $ksu;
    protected $p_name;
    protected $category;
    protected $keywords;

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $ksu
     */
    public function setKsu($ksu)
    {
        $this->ksu = $ksu;
    }

    /**
     * @return mixed
     */
    public function getKsu()
    {
        return $this->ksu;
    }

    /**
     * @param mixed $p_name
     */
    public function setPName($p_name)
    {
        $this->p_name = $p_name;
    }

    /**
     * @return mixed
     */
    public function getPName()
    {
        return $this->p_name;
    }
} 