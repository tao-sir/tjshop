<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/27
 * Time: 15:33
 */
namespace Home\Controller;
use Home\Controller\PublicController;
class DealController extends PublicController
{
    public function rechargeT()
    {
        $this->display("recharge_t");
    }
     public function cRecord()
    {
        //获取当前用户信息
        $userid=$_SESSION['user']['userid'];

        if($userid){
            //实例化充值提现记录表
            $record = M('costrecord');
            //查找当前会员的充值记录
            $rs = $record->where("userid=$userid and dealtype=1")->order('id desc')->select();
            if($rs){

                $this->assign('recharge',$rs);
            }
        }

        $this->display();
    }
}