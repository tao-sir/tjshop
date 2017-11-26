<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$_SESSION['admin'])
        {
          $this->redirect("User/login");
        }
        if(preg_match("/^1[34578]{1}\d{9}$/",$_SESSION['admin']['usercode']))
        {
            $this->assign('is_admin',1);
        }else{
            $this->assign('is_admin',0);
        }
    }
}