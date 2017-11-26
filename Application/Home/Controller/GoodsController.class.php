<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/26
 * Time: 17:37
 */
namespace Home\Controller;
use Think\Controller;
use Home\Controller\PublicController;
class GoodsController extends PublicController
{
    /*public function goodsList()
    {

        $this->display("shop2");
    }*/
	public function goodsList()
    {

        $this->display("index");
    }

    public function goodsInfo()
    {

        $this->display("s1");
    }

}