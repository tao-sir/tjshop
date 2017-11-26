<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function login(){
        if(IS_POST){
            //收集form表单过来的用户名和密码信息
            $name = I('post.user');           
            $pwd = I('post.password');           
            // $pwd1 = md5(md5($pwd).'1358521456'); //加密处理
            $pwd1 = md5(md5($pwd).'4215345');
            //判断用户名和密码(返回null则说明用户名和密码是错误的)
            $info = D('User')->where(array('usercode'=>$name,'password'=>$pwd1,'isadmin'=>1))->find();

            if($info !== null){
            //持久化用户信息
                $_SESSION['admin'] = $info;
                if(!preg_match("/^1[34578]{1}\d{9}$/",$info['usercode']))
                {
                    $where["_string"] = "FIND_IN_SET(1,upuserid)";
                }else{
                    $where["_string"] = "FIND_IN_SET({$info['userid']},upuserid)";
                }


                $id = M("user")->where($where)->field("userid")->select();
                foreach ($id as $k=>$v)
                {
                     $d[$k] = $v['userid'];
                }
                $_SESSION['countid'] = $d;
//            session('user_name',$info['usercode']);
//            session('user_id',$info['userid']);
//            session('compname',$info['compname']);
            //页面跳转到首页
            $this -> redirect('Index/index');
            }else{
            //把用户名和密码错误的信息传递给模板显示                
            $this -> assign('errorinfo','用户名密码错误或非管理员登录');
           }
        }
        $this -> display();
    }
}
