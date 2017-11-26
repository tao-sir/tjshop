<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(CONTROLLER_NAME != "Goods")
        {
            if(!$_SESSION['user'])
            {
                $this->redirect("User/login");
            }
        }


        $active = I('get.active');//?I('get.active'):1;
        $this->assign('active',$active);
        $this->assign("controller",CONTROLLER_NAME);
    }
    public function tishi()
    {
        $this->display();
    }
}